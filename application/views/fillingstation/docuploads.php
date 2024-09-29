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
		 
		 
      <h5 class="card-header">Add documents Details</h5>
      
      <hr class="my-0">
      <div class="card-body">
         <form method="POST" action="<?php echo base_url();?>index.php/fuelstation/documents/save" enctype="multipart/form-data">
          
				<div class="col-md-12">
					<div class="form-group mb-3">
						<label for="type" class="form-label"> Type: </label>
						<select id="type" name="type" class="form-select" >
							<option value="fuelstationdoc">Fuelstation Registration Documents</option>
						</select>
					</div>
				</div>

				<div class="col-md-12">
					<div class="form-group mb-3">
						<input type="file" id="filename" name="filename" class="form-control" placeholder="Filename" >
					</div>
				</div>
											
				<div class="col-md-12">
							<div class="form-group mb-3">
								<label for="fillingstation_idfillingstation" class="form-label">Filling station: <span class="text-danger">*</span></label>
								<select id="fillingstation_idfillingstation" name="fillingstation_idfillingstation"
									class="form-select" required>
									<?php foreach($fillingstations as $data){ ?>
										<option value="<?php echo $data->idfillingstation; ?>"><?php echo $data->fillingstation_name; ?></option>
									<?php } ?>
								</select>
							</div>
				</div>
            
            <div class="mt-2">
               <button type="submit" class="btn btn-primary me-2">Save</button>
            </div>
         </form>
      </div>
   </div>
</div>
<script>
</script>

 