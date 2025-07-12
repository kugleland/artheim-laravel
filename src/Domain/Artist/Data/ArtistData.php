<?php

namespace Domain\Artist\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapFrom;

class ArtistData extends Data
{
    public function __construct(
        public string $first_name,
        public string $last_name,
        public ?string $alias = null,

        public string $profile_image_url
    )
    {
        #$media = $this->getFirstMedia('profile_image');
        #$media = $this->getMedia('profile_image')->first()->getUrl();

        #dd($media);
        #$this->profile_image_path = $media->getUrl();
    }

}
