<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db_user = "k1601070";
$db_name = "db_k1601070";
$db_password = "Durian";

$pdo = new
 PDO("mysql:host=kunet;dbname=$db_name",$db_user,$db_password);

/*function sanitiseInput($input, $type) {
	if($type == 'STRING') {
		$output = trim($input);
		$output = filter_var($output, FILTER_SANITIZE_STRING);
	} else if ($type == 'USERNAME') {
		$output = trim($input);
		$output = filter_var($output, FILTER_SANITIZE_EMAIL);
	} else if ($type == 'NUMBER') {
		$output = trim($input);
		$output = filter_var($output, FILTER_SANITIZE_INT);
	} else {
		$output = false;
	}
  return $output;
}*/

function FetchOneWayFlights($departure_point,$destination_point,$departure_date) {
  global $pdo;
  $statement = $pdo->prepare('SELECT FLIGHT_ID, DEPARTURE_POINT, DESTINATION_POINT, DEPARTURE_DATE, DEPARTURE_TIME, ARRIVAL_DATE, ARRIVAL_TIME, DURATION, FLIGHT_TYPE, FLIGHT_STATUS, PRICE FROM FLIGHTS
                              WHERE DEPARTURE_POINT = ? AND DESTINATION_POINT = ? AND DEPARTURE_DATE = ?');
  $statement->execute([$departure_point,$destination_point,$departure_date]);
  $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Flight');
  return array($results,$statement);
}

function FetchReturnFlights($destination_point,$departure_point,$return_date) {
  global $pdo;
  $statement = $pdo->prepare('SELECT FLIGHT_ID, DEPARTURE_POINT, DESTINATION_POINT, DEPARTURE_DATE, DEPARTURE_TIME, ARRIVAL_DATE, ARRIVAL_TIME, DURATION, FLIGHT_TYPE, FLIGHT_STATUS, PRICE FROM FLIGHTS
                              WHERE DEPARTURE_POINT = ? AND DESTINATION_POINT = ? AND DEPARTURE_DATE = ?');
  $statement->execute([$destination_point,$departure_point,$return_date]);
  $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Flight');
  return array($results,$statement);
}




function FlightSearchResults()
{

}

function getFlightReturnSearchResults()
{

}



  function SignIn() {

}

function signOut() {
  session_destroy();
  header('Location: ');
  exit();
}

  function SignUP() {

}

function adminUpdateDestinations() {

}

function navbar() {
	if($_SESSION['isLoggedIn'] === true) {
		if($_SESSION['isAdmin'] == 1) {
      require_once '';
    } else {
      require_once '';
    }
  } else {
    require_once '';
  }
}
function Basket() {
	$basket = array();

  $booking = new Booking();
  $booking->bookingID = 1;
  $booking->flightID = 20;
  $booking->CustomerCount = 2;
  $basket[] = $booking;
  $_SESSION['basket'] = $basket;
}

function emptyBasket() {
  unset($_SESSION['basket']);
}
function Wishlist() {
}

function notification() {
}


?>
