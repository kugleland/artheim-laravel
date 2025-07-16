<?php

namespace Domain\Artist\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Domain\Artist\Models\Artist;
use Domain\Artwork\Data\ArtworkData;

class GetArtistArtworksController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $artistSlug)
    {
        $artist = Artist::where('slug', $artistSlug)->firstOrFail();
        return response()->json(ArtworkData::collect($artist->artworks()->paginate(10)));
    }
}
