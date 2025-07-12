<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArtworkResource\Pages;
use App\Filament\Resources\ArtworkResource\RelationManagers;
use Domain\Artwork\Models\Artwork;
use Domain\Artist\Models\Artist;
use Domain\Gallery\Models\Gallery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class ArtworkResource extends Resource
{
    protected static ?string $model = Artwork::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title'),
                Forms\Components\TextInput::make('description'),
                Forms\Components\TextInput::make('year'),
                Forms\Components\TextInput::make('medium'),
                Forms\Components\TextInput::make('height')->numeric(),
                Forms\Components\TextInput::make('width')->numeric(),
                Forms\Components\TextInput::make('depth')->numeric(),
                Forms\Components\TextInput::make('weight')->numeric(),
                Forms\Components\TextInput::make('price')->numeric(),
                Forms\Components\Select::make('status')
                    ->options([
                        'available' => 'Available',
                        'sold' => 'Sold',
                        'reserved' => 'Reserved',
                        'not_for_sale' => 'Not for sale',
                    ])->default('available'),
                Forms\Components\Select::make('artist_id')
                    ->relationship('artist', 'first_name'),
                Forms\Components\Select::make('gallery_id')
                    ->relationship('gallery', 'name'),
                SpatieMediaLibraryFileUpload::make('primary_image')
                    ->collection('primary_image')
                    ->label('Primary Image'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('year'),
                Tables\Columns\TextColumn::make('medium'),
                Tables\Columns\TextColumn::make('dimensions'),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('status'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArtworks::route('/'),
            'create' => Pages\CreateArtwork::route('/create'),
            'edit' => Pages\EditArtwork::route('/{record}/edit'),
        ];
    }
}
