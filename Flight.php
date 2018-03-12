<?php
class Flight {
	private $FlightID;
	private $FlightType;
	private $FlightNo;
	private $FlyingFrom;
	private $FlightDestination;
  private $FlightDepartDate;
  private $FlightDepartTime;
  private $FlightArrival;
	private $flightDuration;
	private $price;

  function __construct() { }
  function __get($name) {
    return $this->$name;
  }
  function __set($name, $value) {
    $this->$name = $value;
  }
  function FlightDepartDate() {
    $newDate = date("d/m", strtotime($this->FlightDepartDate));
    return $newDate;
  }
}
?>
