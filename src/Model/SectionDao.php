<?php

class SectionDao
{
  public function __construct(){}

  public function create($section)
  { 
    
    $db = Database::singleton();

    $sql = "INSERT INTO section (name,description, active) VALUES (?,?,?)";

    $sth = $db->prepare($sql);

    $sth->bindValue(1, $section->getName(), PDO::PARAM_STR);

    $sth->bindValue(2, $section->getDescription(), PDO::PARAM_STR);

    $sth->bindValue(3, $section->getActive(), PDO::PARAM_STR);

    if($sth->execute())
      return true;

    return false;

  }

  public function getById($id)
  {
    
    $db = Database::singleton();

    $sql = "SELECT * FROM section WHERE id = ?";

    $sth = $db->prepare($sql);

    $sth->bindValue(1, $id, PDO::PARAM_STR);

    $sth->execute();

    if($obj = $sth->fetch(PDO::FETCH_OBJ))
    {
      $section = new Section();

      $section->setName($obj->name);
      $section->setDescription($obj->description);
      $section->setActive($obj->active);

      return $section;
    }
  }

  public function update($section){

    $db = Database::singleton();

    $sql = "UPDATE section SET name = ?, description =  ?, active = ? WHERE id = ?";
    
    $sth = $db->prepare($sql);

    $sth->bindValue(1, $section->getName(), PDO::PARAM_STR);

    $sth->bindValue(2, $section->getDescription(), PDO::PARAM_STR);

    $sth->bindValue(3, $section->getActive(), PDO::PARAM_STR);

    $sth->bindValue(4, $section->getId(), PDO::PARAM_STR);

    $sth->execute();
     
  }

  public function delete($id){

    $db = Database::singleton();

    $sql = "DELETE FROM section WHERE id = ?";

    $sth = $db->prepare($sql);

    $sth->bindValue(1, $id, PDO::PARAM_STR);

    $sth->execute();

  }

  public function getAll(){

    $db = Database::singleton();

    $sql = "SELECT * FROM  section";

    $sth = $db->prepare($sql);

    $sth->execute();

    $sections = array();

    while($obj = $sth->fetch(PDO::FETCH_OBJ))
    {
      $section = new Section();
      $section->setId($obj->id);
      $section->setName($obj->name);
      $section->setDescription($obj->description);
      $section->setActive($obj->active);

      $sections[] = $section;
      
    }

    return $sections;
  }
}