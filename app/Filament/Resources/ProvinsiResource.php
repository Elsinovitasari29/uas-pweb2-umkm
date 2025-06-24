<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProvinsiResource\Pages;
use App\Models\Provinsi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProvinsiResource extends Resource
{
    protected static ?string $model = Provinsi::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Provinsi')
                    ->required()
                    ->maxLength(45),
                Forms\Components\TextInput::make('ibukota')
                    ->label('Ibukota')
                    ->required()
                    ->maxLength(45),
                Forms\Components\TextInput::make('latitude')
                    ->label('Latitude')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('longtitude')
                    ->label('Longtitude')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('nama')->label('Nama Provinsi')->searchable(),
                Tables\Columns\TextColumn::make('ibukota')->label('Ibukota')->searchable(),
                Tables\Columns\TextColumn::make('latitude')->label('Latitude'),
                Tables\Columns\TextColumn::make('longtitude')->label('Longtitude'),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProvinsi::route('/'),
            'create' => Pages\CreateProvinsi::route('/create'),
            'edit' => Pages\EditProvinsi::route('/{record}/edit'),
        ];
    }
}