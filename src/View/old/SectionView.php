<?php

class SectionView
{

  const createRoute = 'view/section/create.php';

  const updateRoute = 'view/section/update.php';

  const deleteRoute = 'view/section/delete.php';

  const listRoute = 'view/section/list.php';

  const indexRoute = 'view/section/index.php';

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