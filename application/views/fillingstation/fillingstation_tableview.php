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
		
	
					
               <h5 class="card-title">Filling Station Details</h5>
			   <div class="float-right">
			   		  <!--  <a href="<?php echo base_url();?>index.php/fillingstation/insert" class="btn btn-info"><i class="fa fa-pencil"></i> Add New fillingstation</a> -->
			   </div>
			   <br><br>
               <table id="fillingstation" class="display nowrap" style="width:100%" >
                  <thead class="thead-dark">
                     <tr>
                        <th>#</th>
                        <!--<th>Idfillingstation</th>-->
						<th>Fillingstation Name</th>
						<th>Fillingstation Addr</th>
						<th>Number of Fuel Despencers</th>
						<th>Petrol Tank Capacity(L)</th>
						<th>Diesel Tank Capacity(L)</th>
						<th>Super Petrol Capacity(L)</th>
						<th>Super Diesel Capacity(L)</th>
						<th>District</th>
						<th>Document</th>
						<th>Owner Phone No</th>
						<th>Isapproved</th>
						<th>Approved By</th>
						<th>Action</th>

                     </tr>
                  </thead>
                  <tbody>
						<?php $i=1; foreach($fillingstation as $row) {?>
						<tr>
							<td><?=$i++?></td>
                            <!--<td><?=$row->idfillingstation;?></td>-->
							<td><?=$row->fillingstation_name;?></td>
							<td><?=$row->fillingstation_address;?></td>
							<td><?=$row->numberoffueldespencers;?></td>
							<td><?=$row->capacityofpetroltank;?></td>
							<td><?=$row->capacityofdieseltank;?></td>
							<td><?=$row->capacityofsuperpetrol;?></td>
							<td><?=$row->capacityofsuperdiesel;?></td>
							<td><?=$row->district;?></td>
							<td>
							    <?php foreach($docs as $doc): ?>
                                    <?php if($doc->fillingstation_idfillingstation == $row->idfillingstation): ?>
                                        <a href="<?php echo base_url() . $doc->document_path; ?>" target="_blank">View Document</a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
							<td><?=$row->phonenumber;?></td>
							<td>
								<?php if($row->isapproved == 1): ?>
									<span class="badge bg-label-success">Approved</span>
						    	<?php else: ?>
								<span class="badge bg-label-danger">Pending or Suspend</span>
								<?php endif; ?>
								
							</td>
							<td><?=$row->approvedby;?></td>

							<td>
								<a href="<?php echo base_url();?>index.php/fillingstation/edit/<?=$row->idfillingstation; ?>" class="btn btn-sm btn-primary">Edit</a>
								<a href="<?php echo base_url();?>index.php/fillingstation/suspend/<?=$row->idfillingstation; ?>" class="btn btn-sm btn-danger">Suspend</a>
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
   new DataTable('#fillingstation', {
   scrollX: true,
   scrollY: 350
   });
   
</script>