<?php

namespace App\CurrencyExchange;

class CurrencyExchange
{

    const URL = 'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=';
    const TYPE = [
        'cash' => 5,
        'noт-cash' => 11,
    ];
    private $type;
    private $currency;

    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    public function getType()
    {

        return $this->type;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    public function getCurrency()
    {

        return $this->currency;
    }

    public function execute()
    {
        $exchangeJson = file_get_contents(Self::URL . Self::TYPE[$this->type]);
        $exchangeArray = json_decode($exchangeJson, true);
        foreach ($exchangeArray as $item) {
            if ($item['ccy'] == $this->currency){
                return [
                    'buy' => $item['buy'],
                    'sale' => $item['sale'],
                ];
            }
        }
    }

}
