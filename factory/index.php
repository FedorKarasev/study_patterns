<?php

abstract class PizzaType {
    public function getPizza(){}
}

class HavaiPizza extends PizzaType {

    private $name = 'Гавайская пицца';

    public function getPizza()
    {
        return $this->name;
    }

}

class SalamyPizza extends PizzaType {

    private $name = 'Салями пицца';

    public function getPizza()
    {
        return $this->name;
    }

}

class MargaritaPizza extends PizzaType {

    private $name = 'Маргарита пицца';

    public function getPizza()
    {
        return $this->name;
    }

}

class PizzaFactory {

    public static function createPizza($name)
    {
        $className = $name . 'Pizza';

        if ( class_exists($className) ) {
            return new $className;
        }

        return false;
    }
}

$pizza = PizzaFactory::createPizza('Havai');
if ( $pizza ) {
    echo $pizza->getPizza();
} else {
    echo 'There`s no this pizza in menu';
}

echo '<br>';

$pizza = PizzaFactory::createPizza('Salamy');
if ( $pizza ) {
    echo $pizza->getPizza();
} else {
    echo 'There`s no this pizza in menu';
}

echo '<br>';

$pizza = PizzaFactory::createPizza('Margarita');
if ( $pizza ) {
    echo $pizza->getPizza();
} else {
    echo 'There`s no this pizza in menu';
}

echo '<br>';

$pizza = PizzaFactory::createPizza('Vaivai');
if ( $pizza ) {
    echo $pizza->getPizza();
} else {
    echo 'There`s no this pizza in menu';
}