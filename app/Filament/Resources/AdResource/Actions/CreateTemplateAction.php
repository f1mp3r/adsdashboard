<?php

namespace App\Filament\Resources\AdResource\Actions;

use App\Enums\AdStatus;
use App\Enums\Permissions;
use App\Models\Ad;
use App\Models\AdTemplate;
use Filament\Notifications\Actions\Action as NotificationAction;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\Action;

class CreateTemplateAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'generate_ad_template';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->requiresConfirmation();
        $this->visible(auth()->user()->can(Permissions::CREATE_AD_TEMPLATE_FROM_AD));
        $this->icon('heroicon-o-clipboard-document-list');
        $this->label('Generate template');
        $this->modalHeading = 'Confirm generating ad template';

        $this->action(function (Ad $record) {
            $adTemplate = AdTemplate::createFromAd($record);

            $record->setStatus(AdStatus::Completed);

            Notification::make('ad_template_created_' . $adTemplate->id)
                ->title('Ad template created')
                ->body('For ad: ' . $record->title)
                ->success()
                ->actions([
                    NotificationAction::make('view')
                        ->label('View')
                        ->url(route('filament.admin.resources.ad-templates.view', $adTemplate)),
                ])
                ->seconds(10)
                ->send();
        });
    }
}
