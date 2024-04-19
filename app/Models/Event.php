<?php

namespace App\Models;

use App\Traits\HasSlug;
use App\Traits\UploadsMedia;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Event extends Model implements HasMedia
{
    use HasFactory,UploadsMedia;
    use InteractsWithMedia,HasSlug;


    protected $appends = ['featured_image','event_images'];

    // protected $dates = ['start_date', 'end_date'];


    protected $casts = [
        'start_date' => 'datetime:Y-m-d',
        'end_date' => 'datetime:Y-m-d',
        'start_time' => 'datetime',
        'end_time' => 'datetime'
    ];
    /**
     * Get the tickets for the event.
     */
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    /**
     * Get the organiser that owns the event.
     */
    public function organiser(): BelongsTo
    {
        return $this->belongsTo(Organiser::class);
    }


    public function featuredImage(): Attribute
    {
        return Attribute::get(fn () => $this->getFirstMediaUrl('featured_image'));
    }

    public function eventImages(): Attribute
    {
        return Attribute::get(fn () => $this->getMedia('event_images'));
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('featured_image')
            ->singleFile();

        $this
            ->addMediaCollection('event_images');
    }
}
