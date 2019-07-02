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

  public function detailsAction(){

    $this->setRoute($this->view->getDetailsRoute());

    $this->showView();

  }

  public function updateAction(){

    $this->setRoute($this->view->getUpdateRoute());

    $this->showView();

  }
}
