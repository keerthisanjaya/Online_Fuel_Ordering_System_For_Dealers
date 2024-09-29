<div class="container-xxl flex-grow-1 container-p-y">
   <div class="card mb-4">
   
   
   <!-- error message start-->
                  <?php if ($this->session->flashdata('message')) { ?>
                	<div class="row col-md-12 row justify-content-center mt-3" >
                		<div class="alert alert-success alert-dismissible fade show col-md-4" role="alert">
                			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                			<strong>Successfull:</strong> <?php echo $this->session->flashdata('message'); ?>
                		</div>
                		</div>
            	<?php } ?>

            	<?php if ($this->session->flashdata('error')) { ?>
            	<div class="row col-md-12 row justify-content-center mt-3" >
            	
            		<div class="alert alert-danger alert-dismissible fade show col-md-4" role="alert">
            			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            			<strong>Failed!</strong> <?php echo $this->session->flashdata('error'); ?>
            		</div>
            		</div>
            	<?php } ?>
		<!-- error message end--> 
		 
		 
      <h5 class="card-header">Update Location Details</h5>
      
      <hr class="my-0">
      <div class="card-body">
         <form method="POST" action="<?php echo base_url();?>index.php/location/update/<?php echo $primaryid; ?>">
            <div class="row">
            <input type="hidden" id="idLocation" name="idLocation" class="form-control" placeholder="IdLocation" maxlength="11" required>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="locationname" class="form-label"> Locationname: </label>
									<input type="text" id="locationname" name="locationname" class="form-control" value="<?php echo $location->locationname; ?>" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="location_is_active" class="form-label"> Location is active: </label>
									<select id="location_is_active" name="location_is_active" class="form-select" >
										<option value="0">No</option>
										<option value="1">Yes</option>
									</select>
								</div>
							</div>
						<!--	<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="isdelete" class="form-label"> Isdelete: <span class="text-danger">*</span> </label>
									<select id="isdelete" name="isdelete" class="form-select" required>
										<option value="0">No</option>
										<option value="1">Yes</option>
									</select>
								</div>
							</div>-->

            </div>
            <div class="mt-2">
               <button type="submit" class="btn btn-primary me-2">Save</button>
              <a href="<?php echo base_url('location'); ?>" class="btn btn-secondary">Back</a>
            </div>
         </form>
      </div>
   </div>
</div>

<script>
      // Get the value passed from the controller
    var locationIsActiveValue = "<?php echo $location->location_is_active; ?>";

    // Set the selected option in the dropdown
    document.getElementById("location_is_active").value = locationIsActiveValue;

    function updateViewActive() {
        // Get the currently selected value from the dropdown
        var selectedValue = document.getElementById("location_is_active").value;
        console.log("Selected value:", selectedValue);
        // You can perform further actions here if needed
    }
</script>

 