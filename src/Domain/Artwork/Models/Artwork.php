<?php

namespace Domain\Artwork\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Domain\Artist\Models\Artist;
use Domain\Gallery\Models\Gallery;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Artwork extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasSlug;
    protected $with = ['media'];
    protected $appends = ['primary_image_url'];
    protected $guarded = [];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function getPrimaryImageUrlAttribute()
    {
        return $this->getFirstMediaUrl('primary_image');
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
