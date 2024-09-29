<div class="container-xxl flex-grow-1 container-p-y">
   <!-- Examples -->
   <div class="row mb-5">
      <div class="col-md-12 mb-3">
         <div class="card h-100">
            <div class="card-body">
                
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
					
               <h5 class="card-title">Vehicle Type Details</h5>
               
			   <div class="float-right">
			   		   <a href="<?php echo base_url();?>index.php/vehicletype/insert" class="btn btn-info"><i class="fa fa-pencil"></i> Add New Vehicle Type</a>
			   </div>
			   <br><br>
               <table id="vehicle_type" class="display nowrap" style="width:100%" >
                  <thead class="thead-dark">
                     <tr>
                        <th>#</th>
                        <th>Vehicle capacity</th>
						<th>Vehicle type</th>
						<th>Vehicle type is active</th>
						<th>Action</th>

                     </tr>
                  </thead>
                  <tbody>
						<?php $i=1; foreach($vehicle_type as $row) {?>
						<tr>
							<td><?=$i++?></td>
                            <td><?=$row->vehicle_capacity;?></td>
							<td><?=$row->vehicle_type;?></td>
							<td>
							    <?php if ($row->vehicle_type_is_active == 1): ?>
									<span class="badge bg-label-success">Active</span>
								<?php else: ?>
									<span class="badge bg-label-danger">Inactive</span>
								<?php endif; ?>
							    
							</td>
							
							<td>
								<a href="<?php echo base_url();?>index.php/vehicletype/edit/<?=$row->idvehicle_type; ?>" class="btn btn-sm btn-primary">Edit</a>
								<a href="<?php echo base_url();?>index.php/vehicletype/delete/<?=$row->idvehicle_type; ?>" class="btn btn-sm btn-danger">Delete</a>
							</td>
						
						</tr>
						<?php } ?>
                     				                      
                    
                  </tbody>
               </table>
			   
               
            </div>
         </div>
      </div>
   </div>
   <!-- Examples -->
</div>
<script>   
   new DataTable('#vehicle_type', {
   scrollX: true,
   scrollY: 350
   });
   
</script>


