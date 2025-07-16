<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Domain\Artist\Http\Controllers\API\{
    GetArtistsController,
    ShowArtistController,
    GetArtistArtworksController,
    ShowArtistArtworkController,
};

use Domain\Gallery\Http\Controllers\API\{
    GetGalleriesController,
    ShowGalleryController,
};


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group(['prefix' => 'artists'], function () {
    Route::get('/', GetArtistsController::class)->name('artists.index');
    Route::get('/{artist}', ShowArtistController::class)->name('artists.show');
    Route::get('/{artist}/artworks', GetArtistArtworksController::class)->name('artists.artworks');
    Route::get('/{artist}/artworks/{artwork}', ShowArtistArtworkController::class)->name('artists.artworks.show');
});

Route::group(['prefix' => 'galleries'], function () {
    Route::get('/', GetGalleriesController::class)->name('galleries.index');
    Route::get('/{gallery}', ShowGalleryController::class)->name('galleries.show');
});