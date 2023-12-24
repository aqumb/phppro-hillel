<?php

namespace App\Context;

abstract class Strategy implements StrategyInterface
{
    abstract public function format($object): array;
}
