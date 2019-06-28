<?php

class ActionView
{

  const createRoute = 'view/action/create.php';

  const updateRoute = 'view/action/update.php';

  const deleteRoute = 'view/action/delete.php';

  const listRoute = 'view/action/list.php';

  const indexRoute = 'view/action/index.php';

  public function __construct(){}

  public function getCreateRoute(){

    return self::createRoute;
  }

  public function getUpdateRoute(){

    return self::updateRoute;
  }

  public function getDeleteRoute(){

    return self::deleteRoute;
  }

  public function getListRoute(){

    return self::listRoute;
  }

  public function getIndexRoute(){

    return self::indexRoute;
  }
}