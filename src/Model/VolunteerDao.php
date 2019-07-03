<?php

class VolunteerDao
{
  public function __construct(){ }

  public function create($volunteer)
  {

    $db = Database::singleton();

    $sql = "INSERT INTO volunteer (username,email, password, role) VALUES (?,?,?,?)";

    echo '<script>';
    echo 'console.log('. json_encode( $sql ) .')';
    echo '</script>';

    $sth = $db->prepare($sql);

    $sth->bindValue(1, $volunteer->getUsername(), PDO::PARAM_STR);

    $sth->bindValue(2, $volunteer->getEmail(), PDO::PARAM_STR);

    $sth->bindValue(3, sha1($volunteer->getPassword()), PDO::PARAM_STR);

		$sth->bindValue(4, $volunteer->getRole(), PDO::PARAM_STR);

    if($sth->execute()) {
      return $db->lastInsertId();;
    }
    return false;

  }

  public function getById($id)
  {

    $db = Database::singleton();

    $sql = "SELECT * FROM volunteer WHERE id = ?";

    $sth = $db->prepare($sql);

    $sth->bindValue(1, $id, PDO::PARAM_STR);

    $sth->execute();

    if($obj = $sth->fetch(PDO::FETCH_OBJ))
    {
      $volunteer = new Volunteer();

      $volunteer->setUsername($obj->username);
      $volunteer->setEmail($obj->email);
      $volunteer->setRole($obj->role);
      $volunteer->setId($obj->id);

      return $volunteer;
    }
  }

  public function update($volunteer){

    $db = Database::singleton();

    $sql = "UPDATE volunteer SET username = ?, email =  ?, role = ? WHERE id = ?";

    $sth = $db->prepare($sql);

    $sth->bindValue(1, $volunteer->getUsername(), PDO::PARAM_STR);

    $sth->bindValue(2, $volunteer->getEmail(), PDO::PARAM_STR);

		$sth->bindValue(3, $volunteer->getRole(), PDO::PARAM_STR);

    $sth->bindValue(4, $volunteer->getId(), PDO::PARAM_STR);

    $sth->execute();

  }

  public function setLocale($volunteer){

    $db = Database::singleton();

    $sql = "UPDATE volunteer SET locale = ? WHERE id = ? ";

    $sth = $db->prepare($sql);

    $sth->bindValue(1, $volunteer->getLocale(), PDO::PARAM_STR);

    $sth->bindValue(2, $volunteer->getId(), PDO::PARAM_STR);

    $sth->execute();

  }

  public function delete($id){

    $db = Database::singleton();

    $sql = "DELETE FROM volunteer WHERE id = ?";

    $sth = $db->prepare($sql);

    $sth->bindValue(1, $id, PDO::PARAM_STR);

    $sth->execute();

  }

  public function getAll(){

    $db = Database::singleton();

    $sql = "SELECT * FROM  volunteer";

    $sth = $db->prepare($sql);

    $sth->execute();

    $volunteers = array();

    while($obj = $sth->fetch(PDO::FETCH_OBJ))
    {
      $volunteer = new Volunteer();
      $volunteer->setId($obj->id);
      $volunteer->setUsername($obj->username);
      $volunteer->setEmail($obj->email);
      $volunteer->setRole($obj->role);

      $volunteers[] = $volunteer;
    }

    return $volunteers;
  }
}