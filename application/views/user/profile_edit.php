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
		 
		  <div class="text-center mb-4">
              <h5 class="card-header">Edit User Information</h5>
              <p>Updating user details will receive a privacy audit.</p>
         </div>
      
      <hr class="my-0">
      <div class="card-body">
         <form method="POST" action="<?php echo base_url();?>index.php/Users/editOwnUserdata/<?php echo $this->session->userdata('user_id'); ?>">
            <div class="row">
            <input type="hidden" id="idUsers" name="idUsers" class="form-control" placeholder="IdUsers" maxlength="11" required>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="firstname" class="form-label"> Firstname: </label>
									<input type="text" id="firstname" name="firstname" class="form-control" value="<?php echo $user_data->firstname; ?>">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="lastname" class="form-label"> Lastname: </label>
									<input type="text" id="lastname" name="lastname" class="form-control" value="<?php echo $user_data->lastname; ?>">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="email" class="form-label"> Email: </label>
									<input type="email" id="email" name="email" class="form-control" value="<?php echo $user_data->email; ?>" readonly>
								</div>
							</div>
								<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="email" class="form-label"> NIC: </label>
									<input type="email" id="email" name="email" class="form-control" value="<?php echo $user_data->nic; ?>" readonly>
								</div>
							</div>
							
							
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="phonenumber" class="form-label"> Phonenumber: </label>
									<input type="text" id="phonenumber" name="phonenumber" class="form-control" value="<?php echo $user_data->phonenumber; ?>">
								</div>
							</div>
							

            </div>
            <div class="mt-2">
               <button type="submit" class="btn btn-primary me-2">Save</button>
                <a href="<?php echo base_url('dashboard'); ?>" class="btn btn-secondary">Back</a>
            </div>
         </form>
      </div>
   </div>
</div>
<script>
</script>

 