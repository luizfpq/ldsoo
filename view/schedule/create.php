<div class="container-fluid">
	<div class="row">
		<div class="col-2 sidebar">
			<?php include 'sidebar.php' ?>
		</div>	
<!-- Conteudo -->
		<div class="content col-10">
			<form class="container-fluid" method="POST" action="?controller=Schedule&action=create">
				<div class="row">
					<div class="col-md-8">
						<h1><i class="far fa-calendar-plus"></i> Novo evento</h1>
						<hr>
						<div class="form-group">
						    <label for="description">Descrição do evento</label>
						    <input type="text" name="description" class="form-control" id="description" placeholder="Fale um pouco sobre o evento">
					  	</div>
					  	<div class="form-group">
						    <label for="schedule_category">Selecione a categoria</label>
						    <select name="schedule_category" class="form-control" id="schedule_category">
						      <option value="1">Leilão</option>
						      <option value="2">Rotaract</option>
						      <option value="3">Illuminati</option>
						    </select>
						</div>
					</div>
					<div class="card col">
						<div class="card-header">
							<h5 class="card-title float-left"><i class="far fa-calendar"></i> Data do evento</h5>							
						</div>					  
					  <div class="card-body datepicker-here" data-language='pt-BR'>
					  </div>					  
					</div>
				</div>
				
				<div class="row">
					<div class="col-md">						
						<div class="form-group">
						    <label for="schedule_activities">Selecione as atividades</label>
						    <select name="schedule_activities" multiple class="form-control" id="schedule_activities">
						      <option value="1">Leilão</option>
						      <option value="2">Rotaract</option>
						      <option value="3">Illuminati</option>
						    </select>
						</div>
					</div>
					
					<div class="col-md">
						<div class="form-group">
						    <label for="schedule_volunteers">Selecione os voluntários</label>
						    <select name="schedule_volunteers" multiple class="form-control" id="schedule_volunteers">
						      <option value="1">Quirino</option>
						      <option value="2">Zé</option>
						      <option value="3">Padoca</option>
						      <option value="4">Fidelis</option>
						    </select>
						</div>
					</div>
				</div>
				<input type="hidden" name="submit" value="true">
				<div class="row">
					<button type="submit" class="col btn btn-lg btn-primary"><i class="far fa-calendar-plus"></i> Novo evento</button>
				</div>
			</form>
		</div>
	</div>
</div>