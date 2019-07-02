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

    $message = Message::singleton();

    $viewModel = false;

    if(isset($_REQUEST['submit']))
    {
      $date = isset($_POST['date']) ? $_POST['date'] : null;

      $category = isset($_POST['category']) ? $_POST['category'] : null;

      $_schedule = isset($_POST['_user']) ? $_POST['_user'] : null;

      $_create = isset($_POST['_create']) ? $_POST['_create'] : null;

      $_update = isset($_POST['_update']) ? $_POST['_update'] : null;

      $_order = isset($_POST['_order']) ? $_POST['_order'] : null;

      $description = isset($_POST['description']) ? $_POST['description'] : null;

      try
      {
          $warnings = array();

          if(!$date)
            $warnings[] = 'Data';

          if(!$category)
            $warnings [] = 'Categoria';

          if(sizeof($warnings))
            throw new Exception ('Preencha os campos ' . implode(', ', $warnings));



          /*$schedule = ScheduleFactory::factory($identifcationNumber, $type);

          $message->addMessage('O usuário instanciado é do tipo: '. get_class($schedule) );
          */
          $schedule = new Schedule();

          $scheduleDao = new scheduleDao();

          $schedule->setDate($date);
          $schedule->setCategory($category);
          $schedule->setUser($_user);
          $schedule->setCreate($_create);
          $schedule->setUpdate($_update);
          $schedule->setOrder($order);
          $schedule->setDescription($description);

          $scheduleId = $scheduleDao->create($schedule);

          $schedule->setId($scheduleId);

           $this->setRoute($this->view->getListRoute());

           $viewModel = array(
             'schedules' => $scheduleDao->getAll()
           );

           $message->addMessage('Evento adicionado com sucesso.');
      }
      catch(Exception $e)
      {
        $message->addWarning($e->getMessage());
      }
    }
    else
    {
         $scheduleCategoryDB = new scheduleCategoryDB();

         $viewModel = array(
            'categories' => $scheduleCategoryDB->getAll()
          );

         $this->setRoute($this->view->getCreateRoute());

    }

    $this->showView($viewModel);

    $message->save();

  }


  public function listAction(){

    $message = Message::singleton();

    $message->addMessage('Listando eventos.');

    $message->save();

    $this->setRoute($this->view->getListRoute());

    $scheduleDao = new ScheduleDao();

    $schedules = $scheduleDao->getAll();

    $viewModel = array(
        'schedules' => $schedules,
    );

    $this->showView($viewModel);

  }

  public function deleteAction(){

    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

    $scheduleDao = new ScheduleDao();

    $viewModel = false;

    if(isset($_REQUEST['submit']))
    {

      $this->setRoute($this->view->getListRoute());

      $scheduleDao->delete($id);

      $viewModel = array(
          'schedules' => $scheduleDao->getAll()
      );

    }
    else
    {
      $this->setRoute($this->view->getDeleteRoute());

      $viewModel = array(
          'schedule' => $scheduleDao->getById($id)
      );

    }

    $this->showView($viewModel);

  }

  public function updateAction(){

    $viewModel = false;

    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

    if(isset($_REQUEST['submit']))
    {

      $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';

      $category = isset($_REQUEST['category']) ? $_REQUEST['category'] : '';

      $_schedule = isset($_REQUEST['_user']) ? $_REQUEST['_user'] : '';

      $_create = isset($_REQUEST['_create']) ? $_REQUEST['_create'] : '';

      $_update = isset($_REQUEST['_update']) ? $_REQUEST['_update'] : '';

      $_order = isset($_REQUEST['_order']) ? $_REQUEST['_order'] : '';

      $description = isset($_REQUEST['description']) ? $_REQUEST['description'] : '';

      $schedule = new Schedule();
      $schedule->setDate($date);
      $schedule->setCategory($category);
      $schedule->setUser($_user);
      $schedule->setCreate($_create);
      $schedule->setUpdate($_update);
      $schedule->setOrder($order);
      $schedule->setDescription($description);

      $scheduleDao = new ScheduleDao();
      $scheduleDao->update($schedule);

      $this->setRoute($this->view->getListRoute());

      $viewModel = array(
        'schedules' => $scheduleDao->getAll()
      );

    }
    else
    {
      $this->setRoute($this->view->getUpdateRoute());

      $scheduleDao = new ScheduleDao();

      $viewModel = array(
          'schedule' => $scheduleDao->getById($id)
      );
    }

    $this->showView($viewModel);

  }
}
