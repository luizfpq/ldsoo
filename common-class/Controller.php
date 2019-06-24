<?php

class Controller
{

  private $route;

  public function __construct(){}

  public function setRoute($route)
  {
    $this->route = $route;
  }

  public function showView($viewModel = false)
  {
    
    $localization = Localization::singleton();

    $localization->load();

    if(isset($_SESSION['user']))
      $user = unserialize($_SESSION['user']);


    if(!isset($user))
    {  
      include ('view/logon/logon.php');
    }
    else
    {
        include('view/index/header.php');

        include('view/default/message.php');

        include($this->route);

        include('view/index/footer.php');
    }
  }

}