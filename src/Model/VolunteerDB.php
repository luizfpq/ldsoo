<?php

class VolunteerDB{

	
	public function __construct(){}
	

    public function create($volunteer){ 
    
    $db = Database::singleton();

    $sql = "INSERT INTO _volunteer (name,userName, password, role, id) VALUES (?,?,?,?,?)";

    $sth = $db->prepare($sql);

    $sth->bindValue(1, $volunteer->getName(), PDO::PARAM_STR);

    $sth->bindValue(2, $volunteer->getUserName(), PDO::PARAM_STR);

    $sth->bindValue(3, $volunteer->getPassword(), PDO::PARAM_STR);

    $sth->bindValue(4, $volunteer->getRole(), PDO::PARAM_STR);    

    $sth->bindValue(5, $volunteer->getId(), PDO::PARAM_STR);

    
    if($sth->execute())
      return $db->lastInsertId();;

    return false;

  }

  public function getById($id)
  {
    
    $db = Database::singleton();

    $sql = "SELECT * FROM _volunteer WHERE id = ?";

    $sth = $db->prepare($sql);

    $sth->bindValue(1, $id, PDO::PARAM_STR);

    $sth->execute();

    if($obj = $sth->fetch(PDO::FETCH_OBJ))
    {
      $volunteer = new Volunteer();

      $volunteer->setName($obj->volunteer);
      $volunteer->setUserName($obj->volunteer);

      return $volunteerActivity;
    }
  }

  public function update($volunteer){

    $db = Database::singleton();

    $sql = "UPDATE _volunteer SET userName = ?, name =  ? WHERE id = ?";
    
    $sth = $db->prepare($sql);

     $sth->bindValue(1, $volunteer->getName(), PDO::PARAM_STR);

    $sth->bindValue(2, $volunteer->getUserName(), PDO::PARAM_STR);

    $sth->bindValue(3, $volunteer->getPassword(), PDO::PARAM_STR);

    $sth->bindValue(4, $volunteer->getRole(), PDO::PARAM_STR);    

    $sth->bindValue(5, $volunteer->getId(), PDO::PARAM_STR);


    $sth->execute();
     
  }


  public function delete($id){

    $db = Database::singleton();

    $sql = "DELETE FROM _volunteer WHERE id = ?";

    $sth = $db->prepare($sql);

    $sth->bindValue(1, $id, PDO::PARAM_STR);

    $sth->execute();

  }

  public function getAll(){

    $db = Database::singleton();

    $sql = "SELECT * FROM  _volunteer";

    $sth = $db->prepare($sql);

    $sth->execute();

    $volunteers = array();

    while($obj = $sth->fetch(PDO::FETCH_OBJ))
    {
      $volunteer = new Volunteer();
      $volunteer->setUserName($obj->userName);
      $volunteer->setName($obj->name);
      $volunteer->setId($obj->id);

      $volunteers[] = $volunteer;
      
    }

    return $volunteers;
  }

}
