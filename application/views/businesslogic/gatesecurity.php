<div class="container-xxl flex-grow-1 container-p-y">
   <!-- Examples -->
   <div class="row mb-5">
      <div class="col-md-12 mb-3">
         <div class="card h-100">
            <div class="card-body">
                <!-- error message start-->
              <?php if ($this->session->flashdata('success')) { ?>
            	<div class="row col-md-12 row justify-content-center mt-3" >
            		<div class="alert alert-success alert-dismissible fade show col-md-4" role="alert">
            			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            			<strong>Successfull:</strong> <?php echo $this->session->flashdata('success'); ?>
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
					
               <h5 class="card-title">Gate Exit Details</h5>
			   <div class="float-right">
			   		 
			   </div>
			   <br><br>
               <table id="bowserassign" class="display nowrap" style="width:100%" >
                  <thead class="thead-dark">
                     <tr>
                        <th>#</th>
                        <th>Invoice Number</th>
                        <th>Vehicle Number</th>
                        <th>Driver EPF</th>
                        <th>Seal Number</th>
                        <th>Exit Time</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  
                  <tbody>
						<?php $i=1; foreach($bowserassign as $row) {?>
						<tr>
                            <td><?=$i++?></td>
                            <td><?=$row->invnum;?></td>
                            <td><?=$row->vehiclenum;?></td>
                            <td><?=$row->drivernum;?></td>
                            <td><?=$row->sealnumber;?></td>
                            <td><?=$row->exittime;?></td>

							<td>
							    <?php if($row->orderstatus == 4){ ?>
                               <a href="<?php echo base_url('security/opengate/'.$row->idbowser); ?>" class="btn btn-sm btn-primary">Open Gate</a>
                            <?php }else{ ?>
                                <span class="btn btn-sm btn-primary disabled" aria-disabled="true">Open Gate</span>
                            <?php } ?> 
							    
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
   new DataTable('#bowserassign', {
   scrollX: true,
   scrollY: 350
   });
   
</script>

