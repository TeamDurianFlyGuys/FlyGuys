<?php
class Destination {
	private $DestinationsID;
  private $DepartureDestination;
	private $ArrivalDestination;
	private $FlightNo;

  function __construct() { }
  function __get($name) {
    return $this->$name;
  }
  function __set($name, $value) {
    $this->$name = $value;
  }
}

?>
