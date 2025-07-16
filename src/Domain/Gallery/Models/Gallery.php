<?php

namespace Domain\Gallery\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use Illuminate\Support\Str;
use Domain\Artist\Models\Artist;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Gallery extends Model implements HasMedia
{
    use HasFactory;
    use HasSlug;
    use InteractsWithMedia;

    protected $guarded = [];
    protected $appends = ['logo_url', 'banner_url', 'images_urls'];

    protected static function booted()
{
    static::creating(function ($model) {
        #$model->slug = Str::slug($model->name);
        $model->user_id = auth()->id();
    });
}

    public function artists()
    {
        return $this->belongsToMany(Artist::class);
    }

    public function artworks()
    {
        return $this->hasMany(Artwork::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
    
    public function getLogoUrlAttribute()
    {
        return $this->getFirstMediaUrl('gallery_logo');
    }

    public function getBannerUrlAttribute()
    {
        return $this->getFirstMediaUrl('gallery_banner');
    }

    public function getImagesUrlsAttribute()
    {
        $imageUrls = [];
        foreach ($this->getMedia('gallery_images') as $media) {
            $imageUrls[] = $media->getUrl();
        }
        return $imageUrls;
    }
}
