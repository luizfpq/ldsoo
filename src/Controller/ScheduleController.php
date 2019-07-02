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

  public function createAction(){

    $this->setRoute($this->view->getCreateRoute());

    $this->showView();

  }

  public function listAction(){

    $this->setRoute($this->view->getListRoute());

    $this->showView();

  }

  public function deleteAction(){

    $this->setRoute($this->view->getDeleteRoute());

    $this->showView();

  }

  public function updateAction(){

    $this->setRoute($this->view->getUpateRoute());

    $this->showView();

  }
}
