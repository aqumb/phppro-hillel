<?php

namespace App\Context;

abstract class Strategy implements StrategyInterface {

    abstract protected function formatProperty(string $name, $value): string;
    abstract protected function format(array $object): string;
    public function formatObject(array $object): string
    {
        $formattedObject = [];

        foreach ($object as $property => $value) {
            $formattedObject[] = $this->formatProperty($property, $value);
        }

        return implode("\n", $formattedObject) . "\n________";
    }

    public function formatResult(array $result, string $strategyName): array
    {
        return [
            'name' => $strategyName . '_' . date('Y-m-d') . '.txt',
            'text' => implode("\n", $result),
        ];
    }
}
