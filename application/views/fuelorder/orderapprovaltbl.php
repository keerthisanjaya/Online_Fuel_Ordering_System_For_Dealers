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
					
               <h5 class="card-title">Pending Orders Table</h5>
			   <div class="float-right">
			   		  
			   </div>
			   <br><br>
               <table id="orders" class="display nowrap" style="width:100%" >
                  <thead class="thead-dark">
                     <tr>
                        <th>#</th>
                        <th>Order Date</th>
                        <th>Invoice No</th>
                        <th>Amount</th>
                        <th>Order Status</th>
                        <th>Payment Status</th>
                        <th>Fillingstation Name</th>
                        <th>Fillingstation Address</th>
                        <th>Locate District</th>
						<th>Action</th>
            
                     </tr>
                  </thead>
                  <tbody>
						<?php $i=1; 
                        foreach($orders as $row) {?>

						  <tr>
							<td><?=$i++?></td>
                            <td><?=$row->orderdate;?></td>
                            <td><?=$row->invoicenum;?></td>
                            <td><?=$row->amount;?></td>
                            <td>
                              <?php if($row->isapproved == 0){ ?>
                                <b class="badge bg-label-danger">Pending</b>
                              <?php }else{ ?>
                                <b class="badge bg-label-primary">Approved</b>
                              <?php } ?>    
                            </td>
                            
                            <td>
                                <?php if($row->ispaid == 0){ ?>
                                <b class="badge bg-label-warning">Not Paid</b>
                              <?php }else{ ?>
                                <b class="badge bg-label-success">Paid</b>
                              <?php } ?> 
                                
                            </td>
                            <td><?=$row->fillingstation_name;?></td>
                            <td><?=$row->fillingstation_address;?></td>
                            <td><?=$row->district;?></td>



                <td>
                  <?php if($row->isapproved == 0){ ?>
                    <a href="<?php echo base_url();?>index.php/orders/approve/<?=$row->idorders; ?>" class="btn btn-sm btn-primary">Approve order</a>
                <?php }else{ ?>
                    <span class="btn btn-sm btn-primary disabled" aria-disabled="true">Approve order</span>
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
   new DataTable('#orders', {
   scrollX: true,
   scrollY: 350
   });
   
</script>