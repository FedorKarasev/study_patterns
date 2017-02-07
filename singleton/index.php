<?php

final class Singelton {

    private static $instance;
    private function __construct() {}
    private function __clone() {}

    public $a;
    private $props = [];

    public static function getInstance()
    {
        if ( !self::$instance instanceof  self ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function setProperty($key, $val)
    {
        $this->props[$key] = $val;
    }

    public function getProperty($key)
    {
        return $this->props[$key];
    }

}

$first = Singelton::getInstance();
$second = Singelton::getInstance();

$first->setProperty('one', '1');
print_r( $second->getProperty('one') );