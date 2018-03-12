<?php
class Destination {
	private $DestinationsID;
  private $DestinationName
	private $FlightID;

  function __construct() { }
  function __get($name) {
    return $this->$name;
  }
  function __set($name, $value) {
    $this->$name = $value;
  }
}

?>
