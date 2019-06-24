
  

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">E-mail</th>
      <th scope="col">Opções</th>
    </tr>
  </thead>
  <tbody>

    <?php 
      foreach($viewModel['users'] as $user) :
    ?>
    
      <tr>
        <th scope="row">#</th>
        <td><?php echo $user->getUsername() ?></td>
        <td><?php echo $user->getEmail()?></td>
        <td> 
        <a href="index.php?controller=User&action=update&id=<?php echo $user->getId() ?>">  [Editar] </a>

        <a href="index.php?controller=User&action=delete&id=<?php echo $user->getId() ?>">   [Excluir]  </a>

         
        </td>
      </tr>

    <?php

    endforeach;

    ?>
  </tbody>
</table>

