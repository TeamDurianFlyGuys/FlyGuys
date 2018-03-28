
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$pdo = new PDO("mysql:host=kunet;dbname=db_k1601070","k1601070","Durian", [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];

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

function FetchAllFlights($departure_point) {
  global $pdo;
  $statement = $pdo->prepare('SELECT FLIGHT_ID, DEPARTURE_POINT, DESTINATION_POINT, DEPARTURE_DATE, DEPARTURE_TIME, ARRIVAL_DATE, ARRIVAL_TIME, DURATION, FLIGHT_TYPE, FLIGHT_STATUS, PRICE FROM FLIGHTS
                              WHERE DEPARTURE_POINT = ?');
  $statement->execute();
  $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Flight');
  return $results;
}


function FetchAllDestinations() {
  global $pdo;
  $statement = $pdo->prepare("SELECT * FROM Destinations ORDER BY DestinationID");
  $statement->execute();
  $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Destination');
  return $results;
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
