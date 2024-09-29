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
		
		<?php
	$employeeGrade = [
		'A2',
		'A3',
		'A4',
		'A5',
		'A6',
		'A7',
		'B1',
		'B2',
		'B3',
		'C1',
		'C2',
		'C3',
		'C4',
		
	];
	
?>
		 
		 
      <h5 class="card-header">Add Employee Details</h5>
      
		  <hr class="my-0">
			<div class="card-body">
			 <form method="POST" action="<?php echo base_url();?>index.php/employee/save">
			  
				  <input type="hidden" id="idemployee" name="idemployee" class="form-control" placeholder="Idemployee" maxlength="11" required>
					<div class="col-md-12">
					<div class="form-group mb-3">
						<label for="epf" class="form-label"> Epf: </label>
						<input type="text" id="epf" name="epf" class="form-control" placeholder="Epf" minlength="0"  maxlength="45" >
					</div>
					</div>
					
					<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="fname" class="form-label"> First Name: </label>
									<input type="text" id="fname" name="fname" class="form-control" placeholder="First name" minlength="0"  maxlength="45" >
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="lname" class="form-label"> Last Name: </label>
									<input type="text" id="lname" name="lname" class="form-control" placeholder="Last Name" minlength="0"  maxlength="45" >
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="gender" class="form-label"> Gender: </label>
									<select id="gender" name="gender" class="form-select" >
										<option value="0">Female</option>
										<option value="1">Male</option>
									</select>
								</div>
							</div>
														
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="grade" class="form-label"> Grade: </label>
									<select id="grade" name="grade" class="form-select" >
										<?php foreach($employeeGrade as $dname) { ?>
											<option value="<?php echo $dname; ?>"><?php echo $dname; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
			
			
					<div class="col-md-12">
						<div class="form-group mb-3">
							<label for="employeetype_idemployeetype" class="form-label"> Employeetype: <span class="text-danger">*</span> </label>
							<select id="employeetype_idemployeetype" name="employeetype_idemployeetype" class="form-select" required>
								<?php foreach($employeetype as $data){ ?>
									<option value="<?php echo $data->idemployeetype; ?>"><?php echo $data->employeetype; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
			
            
            <div class="mt-2">
               <button type="submit" class="btn btn-primary me-2">Save</button>
               <a href="<?php echo base_url('employee'); ?>" class="btn btn-secondary">Back</a>
            </div>
         </form>
      </div>
   </div>
</div>
<script>
</script>

 