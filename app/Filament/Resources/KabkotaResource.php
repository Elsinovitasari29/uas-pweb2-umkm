<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Kabkota;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\KabkotaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KabkotaResource\RelationManagers;

class KabkotaResource extends Resource
{
    protected static ?string $model = Kabkota::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Kabupaten/Kota')
                    ->required()
                    ->maxLength(45),
                Forms\Components\TextInput::make('latitude')
                    ->label('Latitude')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('longtitude')
                    ->label('Longitude')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('provinsi_id')
                    ->label('Provinsi')
                    ->relationship('provinsi', 'nama')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('nama')->label('Nama Kabupaten/Kota')->searchable(),
                Tables\Columns\TextColumn::make('latitude')->label('Latitude'),
                Tables\Columns\TextColumn::make('longtitude')->label('Longitude'),
                Tables\Columns\TextColumn::make('provinsi.nama')->label('Provinsi'),
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
            'index' => Pages\ListKabkota::route('/'),
            'create' => Pages\CreateKabkota::route('/create'),
            'edit' => Pages\EditKabkota::route('/{record}/edit'),
        ];
    }
}