<?php

interface Observer {
    public function addCurrency(Currency $currency);
}

class PriceSimulator implements Observer {

    private $currencies;

    public function __construct()
    {
        $this->currencies = [];
    }

    public function addCurrency(Currency $currency)
    {
        array_push($this->currencies, $currency);
    }

    public function updatePrice() {
        foreach ($this->currencies as $currency) {
            $currency->update();
        }
    }
}

interface Currency {
    public function update();
    public function getPrice();
}

class Pound implements Currency {

    private $price;

    public function __construct($price)
    {
        $this->price = $price;
        echo '<p>Pound original price: ' . $price . '</p>';
    }

    public function update()
    {
        $this->price = $this->getPrice();
        echo '<p>Pound updated price: ' . $this->price . '</p>';
    }

    public function getPrice()
    {
        return f_rand(0.65, 0.71);
    }

}

class Dollar implements Currency {

    private $price;

    public function __construct($price)
    {
        $this->price = $price;
        echo '<p>Dollar original price: ' . $price . '</p>';
    }

    public function update()
    {
        $this->price = $this->getPrice();
        echo '<p>Dollar updated price: ' . $this->price . '</p>';
    }

    public function getPrice()
    {
        return f_rand(0.56, 0.64);
    }

}

function f_rand($min = 0, $max = 1, $mul = 1000000)
{
    if ($min > $max) return false;
    return mt_rand($min*$mul, $max*$mul)/$mul;
}

$priceSimulator = new PriceSimulator();

$currency1 = new Pound(0.60);
$currency2 = new Dollar(0.57);

$priceSimulator->addCurrency($currency1);
$priceSimulator->addCurrency($currency2);

echo '<br>';
$priceSimulator->updatePrice();

echo '<br>';
$priceSimulator->updatePrice();