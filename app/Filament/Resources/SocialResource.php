<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SocialResource\{Pages, RelationManagers};
use App\Models\Social;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\{Forms, Tables};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\{Builder, SoftDeletingScope};

class SocialResource extends Resource
{
    protected static ?string $model = Social::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Social Media Links';

    protected static ?string $modelLabel = 'Social Media Link';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                Forms\Components\TextInput::make('icon')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->in(
                        collect(scandir(base_path('vendor\davidhsianturi\blade-bootstrap-icons\resources\svg')))
                            ->map(fn ($item) => str($item)->replace('.svg', '')->prepend('bi-'))
                            ->all()
                    )
                    ->maxLength(255)
                    ->placeholder('bi-youtube')
                    ->hint(
                        str('<a href="' . config('options.icons_hint_url') . '" target="_blank">Need help?</a>')
                            ->toHtmlString()
                    ),
                Forms\Components\TextInput::make('url')
                    ->label('Link')
                    ->required()
                    ->activeUrl()
                    ->unique(ignoreRecord: true)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('order')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->icon(fn (Model $record) => $record->icon)
                    ->searchable(),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
            ])
            ->defaultSort('order')
            ->filters([
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('toggle_active')
                    ->label(fn (Model $record) => $record->active ? 'Deactivate' : 'Activate')
                    ->requiresConfirmation()
                    ->action(function (Model $record) {
                        $record->update(['active' => ! $record->active]);

                        Notification::make()
                            ->title(self::$modelLabel . ' has been ' . ($record->active ? 'activated' : 'deactivated') . '.')
                            ->success()
                            ->send();
                    }),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ManageSocials::route('/'),
        ];
    }
}
