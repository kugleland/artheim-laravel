<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Domain\Artist\Http\Controllers\API\{
    GetArtistsController,
    ShowArtistController,
};



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group(['prefix' => 'artists'], function () {
    Route::get('/', GetArtistsController::class)->name('artists.index');
    Route::get('/{artist}', ShowArtistController::class)->name('artists.show');
    #Route::get('/{artist}/artworks', ShowArtistArtworksController::class)->name('artists.artworks');
});