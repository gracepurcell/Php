<?php
class Manager{
    private $name;
    private $phone;
    private $address;
    private $email;

    
    public function __construct($n, $p, $ma, $ema) {
        $this->name = $n;
        $this->phone = $p;
        $this->address = $ma;
        $this->email = $ema;
    }
    
    public function getName() { return $this->name; }
    public function getPhone() { return $this->phone; }
    public function getAddress() { return $this->address; }
    public function getEmail() { return $this->email; }
}