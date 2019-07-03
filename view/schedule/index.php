<div class="container-fluid">
	<div class="row">
		<div class="col-2 sidebar">
			<?php include 'sidebar.php' ?>
		</div>	
<!-- Conteudo -->
		<div class="content col-10">
			<div class="container-fluid">
				<div class="row">
					<div class="col">
						<h1><i class="fas fa-calendar-check"></i> Eventos</h1>
						<hr>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porta nulla ut pharetra aliquam. Vivamus auctor vitae metus sed suscipit. Mauris lacinia, velit in iaculis finibus, lacus mi tempor leo, vitae hendrerit dolor ligula a urna.
						</p>
						<a href="?controller=Schedule&action=create" class="btn btn-primary"><i class="far fa-calendar-plus"></i> Novo evento</a>
					</div>
					<div class="card col">
						<div class="card-header">
							<h5 class="card-title float-left"><i class="fas fa-fire-alt"></i> Próximo evento</h5>							
						</div>					  
					  <div class="card-body">
					    <div class="list-group">
						  <a href="?controller=Schedule&action=details&id=1" class="list-group-item list-group-item-action">
						    <div class="d-flex w-100 justify-content-between">
						      <h5 class="mb-1">Leilão beneficente</h5>
						      <small>Em 3 dias</small>
						    </div>
						    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Mauris lacinia, velit in iaculis finibus, lacus mi tempor leo, vitae hendrerit dolor ligula a urna.</p>
						  </a>						  
						</div>
					  </div>
					  <div class="card-footer">
					  	<span><i class="fas fa-tags"></i> Leilão, Rotaract, Illuminati</span>
					  </div>
					</div>
				</div>
				
				<div class="row">
					<div class="card resume col col-md-8">
						<div class="card-header">
							<h5 class="card-title float-left"><i class="far fa-calendar"></i> Eventos agendados</h5>
						</div>
						<div class="card-body" id="calendar">					  	
					  		
					  	</div>
					</div>

					<div class="card col">
						<div class="card-header">
							<h5 class="card-title float-left"><i class="fas fa-tags"></i> Categorias</h5>
							<a href="?controller=Category&action=category" class="btn btn-sm btn-secondary float-right">
								<small><i class="fas fa-eye"></i> Ver todas</small>
							</a>
						</div>					  
					  <div class="card-body">
					    <div class="list-group">
						  <a href="#" class="list-group-item list-group-item-action">
						    <div class="d-flex w-100 justify-content-between">
						      <h5 class="mb-1">Leilão</h5>
						      <small>2 evento(s)</small>
						    </div>
						  </a>
						  <a href="#" class="list-group-item list-group-item-action">
						    <div class="d-flex w-100 justify-content-between">
						      <h5 class="mb-1">Rotaract</h5>
						      <small>1 evento(s)</small>
						    </div>
						  </a>
						  <a href="#" class="list-group-item list-group-item-action">
						    <div class="d-flex w-100 justify-content-between">
						      <h5 class="mb-1">Illuminati</h5>
						      <small>7 evento(s)</small>
						    </div>
						  </a>
						</div>
					  </div>					  
					</div>
				</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	document.addEventListener('DOMContentLoaded', function() {
	  var calendarEl = document.getElementById('calendar');

	  var calendar = new FullCalendar.Calendar(calendarEl, {
	    plugins: [ 'dayGrid' ],
	    timeZone: 'UTC',
	    defaultView: 'dayGridMonth',
	    events: 'https://fullcalendar.io/demo-events.json'
	  });
	  calendar.setOption('locale', 'pt-br');
	  calendar.render();
	});
</script>