<?php

namespace App\Models\Color;

use Throwable;

class ColorRepository
{
    /**
     * @throws Throwable
     */
    public function getCreate(
        string $name,
        string $color
    )
    {
        $colorEntity = new Color();

        $colorEntity->name = $name;
        $colorEntity->color = $color;
        $colorEntity->saveOrFail();
    }

    /**
     * @throws Throwable
     */
    public function getUpdate(
        Color $colorEntity,
        string $name,
        string $color
    )
    {
        $colorEntity->name = $name;
        $colorEntity->color = $color;
        $colorEntity->saveOrFail();

    }

}
