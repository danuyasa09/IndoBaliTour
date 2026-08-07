<?php

namespace App\Helpers;

class CurrencyHelper
{
    /**
     * Parse HTML content and wrap all Rp numbers with Alpine.js currency tags.
     */
    public static function formatHtml($html)
    {
        if (empty($html)) return $html;

        // Auto-detect formats like $ 50.00, USD 50.50, $50, USD50.00
        return preg_replace_callback('/(?:USD|\$)\s*(\d+(?:\.\d{1,2})?)/i', function($matches) {
            $val = $matches[1];
            if (is_numeric($val)) {
                return '<span x-data x-html="$store.currency.format('.$val.')" class="currency-dynamic whitespace-nowrap">$ '.$val.'</span>';
            }
            return $matches[0];
        }, $html);
    }
}
