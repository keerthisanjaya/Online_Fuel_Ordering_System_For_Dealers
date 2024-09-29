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
		 
		 
      <h5 class="card-header">Update Users Details</h5>
      
      <hr class="my-0">
      <div class="card-body">
         <form method="POST" action="<?php echo base_url();?>index.php/users/update/<?php echo $primaryid; ?>">
            <div class="row">
            <input type="hidden" id="idUsers" name="idUsers" class="form-control" placeholder="IdUsers" maxlength="11" required>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="firstname" class="form-label"> Firstname: </label>
									<input type="text" id="firstname" name="firstname" class="form-control" value="<?php echo $users->firstname; ?>">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="lastname" class="form-label"> Lastname: </label>
									<input type="text" id="lastname" name="lastname" class="form-control" value="<?php echo $users->lastname; ?>">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="email" class="form-label"> Email: </label>
									<input type="email" id="email" name="email" class="form-control" value="<?php echo $users->email; ?>" readonly>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="isadmin" class="form-label"> Isadmin: </label>
									<select id="isadmin" name="isadmin" class="form-select onchange="updateViewadmin()" >
										<option value="0">No</option>
										<option value="1">Yes</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="isdealer" class="form-label"> Isdealer: </label>
									<select id="isdealer" name="isdealer" class="form-select onchange ="updateViewdealer()">
										<option value="0">No</option>
										<option value="1">Yes</option>
									</select>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="phonenumber" class="form-label"> Phonenumber: </label>
									<input type="text" id="phonenumber" name="phonenumber" class="form-control" value="<?php echo $users->phonenumber; ?>">
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
                <a href="<?php echo base_url('users'); ?>" class="btn btn-secondary">Back</a>
            </div>
         </form>
      </div>
   </div>
</div>

<script>
      // Get the value passed from the controller
      
    var Isadminvalue = "<?php echo $users->isadmin; ?>";

    // Set the selected option in the dropdown
    
    document.getElementById("isadmin").value = Isadminvalue;

    function updateViewadmin()
    {
        // Get the currently selected value from the dropdown
        
        var selectedValue = document.getElementById("isadmin").value;
        console.log("Selected value:", selectedValue);
        
        // You can perform further actions here if needed
    }
</script>

<script>
      // Get the value passed from the controller
      
    var Isdealervalue = "<?php echo $users->isdealer; ?>";

    // Set the selected option in the dropdown
    
    document.getElementById("isdealer").value = Isdealervalue;

    function updateViewdealer()
    {
        // Get the currently selected value from the dropdown
        
        var selectedValue = document.getElementById("isdealer").value;
        console.log("Selected value:", selectedValue);
        
        // You can perform further actions here if needed
    }
</script>

 