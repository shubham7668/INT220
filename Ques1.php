<?php

class Nums  
{
    private $CA1 = 7;
    private $CA2 = 8;

    public function sum() 
    {
        return $this->CA1 + $this->CA2;
    }

    public function __set($name,$value) {
      switch($name) { 
        case 'a': 
          return $this->setA($value);
        case 'b': 
          return $this->setB($value);
      }
    }

    public function __get($name) {
      switch($name) {
        case 'a': 
          return $this->getA();
        case 'b': 
          return $this->getB();
      }
    }

    private function setA($i) {
      $this->a = $i;
    }

    private function getA() {
      return $this->$CA1;
    }

    private function setB($i) {
      $this->b = $i;
    }

    private function getB() {
      return $this->$CA3;
    }

}

?>