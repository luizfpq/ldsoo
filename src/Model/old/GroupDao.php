<?php

class GroupDao
{
  public function __construct(){}

  public function create($group)
  { 
    
    $db = Database::singleton();

    $sql = 'INSERT INTO "group" (name,description, active) VALUES (?,?,?)';

    $sth = $db->prepare($sql);

    $sth->bindValue(1, $group->getName(), PDO::PARAM_STR);

    $sth->bindValue(2, $group->getDescription(), PDO::PARAM_STR);

    $sth->bindValue(3, $group->getActive(), PDO::PARAM_STR);

    if($sth->execute())
      return true;

    return false;

  }

  public function getById($id)
  {
    
    $db = Database::singleton();

    $sql = 'SELECT * FROM "group" WHERE id = ?';

    $sth = $db->prepare($sql);

    $sth->bindValue(1, $id, PDO::PARAM_STR);

    $sth->execute();

    if($obj = $sth->fetch(PDO::FETCH_OBJ))
    {
      $group = new Group();

      $group->setName($obj->name);
      $group->setDescription($obj->description);
      $group->setActive($obj->active);

      return $group;
    }
  }

  public function update($group){

    $db = Database::singleton();

    $sql = 'UPDATE "group" SET name = ?, description =  ?, active = ? WHERE id = ?';
    
    $sth = $db->prepare($sql);

    $sth->bindValue(1, $group->getName(), PDO::PARAM_STR);

    $sth->bindValue(2, $group->getDescription(), PDO::PARAM_STR);

    $sth->bindValue(3, $group->getActive(), PDO::PARAM_STR);

    $sth->bindValue(4, $group->getId(), PDO::PARAM_STR);

    $sth->execute();
     
  }

  public function delete($id){

    $db = Database::singleton();

    $sql = 'DELETE FROM "group" WHERE id = ?';

    $sth = $db->prepare($sql);

    $sth->bindValue(1, $id, PDO::PARAM_STR);

    $sth->execute();

  }

  public function getAll(){

    $db = Database::singleton();

    $sql = 'SELECT * FROM  "group"';

    $sth = $db->prepare($sql);

    $sth->execute();

    $groups = array();

    while($obj = $sth->fetch(PDO::FETCH_OBJ))
    {
      $group = new Group();

      $group->setId($obj->id);
      $group->setName($obj->name);
      $group->setDescription($obj->description);
      $group->setActive($obj->active);

      $groups[] = $group;
      
    }

    return $groups;
  }
}