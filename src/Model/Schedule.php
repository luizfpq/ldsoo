<?php

class Schedule
{
  private $id;
  private $date;
  private $category;
  private $__user;//Criador ou organizador
  private $__create;//Data de criação
  private $update;//Última alteração
  private $order;
  private $description;

  public function setId($id){ $this->id = $id; }

  public function getId() { return $this->id; }

  public function setDate($date) { $this->date = $date; }

  public function getDate(){ return $this->date; }

  public function setDescription($description) { $this->description = $description; }

  public function getDescription() { return $this->description; }

  public function getUser) { return $this->user; }

  public function setUser($__user)) { $this->user = $user; }

  public function getCreate) { return $this->create; }

  public function setCreate($__create)) { $this->create = $create; }

  public function getUpdate) { return $this->update; }

  public function setUpdate($update)) { $this->update = $update; }

  public function getOrder) { return $this->order; }

  public function setOrder($order)) { $this->order = $order; }

  public function __construct() { }

  
}