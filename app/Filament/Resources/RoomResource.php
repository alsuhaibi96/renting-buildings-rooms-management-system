<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdditionalServicesResource\RelationManagers\NameRelationManager;
use App\Filament\Resources\RoomResource\Pages;
use App\Filament\Resources\RoomResource\RelationManagers;
use App\Filament\Resources\RoomResource\RelationManagers\AdditionalServicesRelationManager;
use App\Filament\Resources\RoomResource\RelationManagers\SeasonsRelationManager;
use App\Models\Room;
use App\Models\Season;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RoomResource extends Resource
{
    protected static ?string $model = Room::class;

    protected static ?string $navigationIcon = 'heroicon-m-home-modern';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Create Rooms')
                ->description('Create rooms for a building')
                ->schema([
                    Forms\Components\TextInput::make('number')
                    ->numeric()
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('room_price')
                    ->numeric()
                    ->required(),
                    Forms\Components\TextInput::make('floor')
                    ->maxLength(255),
                    Forms\Components\TextInput::make('people_number')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\Select::make('building_id')
                    ->relationship('building','number')
                    ->required(),
                    Forms\Components\Textarea::make('description')
                    ->string(),
                ])->columnSpan(2)->columns(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('number')
                ->searchable()
                ->sortable(),
                Tables\Columns\TextColumn::make('room_price')
                ->searchable()
                ->sortable(),
                Tables\Columns\TextColumn::make('floor')
                ->searchable(),
                Tables\Columns\TextColumn::make('people_number'),
                Tables\Columns\TextColumn::make('building.name'),
                
         
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
            SeasonsRelationManager::class,
            AdditionalServicesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRooms::route('/'),
            'create' => Pages\CreateRoom::route('/create'),
            'edit' => Pages\EditRoom::route('/{record}/edit'),
        ];
    }
}
