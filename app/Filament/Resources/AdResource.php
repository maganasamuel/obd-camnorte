<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdResource\{Pages, RelationManagers};
use App\Models\Ad;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\{Forms, Tables};
use Illuminate\Database\Eloquent\{Builder, Model, SoftDeletingScope};

class AdResource extends Resource
{
    protected static ?string $model = Ad::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Advertisements';

    protected static ?string $modelLabel = 'Advertisement';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('effective_from')
                    ->required(),
                Forms\Components\DatePicker::make('effective_to')
                    ->required()
                    ->afterOrEqual('effective_from'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('order')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('effective_from')
                    ->label('Effective Period')
                    ->formatStateUsing(fn (string $state, Model $record): string => $record->effective_from->format('M d, Y') . ' - ' . $record->effective_to->format('M d, Y'))
                    ->description(fn (Model $record): string => $record->effective_period),
                Tables\Columns\TextColumn::make('effectivity')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'active' => 'success',
                        'dormant' => 'gray',
                        'expired' => 'danger',
                    }),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
            ])
            ->defaultSort('order')
            ->filters([
                Tables\Filters\Filter::make('active')
                    ->query(fn (Builder $query) => $query->where('active', true)),
                Tables\Filters\Filter::make('inactive')
                    ->query(fn (Builder $query) => $query->where('active', false)),
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
            'index' => Pages\ManageAds::route('/'),
        ];
    }
}
