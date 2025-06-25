<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UmkmResource\Pages;
use App\Models\Umkm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;


class UmkmResource extends Resource
{
    protected static ?string $model = Umkm::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama UMKM')
                    ->required()
                    ->maxLength(45),
                FileUpload::make('foto'),
                Forms\Components\TextInput::make('modal')
                    ->label('Modal')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('pemilik')
                    ->label('Pemilik')
                    ->required()
                    ->maxLength(45),
                Forms\Components\TextInput::make('alamat')
                    ->label('Alamat')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('website')
                    ->label('Website')
                    ->maxLength(45),
                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->maxLength(45),
                Forms\Components\Select::make('kabkota_id')
                    ->label('Kab/Kota')
                    ->relationship('kabkota', 'nama')
                    ->required(),
                Forms\Components\TextInput::make('rating')
                    ->label('Rating')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('kategori_umkm_id')
                    ->label('Kategori UMKM')
                    ->relationship('kategoriUmkm', 'nama')
                    ->required(),
                Forms\Components\Select::make('pembina_id')
                    ->label('Pembina')
                    ->relationship('pembina', 'nama')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('nama')->label('Nama UMKM')->searchable()->sortable(),
                ImageColumn::make('foto'),
                Tables\Columns\TextColumn::make('modal')->label('Modal')->sortable(),
                Tables\Columns\TextColumn::make('pemilik')->label('Pemilik')->sortable(),
                Tables\Columns\TextColumn::make('alamat')->label('Alamat')->limit(30),
                Tables\Columns\TextColumn::make('website')->label('Website'),
                Tables\Columns\TextColumn::make('email')->label('Email'),
                Tables\Columns\TextColumn::make('kabkota.nama')->label('Kab/Kota'),
                Tables\Columns\TextColumn::make('rating')->label('Rating'),
                Tables\Columns\TextColumn::make('kategoriUmkm.nama')->label('Kategori UMKM'),
                Tables\Columns\TextColumn::make('pembina.nama')->label('Pembina'),
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
            'index' => Pages\ListUmkm::route('/'),
            'create' => Pages\CreateUmkm::route('/create'),
            'edit' => Pages\EditUmkm::route('/{record}/edit'),
        ];
    }
}
