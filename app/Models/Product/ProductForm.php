<?php

namespace App\Models\Product;

class ProductForm
{
    public int $brand;
    public string $title;
    public string $model;
    public string $description;
    public int $quantity;
    public float $price;

    public function __construct(int $brand, string $title, string $model, string $description, int $quantity, float $price)
    {

    }

}

