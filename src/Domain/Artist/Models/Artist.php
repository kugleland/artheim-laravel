<?php

namespace Domain\Artist\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Domain\Artwork\Models\Artwork;
use Domain\Gallery\Models\Gallery;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Artist extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasSlug;
    protected $guarded = [];
    protected $appends = ['profile_image_url'];

    public function artworks()
    {
        return $this->hasMany(Artwork::class);
    }

    public function galleries()
    {
        return $this->belongsToMany(Gallery::class);
    }

    public function getProfileImageUrlAttribute()
    {
        return $this->getFirstMediaUrl('profile_image');
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('alias')
            ->saveSlugsTo('slug');
    }
}
