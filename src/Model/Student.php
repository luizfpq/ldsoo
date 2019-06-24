<?php

class Student extends User{

  private $rga = '';

  public function __construct()
  {

  }

  public function getIdentificationNumber()
  {
    return $this->rga;
  }

  public function setIdentificationNumber($identificationNumber)
  {
    $this->rga = $identificationNumber;
  }

}
