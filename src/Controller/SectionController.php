<?php

class SectionController extends Controller
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
  
          $section = new Section();

          $sectionDao = new SectionDao();

          $section->setName($name);
          $section->setDescription($description);
          $section->setActive($active);

          $sectionDao->create($section);

           $this->setRoute($this->view->getListRoute());

          $viewModel = array(
            'sections' => $sectionDao->getAll()
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

    $sectionDao = new SectionDao();

    $viewModel = false;

    if(isset($_REQUEST['submit']))
    {
      $this->setRoute($this->view->getListRoute());

      $sectionDao->delete($id); 

      $viewModel = array(
          'sections' => $sectionDao->getAll()
      );
    }
    else
    {
      $this->setRoute($this->view->getDeleteRoute());

      $viewModel = array(
          'section' => $sectionDao->getById($id)
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

      $section = new Section();
      $section->setId($id);
      $section->setName($name);
      $section->setDescription($description);
      $section->setActive($active);

      $sectionDao = new sectionDao();
      $sectionDao->update($section);

      $this->setRoute($this->view->getListRoute());

      $viewModel = array(
        'sections' => $sectionDao->getAll()
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

    $sectionDao = new SectionDao();

    $sections = $sectionDao->getAll();

    $viewModel = array(
        'sections' => $sections,
    );

    $this->showView($viewModel);
  }
}