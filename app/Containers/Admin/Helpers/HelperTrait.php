<?php

namespace Admin\Helpers;

trait HelperTrait
{
    protected function getIdFromSlug(string $slug): string
    {
        $slug = strip_tags($slug);

        return (strpos($slug, '_') !== false) ? strstr($slug, '_', true) : $slug;
    }
}
