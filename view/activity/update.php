<div class="container-fluid">
	<div class="row">
		<div class="col-2 sidebar">
			<?php include 'sidebar.php' ?>
		</div>	
<!-- Conteudo -->
		<div class="content col-10">
			<form class="container-fluid">
				<div class="row">
					<div class="col">
						<h1><i class="fas fa-plus"></i> Atualizar atividade</h1>
						<hr>
					</div>
				</div>
				<div class="row mb-0">
					<div class="col-md-8 col">
						<div class="form-group">
						    <label for="name">Nome da atividade</label>
						    <input type="text" class="form-control" id="name">
					  	</div>
					</div>
				  	<div class="col">						
						<div class="form-group">
						    <label for="activity_sector">Selecione o setor</label>
						    <select class="form-control" id="activity_sector">
						      <option>Diretoria</option>
						      <option>Concelho fiscal</option>
						      <option>Colaboradores</option>
						    </select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="form-group">
						    <label for="description">Descrição da atividade</label>
						    <input type="text" name="description" class="form-control" id="description">
						</div>
					</div>
				</div>
				
				<div class="row">
					<button type="submit" class="col activities btn btn-lg btn-primary"><i class="fas fa-check"></i> Salvar atividade</button>
				</div>
			</form>
		</div>
	</div>
</div>