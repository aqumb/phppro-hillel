<?php

namespace App\DeliveryCalculator;
class DeliveryCalculator {
    private $price;
    private $method;

    public function setPrice($price) : void
    {
        $this->price = $price;
    }

    public function getPrice() : mixed
    {
        return $this->price;
    }

    public function setMethod($method) : void
    {
        $this->method = $method;
    }

    public function getMethod() : mixed
    {
        return $this->method;
    }

    public function calculatePrice($weight, $length, $width, $height, $sellerPrice = null) : array
    {
        $weightPrice = $weight * 50;
        $volumeWeightPrice = (($length * $width * $height) / 1000) * 50;

        if ($weightPrice >= $volumeWeightPrice && $weightPrice >= $sellerPrice) {
            $this->setPrice($weightPrice);
            $this->setMethod('Weight');
        } elseif ($volumeWeightPrice >= $weightPrice && $volumeWeightPrice >= $sellerPrice) {
            $this->setPrice($volumeWeightPrice);
            $this->setMethod('Volume Weight');
        } elseif ($sellerPrice !== null) {
            $this->setPrice($sellerPrice);
            $this->setMethod('Seller Price');
        }

        return ['price' => $this->getPrice(), 'method' => $this->getMethod()];
    }


}

