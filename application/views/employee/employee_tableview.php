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
					
               <h5 class="card-title">Employee Details</h5>
			   <div class="float-right">
			   		   <a href="<?php echo base_url();?>index.php/employee/insert" class="btn btn-info"><i class="fa fa-pencil"></i> Add New Employee</a>
			   </div>
			   <br><br>
               <table id="employee" class="display nowrap" style="width:100%" >
			   
                  <thead class="thead-dark">
                     <tr>
                        <th>#</th>
                        <th>Epf</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Gender</th>
						<th>Grade</th>
						<th>Is active</th>
						<th>Is available</th>
						<th>Employee Type</th>
						<th>Created By</th>
						<!--<th>Isdelete</th>-->
						<th>Actions</th>

                     </tr>
                  </thead>
                  <!--<?php
                  var_dump($employee);
                  ?>-->
                  <tbody>
						<?php $i=1; foreach($employee as $row) {?>
						<tr>
							<td><?=$i++?></td>
                            <td><?=$row->epf;?></td>
							<td><?=$row->fname;?></td>
							<td><?=$row->lname;?></td>
							<td>
								 
								<?php 
								if ($row->gender == 1): ?>
									<span class="badge bg-label-success">Male</span>
								<?php else: ?>
									<span class="badge bg-label-warning">Female</span>
								<?php endif; ?>
								
							</td>
							<td><?=$row->grade;?></td>
							<td>
							    <?php
							    if ($row->isactive == 1): ?>
									<span class="badge bg-label-success">Active</span>
								<?php else: ?>
									<span class="badge bg-label-danger">Inactive</span>
								<?php endif;
								
								?>
							</td>	
							<td>
							    <?php
							    if ($row->isavailable == 1): ?>
									<span class="badge bg-label-info">Available</span>
								<?php else: ?>
									<span class="badge bg-label-secondary">Not Available</span>
								<?php endif;
								
								?>
								
							
							</td>
							<!--<?php foreach ($employeetype as $et) {
								if ($et->idemployeetype  == $row->employeetype_idemployeetype ) {?>
									<td><?=$et->employeetype;?></td>
								<?php }
							} ?>-->
							
								<td><?=$row->employeetype;?></td>
							
							
							
						    <td><?php echo $row->firstname . ' ' . $row->lastname; ?></td>
							<!--<td><?=$row->isdelete;?></td>-->

							<td>
								<a href="<?php echo base_url();?>index.php/employee/edit/<?=$row->idemployee; ?>" class="btn btn-sm btn-primary">Edit</a>
								<a href="<?php echo base_url();?>index.php/employee/delete/<?=$row->idemployee; ?>" class="btn btn-sm btn-danger">Delete</a>
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
   new DataTable('#employee', {
   scrollX: true,
   scrollY: 350
   });
   
</script>
<script>
    $(document).ready(function() {
        var table = $('#employee').DataTable({
            scrollX: true,
            scrollY: 350,
            dom: 'Bfrtip', // Add B to enable buttons
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print' // Buttons for Copy, CSV, Excel, PDF, and Print
            ]
        });
    });
</script>
