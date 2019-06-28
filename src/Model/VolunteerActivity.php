<?php

class VolunteerActivity{
	private $user;
	private $activity;
    private $time;
    private $sector;
    private $id;
    private $create;
    private $volunteer;
    private $schedule;
   


        
	
	public function __construct(){}
	
	public function setUser($user){ $this->user = $user;}
	
	public function getUser(){ return $this->user;}
	
	public function setActivity($activity){ $this->activity = $activity;}

    public function getActivity(){ return $this->activity;}

    public function getTime(){ return $this->time;}
    
    public function setTime(){ return $this->time = $time;}

    public function getSector(){ return $this->sector;}
    
    public function setSector(){ return $this-> = $sector;}

    public function getId(){ return $this->id;}
    
    public function setId(){ return $this->id = $id;}

    public function getCreate(){ return $this->create;}
    
    public function setCreate(){ return $this->create = $create;}

	public function getVolunteer(){ return $this->volunteer;}
    
    public function setVolunteer(){ return $this->volunteer = $volunteer;}

    public function getSchedule(){ return $this->schedule;}
    
    public function setSchedule(){ return $this->schedule = $schedule;}
    
    
}
