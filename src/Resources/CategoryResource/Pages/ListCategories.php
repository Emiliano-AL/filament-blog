<?php

namespace Firefly\FilamentBlog\Resources\CategoryResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Firefly\FilamentBlog\Resources\CategoryResource;

class ListCategories extends ListRecords
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label(__('filament-blog::cafali-blog.categories.create_action')),
        ];
    }

    public static function getLabel(): string
    {
        return __('filament-blog::cafali-blog.categories.title_page');
    }
}
