<?php

namespace App\Models\Tag;

use Throwable;

class TagRepository
{

    /**
     * @throws Throwable
     */
    public function getCreate(string $title)
    {
        $tag = new Tag();

        $tag->title = $title;
        $tag->saveOrFail();

    }

    /**
     * @throws Throwable
     */
    public function getUpdate(
        Tag $tag,
        $title
    )
    {
        $tag->title = $title;
        $tag->saveOrFail();
    }

}
