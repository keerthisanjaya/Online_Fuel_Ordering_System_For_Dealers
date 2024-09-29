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
					
               <h5 class="card-title">Vehicle Details</h5>
			   <div class="float-right">
			   		   <a href="<?php echo base_url();?>index.php/vehicle/register" class="btn btn-info"><i class="fa fa-pencil"></i> Add New vehicle</a>
			   </div>
			   <br><br>
               <table id="vehicle" class="display nowrap" style="width:100%" >
                  <thead class="thead-dark">
                     <tr>
                        <th>#</th>
                        <th>Vehicle Number</th>
						<th>Vehicle Chasis Number</th>
						<th>Vehicle YOM</th>
						<th>Vehicle no of passengers</th>
						<th>Vehicle Weight (Kg)</th>
					    <th>Vehicle Capacity (Ltr)</th> 
						<th>Vehicle is available</th>
						<th>Vehicle is active</th>
						<th>Location </th>
						<th>Action</th>
						

                     </tr>
                  </thead>
                 
                  <tbody>
						<?php $i=1; foreach($vehicle as $row) {?>
						<tr>
							<td><?=$i++?></td>
                            <td><?=$row->vehicle_number;?></td>
							<td><?=$row->vehicle_chasis_number;?></td>
							<td><?=$row->vehicle_yom;?></td>
							<td><?=$row->vehicle_no_of_passengers;?></td>
							<td><?=$row->vehicle_weight;?></td>
					       <td><?=$row->vehicle_capacity;?></td> 
					       <!-- <td><?php echo isset($row->vehicle_capacity) ? $row->vehicle_capacity : ''; ?></td>-->
							<td>
							    <?php if ($row->vehicle_is_available == 1): ?>
									<span class="badge bg-label-success">Available</span>
								<?php else: ?>
									<span class="badge bg-label-danger">Not Available</span>
								<?php endif; ?>
							
							</td>
							
							<td>
							
							    <?php if ($row->vehicle_is_active == 1): ?>
									<span class="badge bg-label-success">Active</span>
								<?php else: ?>
									<span class="badge bg-label-danger">Inactive</span>
								<?php endif; ?>
							</td>
							
							<td><?=$row->locationname;?></td>
							<td>
								<a href="<?php echo base_url();?>index.php/vehicle/edit/<?=$row->idvehicle; ?>" class="btn btn-sm btn-primary">Edit</a>
								<a href="<?php echo base_url();?>index.php/vehicle/delete/<?=$row->idvehicle; ?>" class="btn btn-sm btn-danger">Delete</a>
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
   new DataTable('#vehicle', {
   scrollX: true,
   scrollY: 350
   });
   
</script>