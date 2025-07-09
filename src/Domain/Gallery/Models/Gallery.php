<?php

namespace Domain\Gallery\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function artists()
    {
        return $this->belongsToMany(Artist::class);
    }

    public function artworks()
    {
        return $this->hasMany(Artwork::class);
    }
}
