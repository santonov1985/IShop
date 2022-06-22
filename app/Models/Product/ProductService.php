<?php

namespace App\Models\Product;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductService
{

    public function uploadImage($file): string
    {
        $image = Str::random(10). '.' . $file->extension();

        File::delete(public_path("PRODUCT_PREVIEW_IMAGE_PATH"));
        $file->move(public_path(env('PRODUCT_PREVIEW_IMAGE_PATH')), $image);

        return $image;
    }
}
