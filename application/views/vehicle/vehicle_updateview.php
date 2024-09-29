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
		 
		 
      <h5 class="card-header">Update Vehicle Details </h5>
      
      <hr class="my-0">
      <div class="card-body">
         <form method="POST" action="<?php echo base_url();?>index.php/vehicle/update/<?php echo $primaryid; ?>">
            <div class="row">
            <input type="hidden" id="idvehicle" name="idvehicle" class="form-control" placeholder="Idvehicle" maxlength="11" required>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="vehicle_number" class="form-label"> Vehicle number: </label>
									<input type="text" id="vehicle_number" name="vehicle_number" class="form-control" value="<?php echo $vehicle->vehicle_number; ?>" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="vehicle_chasis_number" class="form-label"> Vehicle chasis number: </label>
									<input type="text" id="vehicle_chasis_number" name="vehicle_chasis_number" class="form-control" value="<?php echo $vehicle->vehicle_chasis_number; ?>" required>
								</div>
							</div>
                            <div class="col-md-12">
								<div class="form-group mb-3">
									<label for="vehicle_yom" class="form-label"> Vehicle yom: </label>
									<input type="date" id="vehicle_yom" name="vehicle_yom" class="form-control" dateISO="true"  value="<?php echo $vehicle->vehicle_yom; ?>" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="vehicle_no_of_passengers" class="form-label"> Vehicle no of passengers: </label>
									<input type="number" id="vehicle_no_of_passengers" name="vehicle_no_of_passengers" class="form-control" value="<?php echo $vehicle->vehicle_no_of_passengers; ?>" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="vehicle_weight" class="form-label"> Vehicle weight (Kg): </label>
									<input type="number" id="vehicle_weight" name="vehicle_weight" class="form-control" value="<?php echo $vehicle->vehicle_weight; ?>" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="vehicle_is_available" class="form-label"> Vehicle is available: </label>
									<select id="vehicle_is_available" name="vehicle_is_available" class="form-select" onchange="updateViewAvailable()" required>
										<option value="0">No</option>
										<option value="1">Yes</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="vehicle_is_active" class="form-label"> Vehicle is active: </label>
									<select id="vehicle_is_active" name="vehicle_is_active" class="form-select" onchange="updateViewActive()" required >
										<option value="0">No</option>
										<option value="1">Yes</option>
									</select>
								</div>
							</div>
							
						
                        <!--<div class="col-md-12">
						<div class="form-group mb-3">
							<label for="vehicle_type_idvehicle_type" class="form-label"> Vehicle type (capacity): <span class="text-danger">*</span> </label>
							<select id="vehicle_type_idvehicle_type" name="vehicle_type_idvehicle_type" class="form-select" onchange="updateType()" required>
								<?php foreach($vehicle_type as $data){ ?>
									if(strcmp($vehicle->vehicle_type_idvehicle_type,$data->idvehicle_type)==0){
										<option value="<?php echo $data->idvehicle_type; ?>" selected><?php echo $data->vehicle_capacity; ?></option>
										
								
									
								<?php } ?>
							</select>
						</div>
					</div>-->
					<div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="vehicle_type_idvehicle_type" class="form-label"> Vehicle type (capacity): <span class="text-danger">*</span> </label>
                            <select id="vehicle_type_idvehicle_type" name="vehicle_type_idvehicle_type" class="form-select" onchange="updateType()" required>
                                <?php foreach($vehicle_type as $data): ?>
                                    <?php if(strcmp($vehicle->vehicle_type_idvehicle_type, $data->idvehicle_type) == 0): ?>
                                        <option value="<?php echo $data->idvehicle_type; ?>" selected><?php echo $data->vehicle_capacity; ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo $data->idvehicle_type; ?>"><?php echo $data->vehicle_capacity; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                        <div class="col-md-12">
						<div class="form-group mb-3">
							<label for="Location_idLocation" class="form-label"> Location: <span class="text-danger">*</span> </label>
							<select id="Location_idLocation" name="Location_idLocation" class="form-select" required>
								<?php foreach($location as $data): ?>
									<?php if(strcmp($vehicle->Location_idLocation,$data->idLocation)==0): ?>
										<option value="<?php echo $data->idLocation; ?>" selected><?php echo $data->locationname; ?></option>
									<?php else: ?>
									    	<option value="<?php echo $data->idLocation; ?>"><?php echo $data->locationname; ?></option>
									<?php endif; ?>
							
								<?php endforeach; ?>	
							</select>
						</div>
					</div>
							<!--<div class="col-md-12">
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
              <a href="<?php echo base_url('vehicle'); ?>" class="btn btn-secondary">Back</a>
            </div>
         </form>
      </div>
   </div>
</div>


<script>
      // Get the value passed from the controller
    var vehicleIsActive = "<?php echo $vehicle->vehicle_is_active; ?>";

    // Set the selected option in the dropdown
    document.getElementById("vehicle_is_active").value = vehicleIsActive;

    function updateViewActive() {
        // Get the currently selected value from the dropdown
        var selectedValue = document.getElementById("vehicle_is_active").value;
        console.log("Selected value:", selectedValue);
        // You can perform further actions here if needed
    }
</script>

<script>
      // Get the value passed from the controller
    var vehicleIsAvailable = "<?php echo $vehicle->vehicle_is_available; ?>";

    // Set the selected option in the dropdown
    document.getElementById("vehicle_is_available").value = vehicleIsAvailable;

    function updateViewAvailable() {
        // Get the currently selected value from the dropdown
        var selectedValue = document.getElementById("vehicle_is_available").value;
        console.log("Selected value:", selectedValue);
        // You can perform further actions here if needed
    }
</script>

<script>
      // Get the value passed from the controller
    var vehicletype = "<?php echo $vehicle->vehicle_type_idvehicle_type ; ?>";

    // Set the selected option in the dropdown
    document.getElementById("vehicle_type_idvehicle_type ").value = vehicletype;

    function updateType() {
        // Get the currently selected value from the dropdown
        var selectedValue = document.getElementById("vehicle_type_idvehicle_type ").value;
        console.log("Selected value:", selectedValue);
        // You can perform further actions here if needed
    }
</script>
 