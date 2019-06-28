<?php

class Teacher extends User{

  private $siape = '';

  public function __construct()
  {

  }

  public function getIdentificationNumber()
  {
    return $this->siape;
  }

  public function setIdentificationNumber($identificationNumber)
  {
    $this->siape = $identificationNumber;
  }
}