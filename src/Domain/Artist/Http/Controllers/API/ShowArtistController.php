<?php

namespace Domain\Artist\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Domain\Artist\Models\Artist;

class ShowArtistController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Artist $artist)
    {
        return response()->json($artist);
    }
}
