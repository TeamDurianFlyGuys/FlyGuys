<?php
class Flight {
  private $flight_id;
  private $departure_point;
  private $destination_point;
  private $departure_date;
  private $departure_time;
  private $arrival_date;
  private $arrival_time;
  private $duration;
  private $flight_type;
  private $flight_status;
  private $price;

  function __get($name) {
    return $this->$name;
  }

  function __set($name,$value) {
    $this->$name = $value;
  }

}
?>
