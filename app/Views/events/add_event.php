<div class="container">
	<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-8">

          <?= \Config\Services::validation()->listErrors(); ?>
          <?php if (isset($success_message)) { ?> 
            <div class="alert alert-success" style=""><?= $success_message ?></div>
          <?php } ?>
			<form action="add_event" method="POST" enctype="multipart/form-data" style="padding:1rem;border:solid 1px grey;border-radius: 15px;margin: 20px 0;background-color: #c8d6e5;">
			  	<h1>Add Event</h1>
			  <div class="form-row">
			    <div class="form-group col-md-4">
			      <label for="title">Event Title</label>
			      <input type="text" class="form-control" id="title" name="title" placeholder="e.g 'PSU Foundation day'">
			    </div>
			    <div class="form-group col-md-4">
			      <label for="venue">Venue</label>
			      <input type="text" class="form-control" id="venue" name="venue" placeholder="'Palawan State University'">
			    </div>
			    <div class="form-group col-md-4">
			      <label for="date">Date</label>
			      <input type="text" class="form-control" id="date" name="date" placeholder="'June 19, yyyy'">
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="lastname">Time</label>
			      <input type="text" class="form-control" id="time" name="time" placeholder="'8:00 AM - 5:00 PM'">
			    </div>
			    <div class="form-group col-md-6">
			      <label for="attendance">Attendance</label>
	                <select class="form-control" name="attendance">
	                	<option value="mandatory">Mandatory</option>
	                	<option value="optional">Optional</option>
	                </select>
			    </div>
			  </div>
			  <div class="form-row">
			  	<div class="col-md-12">
				  <div class="form-group">
				    <label for="description">Short Description</label>
				    <textarea class="form-control" id="description" rows="3" name="description" required></textarea>
				  </div>
				</div>
			  	
			  </div>
			  <button type="submit" class="btn btn-primary btn-lg">Save</button> | 
			  <a href="<?= base_url().'myevents/public' ?>">Back to dashboard</a>
			</form>
	
		</div>
	</div>
</div>