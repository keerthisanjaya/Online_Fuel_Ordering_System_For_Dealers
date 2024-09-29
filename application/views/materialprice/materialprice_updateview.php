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
		 
		 
      <h5 class="card-header">Update Material Price Details</h5>
      
      <hr class="my-0">
      <div class="card-body">
         <form method="POST" action="<?php echo base_url();?>index.php/materialprice/update/<?php echo $primaryid; ?>">
            <div class="row">
            <input type="hidden" id="idmaterialprice" name="idmaterialprice" class="form-control" placeholder="Idmaterialprice" maxlength="11" required>
							<div class="form-group mb-3">
									<label for="materialtype" class="form-label"> Material Type: </label>
									<select id="materialtype" name="materialtype" class="form-select" >
										<option value="petrol"<?php if($materialprice->materialtype == "petrol") echo 'selected'; ?>>Petrol</option>
										<option value="deisel" <?php if($materialprice->materialtype == "deisel") echo 'selected'; ?>>Deisel</option>
										<option value="superpetrol" <?php if($materialprice->materialtype == "superpetrol") echo 'selected'; ?>>Super Petrol</option>
										<option value="superdeisel" <?php if($materialprice->materialtype == "superdeisel") echo 'selected'; ?>>Super Deisel</option>
									</select>
								</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="materialprice" class="form-label"> Material Price: </label>
									<input type="number" id="materialprice" name="materialprice" class="form-control" value="<?php echo $materialprice->materialprice; ?>">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="material_is_active" class="form-label"> Material is active: </label>
									<select id="material_is_active" name="material_is_active" class="form-select" >
										<option value="0" <?php if($materialprice->material_is_active == 0) echo 'selected'; ?>>No</option>
										<option value="1" <?php if($materialprice->material_is_active == 1) echo 'selected'; ?>>Yes</option>
									</select>
								</div>
							</div>
							<!--<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="isdelete" class="form-label"> Isdelete: </label>
									<select id="isdelete" name="isdelete" class="form-select" >
										<option value="0">No</option>
										<option value="1">Yes</option>
									</select>
								</div>
							</div>-->

            </div>
            <div class="mt-2">
               <button type="submit" class="btn btn-primary me-2">Save</button>
               <a href="<?php echo base_url('materialprice'); ?>" class="btn btn-secondary">Back</a>
            </div>
         </form>
      </div>
   </div>
</div>
<script>
</script>

 