<?php

class ActionDao
{
  public function __construct(){}

  public function create($action)
  { 
    
    $db = Database::singleton();

    $sql = "INSERT INTO action (name,description, active) VALUES (?,?,?)";

    $sth = $db->prepare($sql);

    $sth->bindValue(1, $action->getName(), PDO::PARAM_STR);

    $sth->bindValue(2, $action->getDescription(), PDO::PARAM_STR);

    $sth->bindValue(3, $action->getActive(), PDO::PARAM_STR);

    if($sth->execute())
      return true;

    return false;

  }

  public function getById($id)
  {
    
    $db = Database::singleton();

    $sql = "SELECT * FROM action WHERE id = ?";

    $sth = $db->prepare($sql);

    $sth->bindValue(1, $id, PDO::PARAM_STR);

    $sth->execute();

    if($obj = $sth->fetch(PDO::FETCH_OBJ))
    {
      $action = new Action();

      $action->setName($obj->name);
      $action->setDescription($obj->description);
      $action->setActive($obj->active);

      return $action;
    }
  }

  public function update($action){

    $db = Database::singleton();

    $sql = "UPDATE action SET name = ?, description =  ?, active = ? WHERE id = ?";
    
    $sth = $db->prepare($sql);

    $sth->bindValue(1, $action->getName(), PDO::PARAM_STR);

    $sth->bindValue(2, $action->getDescription(), PDO::PARAM_STR);

    $sth->bindValue(3, $action->getActive(), PDO::PARAM_STR);

    $sth->bindValue(4, $action->getId(), PDO::PARAM_STR);

    $sth->execute();
     
  }

  public function delete($id){

    $db = Database::singleton();

    $sql = "DELETE FROM action WHERE id = ?";

    $sth = $db->prepare($sql);

    $sth->bindValue(1, $id, PDO::PARAM_STR);

    $sth->execute();

  }

  public function getAll(){

    $db = Database::singleton();

    $sql = "SELECT * FROM  action";

    $sth = $db->prepare($sql);

    $sth->execute();

    $actions = array();

    while($obj = $sth->fetch(PDO::FETCH_OBJ))
    {
      $action = new Action();
      $action->setId($obj->id);
      $action->setName($obj->name);
      $action->setDescription($obj->description);
      $action->setActive($obj->active);

      $actions[] = $action;
      
    }

    return $actions;
  }
}