<?php

namespace App\Context;

class FirstStrategy extends Strategy
{
    protected function formatProperty(string $name, $value): string
    {
        return "$name – $value";
    }

    public function format(array $object): string
    {
        return $this->formatObject($object);
    }
}
