<?php

class UserController extends Controller
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
      $username = isset($_POST['username']) ? $_POST['username'] : null;

      $email = isset($_POST['email']) ? $_POST['email'] : null;

      $password = isset($_POST['password']) ? $_POST['password'] : null;

      $group = isset($_POST['group']) ? $_POST['group'] : null;

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



          /*$user = UserFactory::factory($identifcationNumber, $type);

          $message->addMessage('O usuário instanciado é do tipo: '. get_class($user) );
          */
          $user = new User();

          $userDao = new UserDao();

          $user->setUsername($username);
          $user->setEmail($email);
          $user->setPassword($password);
          $user->setGroup($group);

          $userId = $userDao->create($user);

          $user->setId($userId);

          $userDao->setGroup($user);

           $this->setRoute($this->view->getListRoute());

          $viewModel = array(
            'users' => $userDao->getAll()
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
         $groupDao = new GroupDao();

         $viewModel = array(
            'groups' => $groupDao->getAll()
          );

         $this->setRoute($this->view->getCreateRoute());

    }

    $this->showView($viewModel);

    $message->save();
  }


  public function deleteAction(){

    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

    $userDao = new UserDao();

    $viewModel = false;

    if(isset($_REQUEST['submit']))
    {

      $this->setRoute($this->view->getListRoute());

      $userDao->delete($id);

      $viewModel = array(
          'users' => $userDao->getAll()
      );

    }
    else
    {
      $this->setRoute($this->view->getDeleteRoute());

      $viewModel = array(
          'user' => $userDao->getById($id)
      );

    }

    $this->showView($viewModel);
  }

  public function updateAction(){

    $viewModel = false;

    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

    if(isset($_REQUEST['submit']))
    {

      $username = isset($_REQUEST['username']) ? $_REQUEST['username'] : '';
      $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';

      $user = new User();
      $user->setUsername($username);
      $user->setEmail($email);
      $user->setId($id);

      $userDao = new UserDao();
      $userDao->update($user);

      $this->setRoute($this->view->getListRoute());

      $viewModel = array(
        'users' => $userDao->getAll()
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

    $message->addMessage('Listando usuários.');

    $message->save();

    $this->setRoute($this->view->getListRoute());

    $userDao = new UserDao();

    $users = $userDao->getAll();

    $viewModel = array(
        'users' => $users,
    );

    $this->showView($viewModel);
  }
}
