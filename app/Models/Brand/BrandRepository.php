<?php

namespace App\Models\Brand;

use Throwable;

class BrandRepository
{
    /**
     * @throws Throwable
     */
    public function getCreate(string $title)
    {
        $brand = new Brand();

        $brand->title = $title;

        $brand->saveOrFail();
    }

    /**
     * @throws Throwable
     */
    public function getUpdate(
        Brand $brand,
        string $title
    )
    {
        $brand->title = $title;
        $brand->saveOrFail();
    }
}
