<?php

class ActivityController extends Controller
{
  private $view;

  private $route;

  public function __construct(){

    $this->view = new ActivityView();
  }

  public function activityAction(){

    $this->setRoute($this->view->getActivityRoute());

    $this->showView();

  }
}
