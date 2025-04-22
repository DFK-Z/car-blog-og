<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryArticleResource\Pages;
use App\Filament\Resources\CategoryArticleResource\RelationManagers;
use App\Filament\Resources\CategoryArticleResource\RelationManagers\ArticlesRelationManager;
use App\Models\CategoryArticle;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryArticleResource extends Resource
{
    protected static ?string $model = CategoryArticle::class;
    protected static?string $navigationGroup = "Статьи";

    protected static?string $navigationLabel = "Категории";
    protected static?string $modelLabel = "Категории";
    protected static?string $navigationParentItem = "Статьи";
    protected static?string $pluralModelLabel = "Категории";
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->label('Название')
                    ->required(),
                Forms\Components\Toggle::make('is_active')
                ->label('Категория будет отображена')
                    ->required(),
                Forms\Components\Toggle::make('is_featured')
                ->label('Популярная категория')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label('Название')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                ->label('Активная категория')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_featured')
                ->label('Популярная категория')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                ->label('Создана в')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                ->label('Изменена в')
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
            ArticlesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategoryArticles::route('/'),
            'create' => Pages\CreateCategoryArticle::route('/create'),
            'view' => Pages\ViewCategoryArticle::route('/{record}'),
            'edit' => Pages\EditCategoryArticle::route('/{record}/edit'),
        ];
    }
}
