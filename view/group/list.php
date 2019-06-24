
  

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Descrição</th>
      <th scope="col">Ativo</th>
      <th scope="col">Opções</th>
    </tr>
  </thead>
  <tbody>

    <?php 
      foreach($viewModel['groups'] as $group) :
    ?>
    
      <tr>
        <th scope="row">#</th>
        <td><?php echo $group->getName() ?></td>
        <td><?php echo $group->getDescription()?></td>
         <td><?php echo $group->getActive()?></td>
        <td> 
        <a href="index.php?controller=Group&action=update&id=<?php echo $group->getId() ?>">  [Editar] </a>

        <a href="index.php?controller=Group&action=delete&id=<?php echo $group->getId() ?>">   [Excluir]  </a>

         
        </td>
      </tr>

    <?php

    endforeach;

    ?>
  </tbody>
</table>

