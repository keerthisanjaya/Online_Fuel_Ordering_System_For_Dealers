<div class="container-xxl flex-grow-1 container-p-y">
   <!-- Examples -->
   <div class="row mb-5">
      <div class="col-md-12 mb-3">
         <div class="card h-100">
            <div class="card-body">
					
               <h5 class="card-title">Vehicle Calibration Report</h5>
			   <div class="row">
			   <div class="col-md-4 mb-3">
					<form action="<?php echo site_url('report/calibration'); ?>" method="post">
						<label for="start_date" class="form-label">Start Date:</label>
						<input type="date" id="start_date" name="start_date" class="form-control" value="<?php echo isset($_POST['start_date']) ? $_POST['start_date'] : ''; ?>">
						</div>
						
						<div class="col-md-4 mb-3">
						<label for="end_date"class="form-label">End Date:</label>
						<input type="date" id="end_date" name="end_date" class="form-control" value="<?php echo isset($_POST['end_date']) ? $_POST['end_date'] : ''; ?>">
						</div>
						
						
						 
						  <div class="col-md-12">
							<button type="submit" class="btn btn-primary">Filter</button>
							</div>
					</form>



			  
			   <br><br>
               <table id="calibration" class="display nowrap" style="width:100%" >
			   
                  <thead class="thead-dark">
                     <tr>
                        <th>#</th>
                        <th> Calibration Certificate Name</th>
						<th> Issue Date</th>
						<th> Expiry Date</th>
						<th> Certificate is Active</th>
						<th> Vehicle Number</th>
						
                     </tr>
                  </thead>
				
				  
                  <tbody>
                      
                      
						<?php $i=1; foreach($calibration  as $row) {
						// Convert expiry date string to a DateTime object
								$expiry_date = new DateTime($row->vehicle_calibration_certificate_expiry_date);
								// Calculate 2 days before the expiry date
								$two_days_before_expiry = (new DateTime())->modify('-2 days');
								// Check if the expiry date is within 2 days from now
								$is_critical = $expiry_date < $two_days_before_expiry;
								// Apply a CSS class based on the condition
								$color_class = $is_critical ? 'text-danger' : '';
						
						?>
						<tr>
							<td><?=$i++?></td>
                           	<td><?=$row->vehicle_calibration_certificate_name;?></td>
							<td><?=$row->vehicle_calibration_certificate_issue_date;?></td>
							<td class="<?=$color_class?>"><?=$row->vehicle_calibration_certificate_expiry_date;?></td>
							<td>
							    <?php if ($row->vehicle_calibration_certificate_is_active == 1): ?>
									<span class="badge bg-label-success">Active</span>
								<?php else: ?>
									<span class="badge bg-label-danger">Inactive</span>
								<?php endif; ?>
							
							</td>
							<td>
							    <?=$row->vehicle_number;?>
							</td>
							

							
						</tr>
						<?php } ?>
                     				                      
                    
                  </tbody>
               </table>
			   <?php
					 if($this->session->flashdata('message')) {?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Successfully Added </strong> 
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					<?php }					  
					 ?>
					<?php
					 if($this->session->flashdata('error')){?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Failed!</strong> 
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					<?php }					  
					 ?>
               
            </div>
         </div>
      </div>
   </div>
   <!-- Examples -->
</div>
<script>   
   new DataTable('#calibration', {
        scrollX: true,
        scrollY: 350,
		dom: 'Bfrtip',
		lengthChange: false,
        buttons: 
		[ 
			{
                extend: 'print',
                title: 'Calibration Report',
				
            },
            {
                extend: 'excel',
                filename: 'Calibration Report',
				title: 'Calibration Report',
            },
            {
                extend: 'pdf',
                filename: 'Calibration Report',
				title: 'Calibration Report',
            },
            {
                extend: 'colvis',
                filename: 'Calibration Report',
            }

		],
					
    });
   
   
</script>