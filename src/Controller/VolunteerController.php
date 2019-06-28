<?php

class VolunteerController extends Controller
{
  private $view;

  private $route;

  public function __construct(){

    $this->view = new VolunteerView();
  }

  public function volunteerAction(){

    $this->setRoute($this->view->getVolunteerRoute());

    $this->showView();

  }
}
