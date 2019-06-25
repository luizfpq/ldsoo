<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Checkout example · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>

      main > .container {
        padding: 60px 15px 0;
      }

      .footer {
        background-color: #f5f5f5;
      }

      .footer > .container {
        padding-right: 15px;
        padding-left: 15px;
      }

      code {
        font-size: 80%;
      }

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>

  <body class="d-flex flex-column h-100">
    <header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Fixed navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php?controller=Index&action=index"> <?= Translate::singleton()->translate('Home') ?> <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?controller=User&action=list"><?= Translate::singleton()->translate('Users')?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?controller=User&action=create"><?= Translate::singleton()->translate('New User')?></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index.php?controller=Group&action=create"><?= Translate::singleton()->translate('New Group')?></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index.php?controller=Section&action=create"><?= Translate::singleton()->translate('New Section')?></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index.php?controller=Action&action=create"><?= Translate::singleton()->translate('New Action')?></a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><?= Translate::singleton()->translate('Hello') ?> <?= $user->getUsername() ?>.</a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="#">
          <?php

          /*$localization = Localization::singleton();

          $localization->load();*/

          echo 'Idioma selecionado: ' . $localization->getCurrentLocale()->getLocale();

          ?>
          </a>

        </li>

        <li class="nav-item">
            <form action="index.php?controller=Localization&action=set" method="post">
              <select name="locale">
                <option value="pt_BR" <?= ($localization->getCurrentLocale()->getLocale() == 'pt_BR') ? 'selected' : ''?> >Português</option>
                <option value="en_EN" <?= ($localization->getCurrentLocale()->getLocale() == 'en_EN') ? 'selected' : ''?>>Inglês</option>
                <option value="es_ES" <?= ($localization->getCurrentLocale()->getLocale() == 'es_ES') ? 'selected' : ''?>>Espanhol</option>
              </select>  

              <input type="submit" name="submit" value="Mudar Idioma">

          </form>
        </li>

      </ul>
      <form action="index.php?controller=Logon&action=logoff" method="post"  class="form-inline mt-2 mt-md-0">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Sair</button>
      </form>
    </div>
  </nav>
</header>
<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  <div class="container">