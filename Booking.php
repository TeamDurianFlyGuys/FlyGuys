<?php
class Booking {
	private $bookingID;
  private $flightID;
	private $customerCount;
  private $SeatsID;

  function __construct() {
  }
  function __get($name) {
    return $this->$name;
  }
  function __set($name, $value) {
    $this->$name = $value;
  }
}
