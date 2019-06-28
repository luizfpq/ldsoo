<?php

class Activity{
	private $id;
	private $name;
    private $description;
    private $user;
    private $create;
    private $update;
    private $sector;
   


        
	
	public function __construct(){}
	
	public function setName($name){ $this->name = $name;}
	
	public function getName(){ return $this->name;}
	
	public function setDescription($description){ $this->description = $description;}

    public function getDescription(){ return $this->description;}

    public function getUser(){ return $this->user;}
    
    public function setUser(){ return $this->user = $user;}

    public function getCreate(){ return $this->create;}
    
    public function setCreate(){ return $this-> = $create;}

    public function getUpdate(){ return $this->update;}
    
    public function setUpdate(){ return $this->update = $update;}

    public function getSector(){ return $this->sector;}
    
    public function setSector(){ return $this->sector = $sector;}

	public function getId(){ return $this->id;}
    
    
}
