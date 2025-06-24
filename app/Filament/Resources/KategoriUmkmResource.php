<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriUmkmResource\Pages;
use App\Filament\Resources\KategoriUmkmResource\RelationManagers;
use App\Models\KategoriUmkm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KategoriUmkmResource extends Resource
{
    protected static ?string $model = KategoriUmkm::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 Forms\Components\TextInput::make('nama')
                ->label('Nama Kategori UMKM')
                ->required()
                ->maxLength(45),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('nama')->label('Nama Kabupaten/Kota')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListKategoriUmkms::route('/'),
            'create' => Pages\CreateKategoriUmkm::route('/create'),
            'edit' => Pages\EditKategoriUmkm::route('/{record}/edit'),
        ];
    }
}
