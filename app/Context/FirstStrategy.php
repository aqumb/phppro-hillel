<?php

namespace App\Context;

class FirstStrategy extends Strategy
{
    public function format($object) : array
    {
        $formattedText = '' . PHP_EOL;

        foreach ($object as $property => $value) {
            $formattedText .= $property . ' – ' . $value . PHP_EOL;
        }

        return [
            'name' => 'firststrategy_' . date('Y-m-d') . '.txt',
            'text' => $formattedText,
        ];
    }
}
