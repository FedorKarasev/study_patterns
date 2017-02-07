<?php

interface payStrategy {
    public function pay($amount);
}

class payByCC implements payStrategy {

    private $ccNum = '';
    private $ccType = '';
    private $cvvNum = '';
    private $ccExpMonth = '';
    private $ccExpYear = '';

    public function pay($amount = 0)
    {
        echo "Paying ".$amount.' using credit card';
    }
}

class payByPayPal implements payStrategy {

    private $payPalEmail = '';

    public function pay($amount = 0)
    {
        echo "Paying ".$amount.' using PayPal';
    }
}

class payByCash implements payStrategy {
    public function pay($amount = 0)
    {
        echo 'Paying by cash';
    }
}

class shoppingCart {

    public $amount = 0;

    public function __construct($amount = 0)
    {
        $this->amount = $amount;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($amount = 0)
    {
        $this->amount = $amount;
    }

    public function payAmount()
    {
        if ( $this->amount >= 500 ) {
            $payment = new payByCC();
        } else if ( $this->amount > 100 && $this->amount < 500 ) {
            $payment = new payByPayPal();
        } else {
            $payment = new payByCash();
        }

        $payment->pay($this->amount);
    }
}

$cart = new shoppingCart(100);
$cart->payAmount();

echo '<br>';

$cart2 = new shoppingCart(400);
$cart2->payAmount();

echo '<br>';

$cart3 = new shoppingCart(1000);
$cart3->payAmount();