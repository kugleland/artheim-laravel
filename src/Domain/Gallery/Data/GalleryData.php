<?php

namespace Domain\Gallery\Data;

use Spatie\LaravelData\Data;

class GalleryData extends Data
{
    public function __construct(
        public string $id,
        public string $name,
        public string $slug,
        public ?string $description,
        public ?string $user_id,

        public string $logo_url,
        public string $banner_url,
        public array $images_urls,
    )
    {
        //
    }
}
