<div class="container-xxl flex-grow-1 container-p-y">
   <div class="card mb-4">
   
   
   <!-- error message start-->
      <?php
         if($this->session->flashdata('message')) {?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong><?php echo $this->session->flashdata('message'); ?></strong> 
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php }					  
         ?>
      <?php
         if($this->session->flashdata('error')){?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong><?php echo $this->session->flashdata('error'); ?></strong> 
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php }					  
         ?>
		<!-- error message end--> 
		 
		 
      <h5 class="card-header">Update Employee type Details</h5>
      
      <hr class="my-0">
      <div class="card-body">
         <form method="POST" action="<?php echo base_url();?>index.php/employeetype/update/<?php echo $primaryid; ?>">
            <div class="row">
            <input type="hidden" id="idemployeetype" name="idemployeetype" class="form-control" placeholder="Idemployeetype" maxlength="11" required>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="employeetype" class="form-label"> Employee Type: </label>
									<input type="text" id="employeetype" name="employeetype" class="form-control" value="<?php echo $employeetype->employeetype; ?>" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="isactive" class="form-label"> Is Active: <span class="text-danger">*</span> </label>
									<select id="isactive" name="isactive" class="form-select" required>
										<option value="0" <?php if($employeetype->isactive == 0) echo 'selected'; ?>>No</option>
										<option value="1" <?php if($employeetype->isactive == 1) echo 'selected'; ?>>Yes</option>
									</select>
								</div>
							</div>

            </div>
            <div class="mt-2">
               <button type="submit" class="btn btn-primary me-2">Save</button>
               <a href="<?php echo base_url('employeetype'); ?>" class="btn btn-secondary">Back</a>
            </div>
         </form>
      </div>
   </div>
</div>
<script>
</script>

 