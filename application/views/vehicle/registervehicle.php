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

        <h5 class="card-header">Add Vehicle Details</h5>

        <hr class="my-0">
        <div class="card-body">
            <form method="POST" action="<?php echo base_url();?>index.php/vehicle/register/save">

                <input type="hidden" id="idvehicle" name="idvehicle" class="form-control" placeholder="Idvehicle"
                    maxlength="11" required>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="vehicle_number" class="form-label"> Vehicle number: </label>
                        <input type="text" id="vehicle_number" name="vehicle_number" class="form-control"
                            placeholder="Vehicle number" minlength="0" maxlength="45" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="vehicle_chasis_number" class="form-label"> Vehicle chasis number: </label>
                        <input type="text" id="vehicle_chasis_number" name="vehicle_chasis_number" class="form-control"
                            placeholder="Vehicle chasis number" minlength="0" maxlength="45" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="vehicle_yom" class="form-label"> Vehicle yom: </label>
                        <input type="date" id="vehicle_yom" name="vehicle_yom" class="form-control" dateISO="true" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="vehicle_no_of_passengers" class="form-label"> Vehicle no of passengers: </label>
                        <input type="number" id="vehicle_no_of_passengers" name="vehicle_no_of_passengers"
                            class="form-control" placeholder="Vehicle no of passengers" minlength="0" maxlength="11" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="vehicle_weight" class="form-label"> Vehicle weight (Kg): </label>
                        <input type="number" id="vehicle_weight" name="vehicle_weight" class="form-control"
                            placeholder="Vehicle weight" minlength="0" maxlength="11" required>
                    </div>
                </div>
               
               
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="vehicle_type_idvehicle_type" class="form-label"> Vehicle type (capacity) : <span
                                class="text-danger">*</span> </label>
                        <select id="vehicle_type_idvehicle_type" name="vehicle_type_idvehicle_type" class="form-select"
                            required>
                            <?php foreach($vehicle_type as $data){ ?>
                            <option value="<?php echo $data->idvehicle_type; ?>"><?php echo $data->vehicle_capacity; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="Location_idLocation" class="form-label"> Location : <span
                                class="text-danger">*</span> </label>
                        <select id="Location_idLocation" name="Location_idLocation" class="form-select" required>
                            <?php foreach($location as $data){ ?>
                            <option value="<?php echo $data->idLocation; ?>"><?php echo $data->locationname; ?></option>
                            <?php } ?>
                        </select>
                    </div>
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
</script>