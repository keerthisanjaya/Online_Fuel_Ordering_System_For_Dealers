<div class="container-xxl flex-grow-1 container-p-y">
   <!-- Examples -->
   <div class="row mb-5">
      <div class="col-md-12 mb-3">
         <div class="card h-100">
            <div class="card-body">
                
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
					
               <h5 class="card-title">Material Price Details</h5>
			   <div class="float-right">
			   		   <a href="<?php echo base_url();?>index.php/materialprice/insert" class="btn btn-info"><i class="fa fa-pencil"></i> Add New Material Price</a>
			   </div>
			   <br><br>
               <table id="materialprice" class="display nowrap" style="width:100%" >
                  <thead class="thead-dark">
                     <tr>
                        <th>#</th>
                        <!--<th>Idmaterialprice</th>-->
						<th>Material Type</th>
						<th>Material Price</th>
						<th>Material is active</th>
						<!--<th>Isdelete</th>-->
						<th>Action</th>

                     </tr>
                  </thead>
                  <tbody>
						<?php $i=1; foreach($materialprice as $row) {?>
						<tr>
							<td><?=$i++?></td>
                            <!--<td><?=$row->idmaterialprice;?></td>-->
							<td><?=$row->materialtype;?></td>
							<td><?=$row->materialprice;?></td>
							<td>
							    <?php if($row->material_is_active == 0){ ?>
                                <b class="badge bg-label-warning">Not Active</b>
                              <?php }else{ ?>
                                <b class="badge bg-label-success">Active</b>
                              <?php } ?> 
							
							</td>
							<!--<td><?=$row->isdelete;?></td>-->

							<td>
								<a href="<?php echo base_url();?>index.php/materialprice/edit/<?=$row->idmaterialprice; ?>" class="btn btn-sm btn-primary">Edit</a>
								<a href="<?php echo base_url();?>index.php/materialprice/delete/<?=$row->idmaterialprice; ?>" class="btn btn-sm btn-danger">Delete</a>
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
   new DataTable('#materialprice', {
   scrollX: true,
   scrollY: 350
   });
   
</script>