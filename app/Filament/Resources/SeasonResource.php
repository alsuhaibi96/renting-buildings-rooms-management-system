<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SeasonResource\Pages;
use App\Filament\Resources\SeasonResource\RelationManagers;
use App\Models\Season;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Field;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SeasonResource extends Resource
{
    protected static ?string $model = Season::class;

    protected static ?string $navigationIcon = 'heroicon-o-fire';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->string()
                ->required(),
                Forms\Components\TextInput::make('each_room_price')
                ->label("Room Price")
                ->numeric()
                ->required(),
                DatePicker::make('start_date')
                ->required(),
                Forms\Components\DatePicker::make('end_date')
                ->required(),
                Forms\Components\TextInput::make('days')
                ->label("Number Of Days")
                ->numeric()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('start_date')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('end_date')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('days')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('each_room_price')
                ->sortable()
                ->searchable(),
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
            'index' => Pages\ListSeasons::route('/'),
            'create' => Pages\CreateSeason::route('/create'),
            'edit' => Pages\EditSeason::route('/{record}/edit'),
        ];
    }
}
