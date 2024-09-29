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
					
               <h5 class="card-title">Dailydip Details</h5>
			   <div class="float-right">
			   		   <a href="<?php echo base_url();?>index.php/dailydip/insert" class="btn btn-info"><i class="fa fa-pencil"></i> Add New Dailydip</a>
			   </div>
			   <br><br>
               <table id="dailydip" class="display nowrap" style="width:100%" >
                  <thead class="thead-dark">
                     <tr>
                        <th>#</th>
                        <th>Check Date</th>
						<th>Petrol</th>
						<th>Diesel</th>
						<th>Super Diesel</th>
						<th>Super Petrol</th>
						<th>Fillingstation</th>
						<!--<th>Isdelete</th>-->
						<th>Action</th>

                     </tr>
                  </thead>
                  <tbody>
						<?php $i=1; foreach($dailydip as $row) {?>
						<tr>
							<td><?=$i++?></td>
                            <td><?=$row->checkdate;?></td>
							<td><?=$row->petrol;?></td>
							<td><?=$row->diesel;?></td>
							<td><?=$row->superdiesel;?></td>
							<td><?=$row->superpetrol;?></td>
							<!-- Assuming $fillingstation is available -->
							<?php foreach ($fillingstation as $fs) {
								if ($fs->idfillingstation == $row->fillingstation_idfillingstation) {?>
									<td><?=$fs->fillingstation_name;?></td>
								<?php }
							} ?>
							<!--<td><?=$row->isdelete;?></td>-->

							<td>
								<a href="<?php echo base_url();?>index.php/dailydip/edit/<?=$row->iddailydip; ?>" class="btn btn-sm btn-primary">Edit</a>
								<a href="<?php echo base_url();?>index.php/dailydip/delete/<?=$row->iddailydip; ?>" class="btn btn-sm btn-danger">Delete</a>
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
   new DataTable('#dailydip', {
   scrollX: true,
   scrollY: 350
   });
   
</script>