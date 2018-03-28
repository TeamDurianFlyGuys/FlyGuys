<?php
  session_start();
  require_once ("homepage.html");
  require_once ("dataAccess-db.php");

  //$status = false;
  $departure_point = "";

  if(isset($_REQUEST["dptpoint"]))
  {
    $departure_point = $_REQUEST["dptpoint"];
    //$givenname = $_REQUEST["givenname"];
    //$address = $_REQUEST["address"];

    $flight = new Flight();
    $flight->departure_point = htmlentities($departure_point);
    //$customer->givenname = htmlentities($givenname);
    //$customer->address = htmlentities($address);

  }

  // should really direct to a view...
  $flights = FetchAllFlights($departure_point);


  require_once ("viewflight.html");
?>
