<?php

namespace App\Context;

interface StrategyInterface
{
    public function formatObject(array $object): string;
    public function formatResult(array $result, string $strategyName): array;
}
