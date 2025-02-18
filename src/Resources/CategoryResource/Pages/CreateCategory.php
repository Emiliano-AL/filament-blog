<?php

namespace Firefly\FilamentBlog\Resources\CategoryResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Firefly\FilamentBlog\Resources\CategoryResource;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;

    public static function getLabel(): string
    {
        return trans('filament-blog::cafali-blog.categories.create_page');
    }
}
