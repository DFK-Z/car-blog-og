<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TutorialResource\Pages;
use App\Filament\Resources\TutorialResource\RelationManagers;
use App\Models\Tutorial;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use PhpParser\Node\Stmt\Label;

class TutorialResource extends Resource
{
    protected static ?string $model = Tutorial::class;

    protected static ?string $modelLabel = "Обучение и инструкция";
    protected static ?string $pluralModelLabel ="Обучение и инструкции";
    protected static ?string $navigationLabel ="Обучающие материалы";

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make("Табы")->schema([
                    Tabs\Tab::make("Основная информация")->schema([
                        Forms\Components\TextInput::make('title')
                        ->label("Название урока")
                        ->required(),
                    Forms\Components\Textarea::make('description')
                        ->required()
                        ->columnSpanFull(),
                    Forms\Components\FileUpload::make('images')
                        ->image()
                        ->imageEditor()
                        ->directory("tutorials")
                        ->multiple()
                        ->columnSpanFull(),
                    Forms\Components\Repeater::make('stages')->schema([
                       TextInput::make("title")
                       ->label("Название этапа"),
                       TextInput::make("subtitle")
                       ->label("Описание этапа"),
                    ])
                        ->label("Этапы")
                        ->columnSpanFull(),

                    ]),
                    Tabs\Tab::make("Seo")->schema([
                        Forms\Components\TextInput::make('meta_title'),
                        Forms\Components\Textarea::make('meta_description')

                            ->columnSpanFull(),
                        Forms\Components\TagsInput::make('meta_keywords')
                            ->columnSpanFull(),
                    ]),
                ])->columnSpan(2),
                Section::make("Состояние записей")->schema([
                    Forms\Components\Toggle::make('is_active')
                    ->required(),
                Forms\Components\Toggle::make('is_new')
                    ->required(),
                Forms\Components\Toggle::make('is_popular')
                    ->required(),
                ])->columnSpan(1)



            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_new')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_popular')
                    ->boolean(),
                Tables\Columns\TextColumn::make('meta_title')
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
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTutorials::route('/'),
            'create' => Pages\CreateTutorial::route('/create'),
            'view' => Pages\ViewTutorial::route('/{record}'),
            'edit' => Pages\EditTutorial::route('/{record}/edit'),
        ];
    }
}
