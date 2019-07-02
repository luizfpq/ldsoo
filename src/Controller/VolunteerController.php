<?php

class VolunteerController extends Controller
{
  private $view;

  private $route;

  public function __construct(){

    $this->view = new VolunteerView();
  }

  public function volunteerAction(){

    $this->setRoute($this->view->getVolunteerRoute());

    $this->showView();

  }

  public function createAction(){

    $message = Message::singleton();

    $this->setRoute($this->view->getCreateRoute());

    if(isset($_REQUEST['submit']))
    {




      $username = isset($_POST['username']) ? $_POST['username'] : null;

      $email = isset($_POST['email']) ? $_POST['email'] : null;

      $password = isset($_POST['password']) ? $_POST['password'] : null;
      try
      {
          $warnings = array();

          if(!$username)
            $warnings[] = 'Username';

          if(!$email)
            $warnings [] = 'E-mail';

           if(!$password)
            $warnings [] = 'Senha';

          if(sizeof($warnings))
            throw new Exception ('Preencha os campos ' . implode(', ', $warnings));


          $volunteer = new Volunteer();
          $volunteerDao = new VolunteerDao();

          $volunteer->setUsername($username);
          $volunteer->setEmail($email);
          $volunteer->setPassword($password);
          //$volunteer->setRole($role);

          $volunteerId = $volunteerDao->create($volunteer);

          $volunteer->setId($volunteerId);

          $this->setRoute($this->view->getVolunteerRoute());

          $message->addMessage('Usuário adicionado com sucesso.');
      }
      catch(Exception $e)
      {
        $message->addWarning($e->getMessage());
      }
    }

    $message->save();

    $this->showView();



  }

  /*
    O Controlador recebe da view uma ação, que deverá ser executada pelo Model.
    O Model realiza a ação e prepara os dados para a view, por meio do Controller.

  */
  public function listAction() {

    $message = Message::singleton();

    $this->setRoute($this->view->getListRoute());

    $volunteerDao = new VolunteerDao();

    $volunteers = $volunteerDao->getAll();

    $viewModel = array(
        'volunteers' => $volunteers,
    );

    $message->addMessage('Listando voluntários.');

    $message->save();

    $this->showView($viewModel);
  }

  public function deleteAction(){

    $this->setRoute($this->view->getDeleteRoute());

    $this->showView();

  }

  public function detailsAction(){

    $this->setRoute($this->view->getDetailsRoute());

    $this->showView();

  }

  public function updateAction(){

    $this->setRoute($this->view->getUpdateRoute());

    $this->showView();

  }
}
