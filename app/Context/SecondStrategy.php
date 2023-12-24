<?php

namespace App\Context;

class SecondStrategy extends Strategy
{
    public function format($object) : array
    {
        $formattedText = '' . PHP_EOL;

        foreach ($object as $property => $value) {
            $propertyWords = implode(' ', array_map(function ($word) {
                return lcfirst($word);
            }, preg_split('/(?=[A-Z])/', $property)));

            $formattedText .= '|' . $propertyWords . '|' . $value . '|' . PHP_EOL;
        }

        return [
            'name' => 'secondstrategy_' . date('Y-m-d') . '.txt',
            'text' => $formattedText,
        ];
    }
}

