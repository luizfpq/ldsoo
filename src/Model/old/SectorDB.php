<?php

class SectorDB{

	
	public function __construct(){}
	

    public function create($sector){ 
    
    $db = Database::singleton();

    $sql = "INSERT INTO _sector (name,description, user, create, update, category) VALUES (?,?,?,?,?,?)";

    $sth = $db->prepare($sql);

    $sth->bindValue(1, $sector->getName(), PDO::PARAM_STR);

    $sth->bindValue(2, $sector->getDescription(), PDO::PARAM_STR);

    $sth->bindValue(3, $sector->getUser(), PDO::PARAM_STR);

    $sth->bindValue(4, $sector->getCreate(), PDO::PARAM_STR);    

    $sth->bindValue(5, $sector->getUpdate(), PDO::PARAM_STR);

    $sth->bindValue(6, $sector->getCategory(), PDO::PARAM_STR);

    
    
    if($sth->execute())
      return $db->lastInsertId();;

    return false;

  }

  public function getById($id)
  {
    
    $db = Database::singleton();

    $sql = "SELECT * FROM _sector WHERE id = ?";

    $sth = $db->prepare($sql);

    $sth->bindValue(1, $id, PDO::PARAM_STR);

    $sth->execute();

    if($obj = $sth->fetch(PDO::FETCH_OBJ))
    {
      $sector = new Sector();

      $sector->setName($obj->name);
      $sector->setDescription($obj->description);

      return $schedule;
    }
  }

  public function update($sector){

    $db = Database::singleton();

    $sql = "UPDATE _sector SET name = ?, description =  ? WHERE id = ?";
    
    $sth = $db->prepare($sql);

    $sth->bindValue(1, $sector->getName(), PDO::PARAM_STR);

    $sth->bindValue(2, $sector->getDescription(), PDO::PARAM_STR);

    $sth->bindValue(3, $sector->getUser(), PDO::PARAM_STR);

    $sth->bindValue(4, $sector->getCreate(), PDO::PARAM_STR);    

    $sth->bindValue(5, $sector->getUpdate(), PDO::PARAM_STR);

    $sth->bindValue(6, $sector->getCategory(), PDO::PARAM_STR);


    $sth->execute();
     
  }


  public function delete($id){

    $db = Database::singleton();

    $sql = "DELETE FROM _sector WHERE id = ?";

    $sth = $db->prepare($sql);

    $sth->bindValue(1, $id, PDO::PARAM_STR);

    $sth->execute();

  }

  public function getAll(){

    $db = Database::singleton();

    $sql = "SELECT * FROM  _sector";

    $sth = $db->prepare($sql);

    $sth->execute();

    $activities = array();

    while($obj = $sth->fetch(PDO::FETCH_OBJ))
    {
      $sector = new Activity();
      $sector->setName($obj->name);
      $sector->setDescription($obj->description);
      $sector->setId($obj->id);

      $sectors[] = $sector;
      
    }

    return $sectors;
  }

}
