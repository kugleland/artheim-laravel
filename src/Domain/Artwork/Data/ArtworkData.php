<?php

namespace Domain\Artwork\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\Computed;
use Spatie\LaravelData\Attributes\MapName;
class ArtworkData extends Data
{

    #[Computed]
    public ?string $price_formatted;

    public function __construct(
        public string $id,
        public string $title,
        public string $slug,
        public ?string $description,
        public string $primary_image_url,
        public ?string $price,
    ) {
        //
        $this->price_formatted = $this->price ? number_format($this->price, 0, ',', '.') . ' kr' : null;
    }
}
