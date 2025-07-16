<?php

namespace Domain\Gallery\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Domain\Gallery\Models\Gallery;
use Domain\Gallery\Data\GalleryData;

class ShowGalleryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $slug)
    {
        $gallery = Gallery::where('slug', $slug)->firstOrFail();
        return response()->json(GalleryData::from($gallery->load('user')));
    }
}
