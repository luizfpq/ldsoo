<?php

class ScheduleView
{

  const createRoute = 'view/schedule/create.php';

  const updateRoute = 'view/schedule/update.php';

  const deleteRoute = 'view/schedule/delete.php';

  const listRoute = 'view/schedule/list.php';

  const indexRoute = 'view/schedule/index.php';

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
