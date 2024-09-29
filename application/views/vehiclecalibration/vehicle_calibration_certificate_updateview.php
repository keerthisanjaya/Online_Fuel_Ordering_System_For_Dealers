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

        <h5 class="card-header">Update Vehicle Calibration Certificate Details</h5>

        <hr class="my-0">
        <div class="card-body">
           	 <form method="POST" action="<?php echo base_url();?>index.php/vehiclecalibrationcertificate/update/<?php echo $primaryid; ?>" enctype="multipart/form-data">

                <input type="hidden" id="idvehicle_calibration_certificate" name="idvehicle_calibration_certificate"
                    class="form-control" placeholder="Idvehicle calibration certificate" maxlength="11" value="<?php echo $vehicle_calibration_certificate->idvehicle_calibration_certificate;?>"required>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="vehicle_calibration_certificate_name" class="form-label"> Vehicle calibration
                            certificate name: </label>
                        <input type="text" id="vehicle_calibration_certificate_name"
                            name="vehicle_calibration_certificate_name" class="form-control"
                            placeholder="Vehicle calibration certificate name" minlength="0" maxlength="45" value="<?php echo $vehicle_calibration_certificate->vehicle_calibration_certificate_name;?>">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="vehicle_calibration_certificate_issue_date" class="form-label"> Vehicle calibration
                            certificate issue date: </label>
                        <input type="date" id="vehicle_calibration_certificate_issue_date"
                            name="vehicle_calibration_certificate_issue_date" class="form-control" dateISO="true" value="<?php echo $vehicle_calibration_certificate->vehicle_calibration_certificate_issue_date;?>">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="vehicle_calibration_certificate_expiry_date" class="form-label"> Vehicle calibration
                            certificate expiry date: </label>
                        <input type="date" id="vehicle_calibration_certificate_expiry_date"
                            name="vehicle_calibration_certificate_expiry_date" class="form-control" dateISO="true" value="<?php echo $vehicle_calibration_certificate->vehicle_calibration_certificate_expiry_date;?>">
                    </div>
                </div>

                
                <div class="col-md-12 row mb-3">
					<div class="form-group col-md-3">
						<a class="btn btn-primary me-2" href="<?php echo base_url() . $vehicle_calibration_certificate->document_path; ?>" target="_blank">View Document</a>.
						<input type="hidden" name="previousFile" value="<?php echo base_url() . $vehicle_calibration_certificate->document_path; ?>">
					</div>
					<div class="form-group col-md-9">
						<input type="file"  name="calibrationcerfication" class="form-control" placeholder="Filename" >
					</div>
				</div>
                
                <div class="col-md-12">
				<div class="form-group mb-3">
					<label for="vehicle_calibration_certificate_is_active" class="form-label"> Vehicle calibration certificate is active: </label>
					<select id="vehicle_calibration_certificate_is_active" name="vehicle_calibration_certificate_is_active" class="form-select" >
						<option value="0">No</option>
						<option value="1">Yes</option>
					</select>
				</div>
			</div>
                
                
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="vehicle_idvehicle" class="form-label"> Vehicle: <span
                                class="text-danger">*</span> </label>
                        <select id="vehicle_idvehicle" name="vehicle_idvehicle" class="form-select" required>
                            <?php foreach($vehicle as $data){ ?>
                                <option value="<?php echo $data->idvehicle; ?>"><?php echo $data->vehicle_number; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
               
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Save</button>
                    <a href="<?php echo base_url('vehiclecalibrationcertificate'); ?>" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
</script>