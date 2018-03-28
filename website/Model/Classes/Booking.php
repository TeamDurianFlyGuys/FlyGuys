<?php
class Booking {
	private $BookingID;
  private $FlightID;
  private $BookingDate;

  function __construct()
	{

  }
	
  function __get($name) {
    return $this->$name;
  }
  function __set($name, $value) {
    $this->$name = $value;
  }
}
