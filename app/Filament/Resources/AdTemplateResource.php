<?php

namespace App\Filament\Resources;

use App\Enums\AdTemplateStatus;
use App\Filament\Resources\AdTemplateResource\Pages;
use App\Models\AdTemplate;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AdTemplateResource extends Resource
{
    protected static ?string $model = AdTemplate::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required(),
                        Forms\Components\Select::make('status')
                            ->options(AdTemplateStatus::class)
                            ->native(false)
                            ->required(),
                        Forms\Components\TextInput::make('canva_url')
                            ->url(),
                        Forms\Components\Select::make('ad_id')
                            ->searchable()
                            ->required()
                            ->relationship('ad', 'title'),
                        Forms\Components\Textarea::make('description')
                            ->grow()
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->description(fn (AdTemplate $record) => 'Ad: ' . $record->ad->title)
                    ->grow()
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge(),
                Tables\Columns\TextColumn::make('canva_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdTemplates::route('/'),
            'create' => Pages\CreateAdTemplate::route('/create'),
            'view' => Pages\ViewAdTemplate::route('/{record}'),
            'edit' => Pages\EditAdTemplate::route('/{record}/edit'),
        ];
    }
}
