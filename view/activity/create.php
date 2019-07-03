<?php
//	$activity =  $viewModel['activity'];
	$sectorDao = new SectorDao();
	$sectors = $sectorDao->getAll();
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-2 sidebar">
			<?php include 'sidebar.php' ?>
		</div>
<!-- Conteudo -->
		<div class="content col-10">
			<form class="container-fluid" action="index.php?controller=Activity&action=create" method="post">
				<div class="row">
					<div class="col">
						<h1><i class="fas fa-plus"></i> Nova atividade</h1>
						<hr>
					</div>
				</div>
				<div class="row mb-0">
					<div class="col-md-8 col">
						<div class="form-group">
						    <label for="name">Nome da atividade</label>
						    <input type="text" class="form-control" id="name" name="name">
					  	</div>
					</div>
				  	<div class="col">
						<div class="form-group">
						    <label for="activity_sector">Selecione o setor</label>
								<select class="form-control" id="sector" name="sector">
 								 <?php

 									 foreach($sectors as $sector) {
 										 //verifica o setor e monta a view com a seleção correta
 										// $selected = ($sector->getId() == $activity->getSector()) ? 'selected' : null;
 										 //escreve a option no html
 										 echo "<option value='{$sector->getId()}'>{$sector->getName()}</option>";
 									 }
 								 ?>

 							 </select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="form-group">
						    <label for="description">Descrição da atividade</label>
						    <input type="text" name="description" class="form-control" id="description" name="description">
						</div>
					</div>
				</div>
				<input type="hidden" name="user" value="<?php echo $user->getid(); ?>">
				<input type="hidden" name="sector" value="<?php echo $user->getid(); ?>"> <?php // TODO: corrigir setor ?>
				<div class="row">
					<button type="submit" class="col activities btn btn-lg btn-primary" name="submit"><i class="fas fa-plus"></i> Nova atividade</button>
				</div>
			</form>
		</div>
	</div>
</div>
