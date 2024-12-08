<?php

namespace App\State;

use ApiPlatform\Metadata\CollectionOperationInterface;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\Greeting;

class GreetingStateProvider implements ProviderInterface
{
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        if ($operation instanceof CollectionOperationInterface) {
            return $this->items();
        }

        $filteredItems = array_filter(
            $this->items(),
            fn($item) => $item->id === $uriVariables['id']
        );

        return current($filteredItems) ?: null;
    }

    private function items(): array
    {
        return [
            new Greeting(1, 'Hello'),
            new Greeting(2, 'Bye bye'),
        ];
    }
}
