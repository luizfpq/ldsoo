<?php

class ScheduleView
{

	const scheduleRoute = 'view/schedule/index.php';

	const createRoute = 'view/schedule/create.php';

  	const updateRoute = 'view/schedule/update.php';

  	const deleteRoute = 'view/schedule/delete.php';

<<<<<<< HEAD
=======
  	const detailsRoute = 'view/schedule/details.php';

>>>>>>> 10e4f6e96e5edb8767d1ee463a5bf1b136cf1bdf
  	const listRoute = 'view/schedule/list.php';

  	public function __construct(){}

  	public function getScheduleRoute(){

    	return self::scheduleRoute;
  	}

  	public function getCreateRoute(){

	    return self::createRoute;
	  }

	  public function getUpdateRoute(){

	    return self::updateRoute;
	  }

	  public function getDeleteRoute(){

	    return self::deleteRoute;
	  }

<<<<<<< HEAD
=======
	  public function getDetailsRoute(){

	    return self::detailsRoute;
	  }

>>>>>>> 10e4f6e96e5edb8767d1ee463a5bf1b136cf1bdf
	  public function getListRoute(){

	    return self::listRoute;
	  }


}
