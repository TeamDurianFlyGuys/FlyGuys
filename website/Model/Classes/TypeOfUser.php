<?php


class TypeOfUser {


  private $TypeOfUserID;
	private $TypeOfUserName;

  function __construct() {
  }

  function __get($name) {
    return $this->$name;
  }

  function __set($name, $value) {
    $this->$name = $value;
  }
}

?>
