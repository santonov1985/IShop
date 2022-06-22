<?php

namespace App\Models\Category;

use Throwable;

class CategoryRepository
{
    /**
     * @throws Throwable
     */
    public function getCreate(
        string $title
    )
    {
        $category = new Category();

        $category->title = $title;
        $category->saveOrFail();
    }

    /**
     * @throws Throwable
     */
    public function getUpdate(
        $category,
        string $title
    )
    {
        $category->title = $title;
        $category->saveOrFail();
    }
}
