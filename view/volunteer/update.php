<?php $volunteer =  $viewModel['volunteer']; ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-2 sidebar">
			<?php include 'sidebar.php' ?>
		</div>
<!-- Conteudo -->
		<div class="content col-10">
			<form class="container-fluid" action="index.php?controller=Volunteer&action=update&id=<?php echo $volunteer->getId(); ?>" method="post">

				<div class="row">
					<div class="col-md-8">
						<h1><i class="fas fa-hands-helping"></i> Novo volunt&aacute;rio</h1>
						<hr>
						<div class="form-group">
						    <label for="name">Nome do volunt&aacute;rio</label>
						    <input type="text" class="form-control" id="username" name="username" placeholder="Nome de usuário" value="<?php echo $volunteer->getUsername(); ?>">
					  	</div>
							<div class="form-group">
							    <label for="email">Email do volunt&aacute;rio</label>
							    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $volunteer->getEmail(); ?>">
						  	</div>
								<div class="form-group">
								    <label for="password">Senha</label>
								    <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
							  	</div>
									<div class="mb-3">
										<label for="group">Função</label>
		  		          <select name="role" class="form-control" id="role" name="role">
											<option value="2" <?php if ($volunteer->getRole() == '2') {echo 'selected';}?>>Colaborador</option>
											<option value="1" <?php if ($volunteer->getRole() == '1') {echo 'selected';}?>>Organizador</option>
		  								<option value="0" <?php if ($volunteer->getRole() == '0') {echo 'selected';}?> >Adm</option>
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
					<button type="submit" class="col btn btn-lg btn-danger" name="submit"><i class="far fa-calendar-plus"></i> Atualizar voluntário</button>
				</div>
			</form>
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
