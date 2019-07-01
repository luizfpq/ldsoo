<?php

class ScheduleController extends Controller
{
  private $view;

  private $route;

  public function __construct(){

    $this->view = new ScheduleView();
  }

  public function scheduleAction(){

    $this->setRoute($this->view->getScheduleRoute());

    $this->showView();

  }
}
