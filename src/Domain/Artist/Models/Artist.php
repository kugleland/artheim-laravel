<?php

namespace Domain\Artist\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Domain\Artwork\Models\Artwork;
use Domain\Gallery\Models\Gallery;

class Artist extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function artworks()
    {
        return $this->hasMany(Artwork::class);
    }

    public function galleries()
    {
        return $this->belongsToMany(Gallery::class);
    }
}
