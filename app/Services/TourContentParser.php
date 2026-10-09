<?php

namespace App\Services;

use App\Helpers\CurrencyHelper;

/**
 * Parses custom shortcodes embedded in tour HTML content.
 *
 * Supported shortcodes:
 *  - [map lat="..." lng="..."][embed-url][/map]  -- Dual 2D + 360 widget
 *  - [map lat="..." lng="..."]                   -- Standalone 2D map
 *  - [map lat="..." lng="..." type="360"]         -- Standalone Street View
 *  - [map_embed][url][/map_embed]                -- Standalone embed iframe
 */
class TourContentParser
{
    /**
     * Parse all shortcodes in content and return rendered HTML.
     */
    public static function parse(?string $content): string
    {
        if (empty($content)) { return ''; }
        $parsed = $content;
        // 1. Dual Map Widget
        $parsed = preg_replace_callback('/(\[map\s+(?:(?!\[map).)*?\])((?:(?!\[map).)*?)\[\/map\]/is', [self::class, 'parseDualMap'], $parsed);
        // 2. Standalone Map
        $parsed = preg_replace_callback('/\[map\s+.*?\]/is', [self::class, 'parseStandaloneMap'], $parsed);
        // 3. Standalone Embed
        $parsed = preg_replace_callback('/\[map_embed\](.*?)\[\/map_embed\]/is', [self::class, 'parseMapEmbed'], $parsed);
        // 4. Currency formatting
        return CurrencyHelper::formatHtml($parsed);
    }

    private static function parseDualMap(array $matches): string
    {
        $openTag   = html_entity_decode(strip_tags($matches[1]), ENT_QUOTES);
        $innerHtml = $matches[2];
        preg_match('/lat="([^"]+)"/', $openTag, $latM);
        preg_match('/lng="([^"]+)"/', $openTag, $lngM);
        $lat = $latM[1] ?? ''; $lng = $lngM[1] ?? '';
        if (preg_match('/(https:\/\/www\.google\.com\/maps\/embed\?[^"\'>\s&]+)/i', $innerHtml, $srcM)) {
            $embedUrl = html_entity_decode($srcM[1], ENT_QUOTES);
        } else { $embedUrl = trim(html_entity_decode(strip_tags($innerHtml), ENT_QUOTES)); }
        if (!$lat || !$lng || !$embedUrl) { return $matches[0]; }
        $s2d = "https://maps.google.com/maps?q={$lat},{$lng}&t=&z=14&ie=UTF8&iwloc=&output=embed";
        return '<div x-data=\'{ view: \"2d\" }\' class="my-8" data-aos="fade-up">'
             . '<div class="flex justify-center mb-5"><div class="inline-flex bg-gray-100/80 backdrop-blur-sm p-1 rounded-full">'
             . '<button x-on:click="view=\'2d\'" x-bind:class="view===\'2d\' ? \'bg-white shadow-sm text-gray-900 font-medium\' : \'text-gray-500 hover:text-gray-700\'" class="px-5 py-2 text-sm rounded-full transition-all duration-300 flex items-center gap-2"><i class="fa-solid fa-map-location-dot"></i> Peta Lokasi</button>'
             . '<button x-on:click="view=\'360\'" x-bind:class="view===\'360\' ? \'bg-white shadow-sm text-gray-900 font-medium\' : \'text-gray-500 hover:text-gray-700\'" class="px-5 py-2 text-sm rounded-full transition-all duration-300 flex items-center gap-2"><i class="fa-solid fa-street-view"></i> 360 View</button>'
             . '</div></div>'
             . '<div class="relative rounded-2xl overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100/50 bg-gray-50">'
             . "<div x-show=\"view===\'2d\'\">  <iframe width=\"100%\" height=\"400\" frameborder=\"0\" src=\"{$s2d}\" class=\"w-full\"></iframe></div>"
             . "<div x-show=\"view===\'360\'\"> <iframe width=\"100%\" height=\"400\" frameborder=\"0\" src=\"{$embedUrl}\" class=\"w-full\"></iframe></div>"
             . '</div></div>';
    }

    private static function parseStandaloneMap(array $matches): string
    {
        $clean = html_entity_decode(strip_tags($matches[0]), ENT_QUOTES);
        preg_match('/lat="([^"]+)"/', $clean, $latM);
        preg_match('/lng="([^"]+)"/', $clean, $lngM);
        $lat = $latM[1] ?? ''; $lng = $lngM[1] ?? '';
        $is360 = str_contains($clean, 'type="360"');
        if (!$lat || !$lng) { return $matches[0]; }
        $wrapper = 'class="my-8 rounded-2xl overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100/50" data-aos="fade-up"';
        if ($is360) { $src = "https://maps.google.com/maps?layer=c&cbll={$lat},{$lng}&output=svembed"; $h = 400; }
        else { $src = "https://maps.google.com/maps?q={$lat},{$lng}&t=&z=14&ie=UTF8&iwloc=&output=embed"; $h = 350; }
        return "<div {$wrapper}><iframe width=\"100%\" height=\"{$h}\" frameborder=\"0\" scrolling=\"no\" src=\"{$src}\" class=\"w-full\"></iframe></div>";
    }

    private static function parseMapEmbed(array $matches): string
    {
        if (preg_match('/(https:\/\/www\.google\.com\/maps\/embed\?[^"\'>\s&]+)/i', $matches[1], $srcM)) {
            $url = html_entity_decode($srcM[1], ENT_QUOTES);
        } else { $url = trim(html_entity_decode(strip_tags($matches[1]), ENT_QUOTES)); }
        $wrapper = 'class="my-8 rounded-2xl overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100/50" data-aos="fade-up"';
        return "<div {$wrapper}><iframe width=\"100%\" height=\"400\" frameborder=\"0\" scrolling=\"no\" src=\"{$url}\" class=\"w-full\"></iframe></div>";
    }
}
