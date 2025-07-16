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
    public function __invoke(string $artistSlug, string $artworkSlug)
    {
        $artist = Artist::where('slug', $artistSlug)->firstOrFail();
        $artwork = $artist->artworks()->where('slug', $artworkSlug)->firstOrFail();
        return response()->json($artwork->load('artist', 'gallery'));
    }
}
