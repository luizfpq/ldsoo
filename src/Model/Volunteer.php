<?php

class Volunteer{
	private $id;
	private $name;
    private $userName;
    private $password;
    private $role;

	public function __construct(){}
	
	public function setName($name){ $this->name = $name;}
	
	public function getName(){ return $this->name;}
	
	public function setUserName($userName){ $this->userName = $userName;}

    public function getUserName(){ return $this->userName;}

    public function getPassword(){ return $this->password;}
    
    public function setPassword($password){ return $this->password = $password;}

    public function getRole(){ return $this->role;}
    
    public function setRole($role){ return $this-> = $role;}

	public function getId(){ return $this->id;}
    
    
}
