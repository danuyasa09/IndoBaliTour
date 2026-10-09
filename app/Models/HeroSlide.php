<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class HeroSlide extends Model
{
    protected $fillable = [
        'type',
        'tour_id',
        'image_path',
        'caption',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order'     => 'integer',
    ];

    // -------------------------------------------------------------------------
    // Relationships
    // -------------------------------------------------------------------------

    /** Eager-loadable Tour relation */
    public function tour(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Tour::class, 'tour_id');
    }

    // -------------------------------------------------------------------------
    // Scopes
    // -------------------------------------------------------------------------

    /** Only active slides, sorted by order */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }

    // -------------------------------------------------------------------------
    // Accessors
    // -------------------------------------------------------------------------

    /**
     * Returns the public URL for the slide image, regardless of source type.
     */
    public function getImageUrlAttribute(): string
    {
        if ($this->type === 'custom' && $this->image_path) {
            return Storage::url($this->image_path);
        }

        // type === 'tour': use the related tour's image
        if ($this->tour_id && $this->relationLoaded('tour') && $this->tour) {
            return asset('images/tours/' . $this->tour->img);
        }

        // Lazy-load if not eager-loaded
        $tour = Tour::find($this->tour_id);
        if ($tour && $tour->img) {
            return asset('images/tours/' . $tour->img);
        }

        // Final fallback
        return 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=1920&q=80';
    }

    /**
     * Returns a preview thumbnail URL (smaller, for admin list).
     */
    public function getThumbUrlAttribute(): string
    {
        // For custom uploads, same image is used (no separate thumb)
        return $this->image_url;
    }
}
