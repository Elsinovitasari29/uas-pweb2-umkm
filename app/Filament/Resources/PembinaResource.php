<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PembinaResource\Pages;
use App\Filament\Resources\PembinaResource\RelationManagers;
use App\Models\Pembina;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PembinaResource extends Resource
{
    protected static ?string $model = Pembina::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(45),
                Forms\Components\Select::make('gender')
                    ->required()
                    ->options([
                        'L' => 'Laki-laki',
                        'P' => 'Perempuan',
                ]),
            Forms\Components\DatePicker::make('tgl_lahir')
                ->required(),
            Forms\Components\TextInput::make('tmp_lahir')
                ->required()
                ->maxLength(30),
            Forms\Components\TextInput::make('keahlian')
                ->required()
                ->maxLength(100),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('nama')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('gender')
                    ->label('Gender')
                    ->formatStateUsing(fn ($state) => $state === 'L' ? 'Laki-laki' : 'Perempuan')
                    ->sortable(),
                 Tables\Columns\TextColumn::make('tgl_lahir')->date()->sortable(),
                 Tables\Columns\TextColumn::make('tmp_lahir')->label('Tempat Lahir')->sortable(),
                 Tables\Columns\TextColumn::make('keahlian')->sortable(),
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
            'index' => Pages\ListPembinas::route('/'),
            'create' => Pages\CreatePembina::route('/create'),
            'edit' => Pages\EditPembina::route('/{record}/edit'),
        ];
    }
}
