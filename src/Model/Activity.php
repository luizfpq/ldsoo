<?php

class Activity
{
  private $id;
  private $name;
  private $description;
  private $_user;//Criador ou organizador
  private $_create;//Data de criação
  private $_update;//Última alteração
  private $sector;

  public function setId($id){ $this->id = $id; }

  public function getId() { return $this->id; }

  public function setName($name) { $this->name = $name; }

  public function getName(){ return $this->name; }

  public function setDescription($description) { $this->description = $description; }

  public function getDescription() { return $this->description; }

  public function getUser() { return $this->user; }

  public function setUser($_user) { $this->user = $_user; }

  public function getCreate() { return $this->create; }

  public function setCreate($_create) { $this->create = $_create; }

  public function getUpdate() { return $this->update; }

  public function setUpdate($_update) { $this->update = $_update; }

  public function getSector() { return $this->sector; }

  public function setSector($sector) { $this->sector = $sector; }


  public function __construct() { }


}
