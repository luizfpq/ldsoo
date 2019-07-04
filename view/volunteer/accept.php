<?php
	$volunteer  = new VolunteerDao();
	$newEvent = $volunteer->getNewEventByVolunteer($user->getId());
	$activeEvent = $volunteer->getActiveEventByVolunteer($user->getId());
 ?>
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
						<h1><i class="fas fa-fire-alt"></i> Seus eventos  </h1>
						<br />
						<div class="card col">
							<div class="card-header">
								<h5 class="card-title float-left"> Confirmados</h5>
							</div>
							<?php
								foreach($newEvent as $event) {
							echo'
							<div class="card-body">
									<div class="list-group">
									<div class="list-group-item list-group-item-action">
										<div class="d-flex w-100 justify-content-between">
											<h5 class="mb-1">'. $event['name'] .'</h5>
											<small>Dia: '. $event["date"] .' &middot; Hora: '. $event['time'] .'</small>
										</div>
										<p class="mb-1">'. $event['description'] .'</p>
									</div>

								</div>
							</div>';
						}
							?>
							<div class="card-footer">
								<span><i class="fas fa-tags"></i> Leilão, Curso, Almoço</span>
							</div>
						</div>
						<br />
						<div class="card col">
							<div class="card-header">
								<h5 class="card-title float-left">Não Confirmados</h5>
							</div>
							<?php
								foreach($activeEvent as $event) {
							echo'
							<div class="card-body">
									<div class="list-group">
									<div class="list-group-item list-group-item-action">
										<div class="d-flex w-100 justify-content-between">
											<h5 class="mb-1">'. $event['name'] .'</h5>
											<small>Dia: '. $event["date"] .' &middot; Hora: '. $event['time'] .'</small>
										</div>
										<p class="mb-1">'. $event['description'] .'<a href="?controller=Volunteer&amp;action=accept" class="btn btn-sm volunteers btn-primary float-right">
									<small><i class="fas fa-check" aria-hidden="true"></i> Aceitar </small></a></p>

								</div>
							</div>';
						}
							?>
							<div class="card-footer">
								<span><i class="fas fa-tags"></i> Leilão, Curso, Almoço</span>
							</div>
						</div>
					</div>

				</div>



				</div>
			</div>
		</div>
	</div>
</div>
