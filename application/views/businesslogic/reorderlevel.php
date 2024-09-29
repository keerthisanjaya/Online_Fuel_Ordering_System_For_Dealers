<div class="container-xxl flex-grow-1 container-p-y">
   <!-- Examples -->
   <div class="row mb-5">
      <div class="col-md-12 mb-3">
         <div class="card h-100">
            <div class="card-body">
					
               <h5 class="card-title">Reorder Level Status Details</h5>
			   
			   <br><br>
               <table id="dailydip" class="display nowrap" style="width:100%" >
                  <thead class="thead-dark">
                     <tr>
                        <th>#</th>
                        <th>Filling Station Name</th>
						<th>Checkdate</th>
						<th>Petrol Level</th>
						<th>Diesel Level</th>
						<th>Super Diesel Level</th>
						<th>Super Petrol Level</th>
						
                     </tr>
                  </thead>
                  <tbody>
				  
				
						<?php $i=1; foreach($reorders as $row) {?>
						<tr>
							<td><?=$i++?></td>
                            <td><?=$row->fillingstation_name;?></td>
							<td><?=$row->checkdate;?></td>
							<td>
								<?php if($row->remainpetrollevel <= ($row->capacityofpetroltank *0.50 )){ ?>
									<a href="#" class="btn btn-danger"><?=$row->remainpetrollevel;?></a>
								<?php }else{ ?>
									<a href="#" class="btn btn-success"><?=$row->remainpetrollevel;?></a>
								<?php } ?>	
							</td>
							<td>
								<?php if($row->remaindiesellevel <= ($row->capacityofdieseltank *0.50 )){ ?>
									<a href="#" class="btn btn-danger"><?=$row->remaindiesellevel;?></a>
								<?php }else{ ?>
									<a href="#" class="btn btn-success"><?=$row->remaindiesellevel;?></a>
								<?php } ?>	
							</td>
							<td>
								<?php if($row->remainsuperdiesellevel <= ($row->capacityofsuperdiesel *0.50 )){ ?>
									<a href="#" class="btn btn-danger"><?=$row->remainsuperdiesellevel;?></a>
								<?php }else{ ?>
									<a href="#" class="btn btn-success"><?=$row->remainsuperdiesellevel;?></a>
								<?php } ?>
							</td>
							<td>
								<?php if($row->remainsuperpetrollevel <= ($row->capacityofsuperpetrol *0.50 )){ ?>
									<a href="#" class="btn btn-danger"><?=$row->remainsuperpetrollevel;?></a>
								<?php }else{ ?>
									<a href="#" class="btn btn-success"><?=$row->remainsuperpetrollevel;?></a>
								<?php } ?>
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
   new DataTable('#dailydip', {
   scrollX: true,
   scrollY: 350
   });
   
</script>