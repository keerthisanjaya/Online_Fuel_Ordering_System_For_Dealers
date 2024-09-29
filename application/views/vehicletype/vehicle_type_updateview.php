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
		 
		 
      <h5 class="card-header">Update Vehicle Type Details</h5>
      
      <hr class="my-0">
      <div class="card-body">
         <form method="POST" action="<?php echo base_url();?>index.php/vehicletype/update/<?php echo $primaryid; ?>">
            <div class="row">
            <input type="hidden" id="idvehicle_type" name="idvehicle_type" class="form-control" placeholder="Idvehicle type" maxlength="11" required>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="vehicle_capacity" class="form-label"> Vehicle capacity: </label>
									<input type="number" id="vehicle_capacity" name="vehicle_capacity" class="form-control" value="<?php echo $vehicle_type->vehicle_capacity; ?>" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="vehicle_type" class="form-label"> Vehicle type: </label>
									<select id="vehicle_type" name="vehicle_type" class="form-select" onchange="updateView()" >
										<option value="Bowser">Bowser</option>
									</select>
								</div>
							</div> 
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="vehicle_type_is_active" class="form-label"> Vehicle type is active: </label>
									<select id="vehicle_type_is_active" name="vehicle_type_is_active" class="form-select onchange="updateViewActive()" >
										<option value="0">Inactive</option>
										<option value="1">Active</option>
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
							</div -->

            </div>
            <div class="mt-2">
               <button type="submit" class="btn btn-primary me-2">Save</button>
                <a href="<?php echo base_url('vehicletype'); ?>" class="btn btn-secondary">Back</a>
            </div>
         </form>
      </div>
   </div>
</div>

<script>
    function updateView() {
        var selectedOption = document.getElementById("vehicle_type").value;
        
        // Here you can update the view based on the selected option
        // For demonstration, let's just log the selected option to the console
        
        console.log("Selected Vehicle Type: " + selectedOption);
        
        // You can further update the view as per your requirement
    }
</script>
<script>
      // Get the value passed from the controller
      
    var vehicleTypeIsActiveValue = "<?php echo $vehicle_type->vehicle_type_is_active; ?>";

    // Set the selected option in the dropdown
    
    document.getElementById("vehicle_type_is_active").value = vehicleTypeIsActiveValue;

    function updateViewActive()
    {
        // Get the currently selected value from the dropdown
        
        var selectedValue = document.getElementById("vehicle_type_is_active").value;
        console.log("Selected value:", selectedValue);
        
        // You can perform further actions here if needed
    }
</script>

 