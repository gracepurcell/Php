<?php
class Manager{
    private $name;
    private $phone;

    
    public function __construct($n, $p) {
        $this->name = $n;
        $this->phone = $p;
    }
    
    public function getName() { return $this->name; }
    public function getPhone() { return $this->phone; }

}