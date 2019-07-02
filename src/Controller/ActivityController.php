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

  public function createAction(){

    $message = Message::singleton();

    $viewModel = false;

    if(isset($_REQUEST['submit']))
    {
      $name = isset($_POST['name']) ? $_POST['name'] : null;

      $description = isset($_POST['description']) ? $_POST['description'] : null;

      $_user = isset($_POST['_user']) ? $_POST['_user'] : null;

      $_create = isset($_POST['_create']) ? $_POST['_create'] : null;

      $_update = isset($_POST['_update']) ? $_POST['_update'] : null;

      $sector = isset($_POST['sector']) ? $_POST['sector'] : null;

      try
      {
          $warnings = array();

          if(!$name)
            $warnings[] = 'Nome';

          if(!$description)
            $warnings [] = 'Descricao';

          if(sizeof($warnings))
            throw new Exception ('Preencha os campos ' . implode(', ', $warnings));



          /*$activity = ActivityFactory::factory($identifcationNumber, $type);

          $message->addMessage('O usuário instanciado é do tipo: '. get_class($activity) );
          */
          $activity = new Activity();

          $activityDao = new activityDao();

          $activity->setName($date);
          $activity->setDescription($description);
          $activity->setUser($_user);
          $activity->setCreate($_create);
          $activity->setUpdate($_update);
          $activity->setSector($sector);


          $activityId = $activityDao->create($activity);

          $activity->setId($activityId);

           $this->setRoute($this->view->getListRoute());

           $viewModel = array(
             'activities' => $activityDao->getAll()
           );

           $message->addMessage('Atividade adicionada com sucesso.');
      }
      catch(Exception $e)
      {
        $message->addWarning($e->getMessage());
      }
    }

    $this->showView($viewModel);

    $message->save();

    // $this->setRoute($this->view->getCreateRoute());
    //
    // $this->showView();

  }

  public function listAction(){

    $message = Message::singleton();

    $message->addMessage('Listando atividades.');

    $message->save();

    $this->setRoute($this->view->getListRoute());

    $activityDao = new ActivityDao();

    $activities = $activityDao->getAll();

    $viewModel = array(
        'activities' => $activities,
    );

    $this->showView($viewModel);

    // $this->setRoute($this->view->getListRoute());
    //
    // $this->showView();

  }

  public function deleteAction(){

    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

    $activityDao = new ActivityDao();

    $viewModel = false;

    if(isset($_REQUEST['submit']))
    {

      $this->setRoute($this->view->getListRoute());

      $activityDao->delete($id);

      $viewModel = array(
          'activities' => $activityDao->getAll()
      );

    }
    else
    {
      $this->setRoute($this->view->getDeleteRoute());

      $viewModel = array(
          'activity' => $activityDao->getById($id)
      );

    }

    $this->showView($viewModel);

    // $this->setRoute($this->view->getDeleteRoute());
    //
    // $this->showView();

  }

  public function updateAction(){

    $viewModel = false;

    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

    if(isset($_REQUEST['submit']))
    {

      $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';

      $description = isset($_REQUEST['description']) ? $_REQUEST['description'] : '';

      $_activity = isset($_REQUEST['_user']) ? $_REQUEST['_user'] : '';

      $_create = isset($_REQUEST['_create']) ? $_REQUEST['_create'] : '';

      $_update = isset($_REQUEST['_update']) ? $_REQUEST['_update'] : '';

      $sector = isset($_REQUEST['sector']) ? $_REQUEST['sector'] : '';


      $activity = new Activity();
      $activity->setName($name);
      $activity->setDescription($description);
      $activity->setUser($_user);
      $activity->setCreate($_create);
      $activity->setUpdate($_update);
      $activity->setSector($sector);

      $activityDao = new ActivityDao();
      $activityDao->update($activity);

      $this->setRoute($this->view->getListRoute());

      $viewModel = array(
        'activities' => $activityDao->getAll()
      );

    }
    else
    {
      $this->setRoute($this->view->getUpdateRoute());

      $activityDao = new ActivityDao();

      $viewModel = array(
          'activity' => $activityDao->getById($id)
      );
    }

    $this->showView($viewModel);

    // $this->setRoute($this->view->getUpdateRoute());
    //
    // $this->showView();

  }
}
