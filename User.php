<?php
class  User  {
	private $UserID;
	private $UserType;
	private $UserFirstName;
  private $UserLastName;
  private $UserEmail;
  private $UserMobileNo;
  private $UserPassword;
  private $UserAddress;

  function __construct() {
  }
  function __get($name) {
    return $this->$name;
  }
  function __set($name, $value) {
    $this->$name = $value;
  }
  function getUserFullName() {

   $UserFullName = $this->UserFirstName . ' ' . $this->UserLastName;
    return $UserFullName;
  }
}
