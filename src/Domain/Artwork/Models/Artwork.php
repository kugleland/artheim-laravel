<?php

namespace Domain\Artwork\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Domain\Artist\Models\Artist;
use Domain\Gallery\Models\Gallery;

class Artwork extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
