<div class="container-xxl flex-grow-1 container-p-y">
   <!-- Examples -->
   <div class="row mb-5">
      <div class="col-md-12 mb-3">
         <div class="card h-100">
            <div class="card-body">
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
					
               <h5 class="card-title">Employee Type Details</h5>
			   <div class="float-right">
			   		   <a href="<?php echo base_url();?>index.php/employeetype/insert" class="btn btn-info"><i class="fa fa-pencil"></i> Add New Employee Type</a>
			   </div>
			   <br><br>
               <table id="employeetype" class="display nowrap" style="width:100%" >
                  <thead class="thead-dark">
                     <tr>
                        <th>#</th>
                        <!--<th>Idemployeetype</th>-->
						<th>Employee Type</th>
						<th>Employee type is Active</th>
						<th>Action</th>

                     </tr>
                  </thead>
                  <tbody>
						<?php $i=1; foreach($employeetype as $row) {?>
						<tr>
							<td><?=$i++?></td>
                            <!--<td><?=$row->idemployeetype;?></td>-->
							<td><?=$row->employeetype;?></td>
							<td>
							    <?php if ($row->isactive == 1): ?>
									<span class="badge bg-label-success">Active</span>
								<?php else: ?>
									<span class="badge bg-label-danger">Inactive</span>
								<?php endif; ?>
							
							</td>

							<td>
								<a href="<?php echo base_url();?>index.php/employeetype/edit/<?=$row->idemployeetype; ?>" class="btn btn-sm btn-primary">Edit</a>
								<a href="<?php echo base_url();?>index.php/employeetype/delete/<?=$row->idemployeetype; ?>" class="btn btn-sm btn-danger">Delete</a>
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
   new DataTable('#employeetype', {
   scrollX: true,
   scrollY: 350
   });
   
</script>