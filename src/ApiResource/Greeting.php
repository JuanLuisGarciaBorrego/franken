<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\State\GreetingStateProvider;

#[ApiResource(
    operations: [
        new Get(),
        new GetCollection(),
    ],
    paginationEnabled: false,
    provider: GreetingStateProvider::class
)]
class Greeting
{
    #[ApiProperty(identifier: true)]
    public int $id;

    public string $text;

    public function __construct(int $id, string $text)
    {
        $this->id = $id;
        $this->text = $text;
    }
}