<?php

namespace Domain\Artist\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Domain\Artist\Models\Artist;
use Domain\Artwork\Models\Artwork;
use Domain\Gallery\Models\Gallery;
use Domain\Artist\Data\ArtistData;

class ShowArtistController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Artist $artist)
    {
        return response()->json(ArtistData::from($artist));
    }
}
