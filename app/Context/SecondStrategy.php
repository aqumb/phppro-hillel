<?php

namespace App\Context;

class SecondStrategy extends Strategy
{
    protected function formatProperty(string $name, $value): string
    {
        $formattedName = implode(' ', array_map(function ($word) {
            return lcfirst($word);
        }, preg_split('/(?=[A-Z])/', $name)));

        return "|$formattedName|$value|";
    }

    public function format(array $object): string
    {
        return $this->formatObject($object);
    }
}

