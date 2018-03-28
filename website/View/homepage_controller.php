<?php
  session_start();
  require_once ("Flight.php");
  require_once ("dataAccess-db.php");

  //$status = false;
  $departure_point = "";
  $destination_point = "";
  $departure_date = "";
  $return_date = "";
  $flightchoice = "";

  if(isset($_REQUEST["dptpoint"]))
  {
    $departure_point = $_REQUEST["dptpoint"];
    $destination_point = $_REQUEST["despoint"];
    $departure_date = $_REQUEST["goingdate"];
    $return_date = $_REQUEST["returndate"];
    $flightchoice = $_REQUEST["optradio"];
    //$givenname = $_REQUEST["givenname"];
    //$address = $_REQUEST["address"];

    //$flight = new Flight();
    //$flight->departure_point = htmlentities($departure_point);
    //$customer->givenname = htmlentities($givenname);
    //$customer->address = htmlentities($address);

  }

  // should really direct to a view...
  $onewayFlights = FetchOneWayFlights($departure_point,$destination_point,$departure_date);
  $returnFlights = FetchReturnFlights($destination_point,$departure_point,$return_date);

  if($flightchoice == "oneway")
  {
    require_once ("viewOnewayFlights.php");
  }
  else if ($flightchoice == "return")
  {
    require_once ("viewReturnFlights.php");
  }
?>
