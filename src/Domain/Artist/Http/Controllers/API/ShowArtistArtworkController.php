<?php

namespace Domain\Artist\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Domain\Artist\Models\Artist;
use Domain\Artwork\Models\Artwork;

class ShowArtistArtworkController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Artist $artist, Artwork $artwork)
    {
        return response()->json($artwork->load('artist', 'gallery'));
    }
}
