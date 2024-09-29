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
					
               <h5 class="card-title">Vehicle Revenue License Details</h5>
			   <div class="float-right">
			   		   <a href="<?php echo base_url();?>index.php/vehicle/certificate/revenuelicesen" class="btn btn-info"><i class="fa fa-pencil"></i> Add New Vehicle Revenue Llicense</a>
			   </div>
			   <br><br>
               <table id="vehicle_revenue_license" class="display nowrap" style="width:100%" >
                  <thead class="thead-dark">
                     <tr>
                        <th>#</th>
                        <th>Revenue License Name</th>
						<th>License Issue Date</th>
						<th>License Expiry Date</th>
						<th>License is active</th>
						<th>Vehicle Number</th>
					<!--	<th>Isdelete</th>-->
						<th>Action</th>

                     </tr>
                  </thead>
                  <tbody>
						<?php $i=1; foreach($vehicle_revenue_license as $row) {
						    
						    // Convert expiry date string to a DateTime object
								$expiry_date = new DateTime($row->vehicle_revenue_license_expiry_date);
								// Calculate 2 days before the expiry date
								$two_days_before_expiry = (new DateTime())->modify('-2 days');
								// Check if the expiry date is within 2 days from now
								$is_critical = $expiry_date < $two_days_before_expiry;
								// Apply a CSS class based on the condition
								$color_class = $is_critical ? 'text-danger' : '';
						
						
						?>
						<tr>
							<td><?=$i++?></td>
                            <td><?=$row->vehicle_revenue_license_name;?></td>
							<td><?=$row->vehicle_revenue_license_issue_date;?></td>
							<td class="<?=$color_class?>"><?=$row->vehicle_revenue_license_expiry_date;?></td>
							<td>
							    <?php if ($row->vehicle_revenue_license_is_active == 1): ?>
									<span class="badge bg-label-success">Active</span>
								<?php else: ?>
									<span class="badge bg-label-danger">Inactive</span>
								<?php endif; ?>
							</td>
							<td>
								<?php
									// Find the corresponding vehicle number
									$vehicle_number = 'N/A'; // Default if not found
									foreach ($vehicle as $v) {
										if ($v->idvehicle == $row->vehicle_idvehicle) {
											$vehicle_number = $v->vehicle_number;
											break;
										}
									}
									echo $vehicle_number;
								?>
							</td>
						<!--	<td><?=$row->isdelete;?></td>-->

							<td>
								<a href="<?php echo base_url();?>index.php/vehiclerevenuelicense/edit/<?=$row->idvehicle_revenue_license; ?>" class="btn btn-sm btn-primary">Edit</a>
								<a href="<?php echo base_url();?>index.php/vehiclerevenuelicense/delete/<?=$row->idvehicle_revenue_license; ?>" class="btn btn-sm btn-danger">Delete</a>
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
   new DataTable('#vehicle_revenue_license', {
   scrollX: true,
   scrollY: 350
   });
   
</script>