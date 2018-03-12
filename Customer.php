<?php

class Customer {
	private $CustID;
	private $CustName;
	private $CustDOB;
  private $CustEmail;
  private $CustMobileNo;
  private $CustAddress;
  private $CustPassword;

  function __construct() {
  }
  function __get($name) {
    return $this->$name;
  }
  function __set($name, $value) {
    $this->$name = $value;
  }
}
