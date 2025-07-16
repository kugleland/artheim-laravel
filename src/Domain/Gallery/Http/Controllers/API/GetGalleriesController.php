<?php

namespace Domain\Gallery\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Domain\Gallery\Models\Gallery;
use Domain\Gallery\Data\GalleryData;

class GetGalleriesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $galleries = Gallery::all();
        return response()->json(GalleryData::collect($galleries->load('user')));
    }
}
