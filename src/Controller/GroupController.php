<?php

class GroupController extends Controller
{
  private $view;

  private $route;

  public function __construct(){

    $this->view = new GroupView();
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
  
          $group = new Group();

          $groupDao = new GroupDao();

          $group->setName($name);
          $group->setDescription($description);
          $group->setActive($active);

          $groupDao->create($group);

           $this->setRoute($this->view->getListRoute());

          $viewModel = array(
            'groups' => $groupDao->getAll()
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

    $groupDao = new GroupDao();

    $viewModel = false;

    if(isset($_REQUEST['submit']))
    {
      $this->setRoute($this->view->getListRoute());

      $groupDao->delete($id); 

      $viewModel = array(
          'groups' => $groupDao->getAll()
      );
    }
    else
    {
      $this->setRoute($this->view->getDeleteRoute());

      $viewModel = array(
          'group' => $groupDao->getById($id)
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

      $group = new Group();
      $group->setId($id);
      $group->setName($name);
      $group->setDescription($description);
      $group->setActive($active);

      $groupDao = new groupDao();
      $groupDao->update($group);

      $this->setRoute($this->view->getListRoute());

      $viewModel = array(
        'groups' => $groupDao->getAll()
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

    $message->addMessage('Listando grupos.');

    $message->save();

    $this->setRoute($this->view->getListRoute());

    $groupDao = new GroupDao();

    $groups = $groupDao->getAll();

    $viewModel = array(
        'groups' => $groups,
    );

    $this->showView($viewModel);
  }
}