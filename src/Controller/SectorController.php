<?php

class SectorController extends Controller
{
  private $view;

  private $route;

  public function __construct(){

    $this->view = new SectorView();
  }

  public function sectorAction(){

    $this->setRoute($this->view->getSectorRoute());

    $this->showView();

  }
}
