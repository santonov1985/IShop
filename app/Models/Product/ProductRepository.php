<?php

namespace App\Models\Product;

use Throwable;

class ProductRepository
{
    /**
     * @throws Throwable
     */
    public function getCreate(
        int $brand_id,
        string $title,
        int $quantity,
        int $price,
        int $category_id,
        string $model,
        string $previewImage = null,
        string $image = null,
        string $description = null,
        string $characteristic = null,
        array $colors_id = null,
        bool $is_published = null
    )
    {
        $product = new Product();
        $product->brand_id = $brand_id;
        $product->title = $title;
        $product->quantity = $quantity;
        $product->price = $price;
        $product->category_id = $category_id;
        $product->model = $model;
        $product->preview_image = $previewImage;
        $product->image = $image;
        $product->description = $description;
        $product->characteristic = $characteristic;
        $product->is_published = $is_published;

        $product->saveOrFail();

        $product->colors()->sync($colors_id);

    }

    public function getUpdate(
        Product $product,
        int $brand_id,
        string $title,
        int $quantity,
        int $price,
        int $category_id,
        string $model,
        string $previewImage = null,
        string $image = null,
        string $description = null,
        string $characteristic = null,
        array $colors_id = null,
        bool $is_published = null
    )
    {
        $product->brand_id = $brand_id;
        $product->title = $title;
        $product->quantity = $quantity;
        $product->price = $price;
        $product->category_id = $category_id;
        $product->model = $model;
        $product->preview_image = $previewImage;
        $product->image = $image;
        $product->description = $description;
        $product->characteristic = $characteristic;
        $product->is_published = $is_published;

        $product->saveOrFail();

        $product->colors()->sync($colors_id);
    }

}
