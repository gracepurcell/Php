<?php
class Event{
    private $date;
    private $time;
    private $title;
    private $attending;
    private $address;
    private $eventManager;
    private $price;
    
    public function __construct($d, $tm, $tt, $at, $ad, $em, $p) {
        $this->date = $d;
        $this->time = $tm;
        $this->title = $tt;
        $this->attending = $at;
        $this->address= $ad;
        $this->eventManager = $em;
        $this->price = $p;
    }
    
    public function getDate() { return $this->date; }
    public function getTime() { return $this->time; }
    public function getTitle() { return $this->title; }
    public function getAttending() { return $this->attending; }
    public function getAddress() { return $this->address;}
    public function getEventManager() {return $this->eventManager;}
    public function getPrice() {return $this->price;}
}
