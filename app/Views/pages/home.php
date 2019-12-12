<div class="container">
    <?= \Config\Services::validation()->listErrors(); ?>
       <?php if (isset($success_message)) { ?> 
       <div class="alert alert-success" style=""><?= $success_message ?></div>
    <?php } ?>

	<?php if (!empty($events)): ?>
	<h1 class="text-center" >Upcoming events</h1>

	<div class="row pt-5">
		<div class="col-lg-4">
		   	<a href="<?= base_url().'myevents/public/events/add_event' ?>" class="card-link btn btn-info btn-lg btn-block">Add Event</a>
		</div>
	</div>
	<div class="row pt-5">
	<?php foreach ($events as $event): ?>
		<div class="col">
		<div class="card" style="width: 20rem;margin: .5rem;">
		  <div class="card-body" style="padding-bottom: .1rem;">
		    <h5 class="card-title"><strong><?= ucfirst($event['title']) ?></strong></h5>
		    <h6 class="card-subtitle mb-2 text-muted">Status: <?= ucfirst($event['status']) ?></h6>
		    <p><strong>Description: </strong><?= $event['description']?></p>
		  </div>
		  <ul class="list-group list-group-flush">
			    <li class="list-group-item">Where: <strong><?= ucfirst($event['venue']) ?></strong></li>
			    <li class="list-group-item">When: <strong><?= $event['date'] ?> - <?= $event['time'] ?></strong></li>
			    <li class="list-group-item">Attendance is:
			    <?php if ($event['attendance'] == 'mandatory'): ?>
			     <strong style="color:#c82333;"><?= ucfirst($event['attendance']) ?></strong>	
			    <?php else: ?>		  
			     <strong style="color:#0069d9;"><?= ucfirst($event['attendance']) ?></strong>  	
			    <?php endif ?>
			 	</li>
			    <!-- <li class="list-group-item">Vestibulum at eros</li> -->
		   </ul>
		   <div class="card-body">
		   	<a href="<?= base_url().'myevents/public/events/finished/' . $event['id'] ?>" class="card-link btn btn-success">Finished</a>
		    <a href="<?= base_url().'myevents/public/events/edit_event/' . $event['id'] ?>" class="card-link btn btn-info">Edit Event</a>
		   </div>
		</div>	
		</div>	
	<?php endforeach ?>
	</div>
	<?php else: ?>
		<div class="row pt-5">
			<div class="col-lg-12">
				<div class="jumbotron">
					<div class="row">
						<div class="col-lg-12">
							<h1>No upcoming events</h1>
						</div>
						<div class="col-lg-4 pt-5">
		   					<a href="<?= base_url().'myevents/public/events/add_event' ?>" class="card-link btn btn-info btn-lg btn-block">Add Event</a>
						</div>
					</div>
		
				</div>
			</div>

		</div>
		
	</div>
	<?php endif ?>
	


</div>