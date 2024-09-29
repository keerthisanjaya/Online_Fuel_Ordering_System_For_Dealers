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
					
               <h5 class="card-title">Unapproved Users Details</h5>
			   
			   <br><br>
               <table id="users" class="display nowrap" style="width:100%" >
                  <thead class="thead-dark">
                     <tr>
                        <th>#</th>
                        <th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th>Isadmin</th>
						<th>Isdealer</th>
						<th>Phone Number</th>
						<th>Actions</th>
						

                     </tr>
                  </thead>
                  <tbody>
						<?php $i=1; foreach($users as $row) {?>
						<tr>
							<td><?=$i++?></td>
                            <td><?=$row->firstname;?></td>
							<td><?=$row->lastname;?></td>
							<td><?=$row->email;?></td>
							<td>
								 <?php
								if ($row->isadmin == 1) {
									echo 'Admin';
								} elseif ($row->isadmin == 0) {
									echo '';
								} 
								?>
							</td>
							<td>
								
								 <?php
								if ($row->isdealer == 1) {
									echo 'Dealer';
								} elseif ($row->isadmin == 0) {
									echo '';
								} 
								?>
							</td>
							<td><?=$row->phonenumber;?></td>
							
							<td>
								<a href="<?php echo base_url();?>index.php/Users/approveData/<?=$row->idUsers; ?>" class="btn btn-sm btn-primary">Approve</a>
								
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
   new DataTable('#users', {
   scrollX: true,
   scrollY: 350,
   dom: 'Bfrtip',
		lengthChange: false,
        buttons: 
		[ 
			{
                extend: 'print',
                title: 'Pending User Details Report',
				
            },
            {
                extend: 'excel',
                filename: 'Pending User Details Report',
				title: 'Pending User Details Report',
            },
            {
                extend: 'pdf',
                filename: 'Pending User Details Report',
				title: 'Pending User Details Report',
            },
            {
                extend: 'colvis',
                filename: 'Pending User Details Report',
            }

		],
					
    
   });
   
</script>