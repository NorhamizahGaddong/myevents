<div class="container">
	<h1 class="text-center" >Completed Events</h1>
	<div class="row pt-5">

     <?= \Config\Services::validation()->listErrors(); ?>
      <?php if (isset($success_message)) { ?> 
      <div class="alert alert-success" style=""><?= $success_message ?></div>
     <?php } ?>
	<?php foreach ($events as $event): ?>
		<div class="col">
		<div class="card" style="width: 20rem;margin: .5rem;">
		  <div class="card-body" style="padding-bottom: .1rem;">
		    <h5 class="card-title"><strong><?= ucfirst($event['title']) ?></strong></h5>
		    <h6 class="card-subtitle mb-2 text-muted">Status: <?= ucfirst($event['status']) ?></h6>
		    <p><strong>Description:</strong><?= $event['description']?></p>
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
		   </ul>
		   <div class="card-body">
		   	<a href="<?= base_url().'myevents/public/events/remove_event/' . $event['id'] ?>"  class="card-link btn btn-danger">Remove event</a>
		    <!-- <a href="#" class="card-link btn btn-info">Edit Event</a> -->
		   </div>
		</div>	
		</div>	
	<?php endforeach ?>
	</div>

</div></h1>