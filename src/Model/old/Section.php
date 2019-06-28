<?php

class Section
{
  private $id;
  private $name;
  private $description;
  private $active;

  public function __construct() { }

  public function setId($id){ $this->id = $id; }

  public function getId() { return $this->id; }

  public function setName($name) { $this->name = $name; }

  public function getName(){ return $this->name; }

  public function setDescription($description) { $this->description = $description; }

  public function getDescription() { return $this->description; }

  public function getActive() { return $this->active; }

	public function setActive($active) { $this->active = $active; }
}