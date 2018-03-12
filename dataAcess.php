
<?php
session_start();

$pdo = new PDO("mysql:host=kunet;dbname=db_k1601070","k1601070","Durian", [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];

function sanitiseInput($input, $type) {
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
}

function FetchAllFlights() {
  global $pdo;
  $statement = $pdo->prepare("SELECT * FROM Flights");
  $statement->execute();
  $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Flight');
  return $results;
}

function FetchAllUsers() {
  global $pdo;
  $statement = $pdo->prepare("SELECT * FROM Users");
  $statement->execute();
  $results = $statement->fetchAll(PDO::FETCH_CLASS, 'User');
  return $results;
}

function FetchAllDestinations() {
  global $pdo;
  $statement = $pdo->prepare("SELECT * FROM Destinations ORDER BY DestinationName");
  $statement->execute();
  $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Destination');
  return $results;
}


function FlightSearchResults() {
  if(!isset($_POST['to'])) {
    $_POST['to'] = 'Stansted';
  }
  if(isset($_POST['from']) && isset($_POST['to']) && isset($_POST['departureDate']) ) {
  	$FlyingFrom = sanitiseInput($_POST['from'], 'STRING');
  	$FlightDestination = sanitiseInput($_POST['to'], 'STRING');
  	$FlightDepartDate = sanitiseInput($_POST['departureDate'], 'STRING');
  	$adults = sanitiseInput($_POST['adults'], 'NUMBER');
  	$children = sanitiseInput($_POST['children'], 'NUMBER');
  	global $pdo;
  	$statement = $pdo->prepare("SELECT * FROM Flights WHERE FlyingFrom = '$FlyingFrom' AND FlightDestination = '$FlightDestination' AND FlightDepartDate = '$FlightDepartDate ' ORDER BY FlightDepartTime");
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Flight');
    return $results;

    $_SESSION['adults'] = $adults;
    $_SESSION['children'] = $children;
    $_SESSION['passengers'] = $adults + $children;
    $_SESSION['from'] = $from;
    $_SESSION['to'] = $to;
    $_SESSION['departureDate'] = $departureDate;
  }
}
function getFlightReturnSearchResults() {
  if(!isset($_POST['to'])) {
    $_POST['to'] = 'Stansted';
  }
  if(isset($_POST['from']) && isset($_POST['to']) && isset($_POST['departureDate']) ) {
    $FlyingFrom = $_POST['to'];
    $FlightDestination = $_POST['from'];
    $FlightDepartDatee = $_POST['returnDate'];
    $FlyingFrom = filter_var($FlyingFrom , FILTER_SANITIZE_STRING);
    $FlightDestination = filter_var($FlightDestination, FILTER_SANITIZE_STRING);
  	global $pdo;
  	$statement = $pdo->prepare("SELECT * FROM Flights WHERE FlyingFrom = '$FlyingFrom' AND FlightDestination = '$FlightDestination' AND FlightDepartDate = '$FlightDepartDate' ORDER BY FlightDepartTime");
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Flight');
    return $results;
  }
}


  function SignIn() {
  if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['UserPassword']) && !empty($_POST['UserPassword']) ) {
    $username= sanitiseInput($_POST['username'], 'USERNAME');
    $EnteredUserPassword = sanitiseInput($_POST['UserPassword'], 'STRING');
    global $pdo;
    $statement = $pdo->prepare("SELECT UserType, UserFirstName, UserLastName, UserEmail, UserMobileNo, UserPassword, ,  FROM Users WHERE UserEmail = '$email' LIMIT 1");
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_CLASS, 'User');
    $user = $statement->fetch();

    $UserType = $User->$UserType;
    $UserActualEmail = $User->UserEmail;
    $UserActualPassword = $User->UserPassword;
    $UserMobileNo = $User->UserMobileNo;
    $UserFirstName = $User->UserFirstName;
    $UserLastName = $User->UserLastName;
    $UserAddress = $User->UserAddress;

		if (password_verify($EnteredUserPassword, $UserActualPassword)) {
      $_SESSION['isAdmin'] = $UserType;
      $_SESSION['isLoggedIn'] = true;
      $_SESSION['UserEmail'] = $UserActualEmaill;
      $_SESSION['UserMobileNo'] = $UserMobileNo;
      $_SESSION['UserFirstName'] = $UserFirstName;
      $_SESSION['UserLastName'] = $UserLastName;
      $_SESSION['UserAddress'] = $UserAddress;
    }
  } else {
    header('Location: ');
  }

}

function signOut() {
  session_destroy();
  header('Location: ');
  exit();
}

  function SignUP() {
  if (isset($_POST['username-register']) && !empty($_POST['username-register'])) {
    $UserType = 2;
    $UserEmail = sanitiseInput($_POST['username-register'], 'USERNAME');
    $UserMobileNo = sanitiseInput($_POST['UserMobileNo'], 'STRING');
    $UserPassword = sanitiseInput($_POST['UserPassword-register'], 'STRING');
    $UserFirstName = sanitiseInput($_POST['firstName'], 'STRING');
    $UserLastName= sanitiseInput($_POST['lastName'], 'STRING');
    $UserAddress = sanitiseInput($_POST['addressStreet'], 'STRING');
    $hashedPassword = password_hash($UserPassword, PASSWORD_DEFAULT);
    global $pdo;
    $statement = $pdo->prepare("INSERT INTO Users (UserType, UserFirstName, UserLastName, UserEmail, UserMobileNo, UserPassword,UserAddress) VALUES ('$UserType', '$UserFirstName','$UserLastName', '$UserEmail', '$UserMobileNo', '$hashedPassword', '$UserAddress')");
    $statement->execute();
  }
}

}

  function updateUsersDetails() {
	$UserMobileNo = sanitiseInput($_POST['UserMobileNo'], 'STRING');
  $UserPassword= sanitiseInput($_POST['UserPassword'], 'STRING');
  $UserPasswordRepeat = sanitiseInput($_POST['UserPasswordRepeat'], 'STRING');
	$UserFirstName = sanitiseInput($_POST['firstName'], 'STRING');
	$UserLastName= sanitiseInput($_POST['lastName'], 'STRING');
	$UserAddress = sanitiseInput($_POST['addressStreet'], 'STRING');

    if($UserPassword === $UserPasswordRepeat) {
    global $pdo;
    $username = $_SESSION['username'];
    $statement = $pdo->prepare("UPDATE Users SET UserFirstName, UserLastName, UserEmail, UserMobileNo, UserAddress WHERE username = '$user'");
    $statement->execute();

		$_SESSION['UserMobileNo'] = $UserMobileNo;
		$_SESSION['UserFirstName'] = $UserFirstName;
		$_SESSION['UserLastName'] = $UserLastName;
		$_SESSION['UserAddress'] = $UserAddress;

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
