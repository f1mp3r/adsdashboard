<?php

namespace App\Filament\Resources\AdTemplateResource\Pages;

use App\Filament\Resources\AdTemplateResource;
use Filament\Actions;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;

class ViewAdTemplate extends ViewRecord
{
    protected static string $resource = AdTemplateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Grid::make(3)
            ->schema([
                Group::make()
                    ->columnSpan(2)
                    ->grow()
                    ->schema([
                        Section::make('Template information')
                            ->schema([
                                TextEntry::make('title'),
                                TextEntry::make('canva_url'),
                                TextEntry::make('description'),
                            ]),
                        Section::make('Ad information')
                            ->relationship('ad')
                            ->columns(2)
                            ->schema([
                                TextEntry::make('title'),
                                TextEntry::make('status'),
                                TextEntry::make('url')->columnSpanFull(),
                                TextEntry::make('description')->columnSpanFull(),
                            ]),
                    ]),
                Section::make()
                    ->columnSpan(1)
                    ->schema([
                        TextEntry::make('status')->inlineLabel(),
                        TextEntry::make('created_at')->inlineLabel(),
                        TextEntry::make('updated_at')->inlineLabel(),
                    ]),
            ]),
        ]);
    }
}
