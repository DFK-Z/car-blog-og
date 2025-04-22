<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use App\Models\CategoryArticle;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static?string $navigationGroup = "Статьи";
    protected static?string $navigationLabel = "Статьи";
    protected static?string $modelLabel = "Статьи";
    protected static?string $pluralModelLabel = "Статьи";

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
           Group::make()->schema([
                Section::make('Новая статья')->schema([
                   TextInput::make('name')
                        ->required()
                        ->label('Название статьи'),
                    Textarea::make("small_text")
                    ->required()
                    ->label("Небольшое описание"),
                    Textarea::make("content")
                    ->required()
                    ->label("Контент статьи")

                ])->columns(2)->columnSpanFull(),
                Section::make()->schema([
                    FileUpload::make('images')
                    ->image()
                    ->label("Изображение")
                    ->imageEditor()
                    ->maxFiles(10)
                    ->directory("articles/image")
                    ->multiple()
                    ->columnSpanFull(),
                ])->columnSpanFull(),
                Section::make()->schema([
                    FileUpload::make('documents')
                    ->image()
                    ->label("Документы")
                    ->imageEditor()
                    ->acceptedFileTypes(['application/pdf'])
                    ->directory("articles/documents")
                    ->multiple()
                    ->maxFiles(5)
                    ->columnSpanFull(),
                ])->columnSpanFull(),
        ])->columnSpan(2),
        Group::make()->schema([
            Section::make()->schema([
                Select::make('category_article_id')
                    ->required()
                    ->preload()
                    ->searchable()
                    ->label('Категория статьи')
                    ->relationship('category', 'name')



            ]),
            Section::make()->schema([
                Toggle::make('is_active')
                    ->label('Активная статья')
                    ->helperText('Статья будет показана')
                    ->default(true),
                Toggle::make('is_featured')
                    ->label('Популярная статья')
                    ->helperText('Статья будет в разделе популярные"')
                    ->default(false),

            ]),
        ])->columnSpan(1),
    ])->columns(3);
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('category.name')
                ->label("Категория")
                    ->numeric()
                    ->sortable(),
                TextColumn::make("name")
                ->label("Название статьи"),
                Tables\Columns\IconColumn::make('is_active')
                ->label('Активная статья')
                ->boolean(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Популярная статья')
                    ->boolean(),
                Tables\Columns\TextColumn::make('category.name')
                ->label("Категория")
                    ->numeric()
                    ->sortable(),
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
                SelectFilter::make("category_article_id")
                ->label("Фильтр по категориям")
                ->searchable()
                ->options(CategoryArticle::where("is_active", true)->pluck("name", "id"))
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'view' => Pages\ViewArticle::route('/{record}'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
