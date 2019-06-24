<?php

class ActionController extends Controller
{
  private $view;

  private $route;

  public function __construct(){

    $this->view = new UserView();
  }

  public function indexAction(){

    $this->setRoute($this->view->getCreateRoute());

    $this->showView();
  }

  public function createAction(){

    $message = Message::singleton();

    $viewModel = false;

    if(isset($_REQUEST['submit']))
    {
      $name = isset($_POST['name']) ? $_POST['name'] : null;

      $description = isset($_POST['description']) ? $_POST['description'] : null;

      $active = isset($_POST['active']) ? $_POST['active'] : null;

      try
      {
          $warnings = array();

          if(!$name)
            $warnings[] = 'Nome';

          if(!$description)
            $warnings [] = 'Descrição';

           if(!$active)
            $warnings [] = 'Ativo';

          if(sizeof($warnings))
            throw new Exception ('Preencha os campos ' . implode(', ', $warnings)); 
  
          $action = new Action();

          $actionDao = new ActionDao();

          $action->setName($name);
          $action->setDescription($description);
          $action->setActive($active);

          $actionDao->create($action);

           $this->setRoute($this->view->getListRoute());

          $viewModel = array(
            'actions' => $actionDao->getAll()
          );

          $message->addMessage('Usuário adicionado com sucesso.');
      }
      catch(Exception $e)
      {
        $message->addWarning($e->getMessage());
      }
    }
    else
    {
         $this->setRoute($this->view->getCreateRoute());
    }

    $this->showView($viewModel);

    $message->save();
  }

  public function deleteAction(){

    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

    $actionDao = new ActionDao();

    $viewModel = false;

    if(isset($_REQUEST['submit']))
    {
      $this->setRoute($this->view->getListRoute());

      $actionDao->delete($id); 

      $viewModel = array(
          'actions' => $actionDao->getAll()
      );
    }
    else
    {
      $this->setRoute($this->view->getDeleteRoute());

      $viewModel = array(
          'action' => $actionDao->getById($id)
      );
    }

    $this->showView($viewModel);
  }

  public function updateAction(){

    $viewModel = false;

    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

    if(isset($_REQUEST['submit']))
    {

      $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
      $description = isset($_REQUEST['description']) ? $_REQUEST['description'] : '';
      $active = isset($_REQUEST['active']) ? $_REQUEST['active'] : '';

      $action = new Action();
      $action->setId($id);
      $action->setName($name);
      $action->setDescription($description);
      $action->setActive($active);

      $actionDao = new actionDao();
      $actionDao->update($action);

      $this->setRoute($this->view->getListRoute());

      $viewModel = array(
        'actions' => $actionDao->getAll()
      );
    }
    else
    {
      $this->setRoute($this->view->getUpdateRoute());

      $userDao = new UserDao();

      $viewModel = array(
          'user' => $userDao->getById($id)
      );
    }

    $this->showView($viewModel);

  }
  /*
    O Controlador recebe da view uma ação, que deverá ser executada pelo Model.
    O Model realiza a ação e prepara os dados para a view, por meio do Controller.

  */
  public function listAction() {

    $message = Message::singleton();

    $message->addMessage('Listando ações.');

    $message->save();

    $this->setRoute($this->view->getListRoute());

    $actionDao = new ActionDao();

    $actions = $actionDao->getAll();

    $viewModel = array(
        'actions' => $actions,
    );

    $this->showView($viewModel);
  }
}