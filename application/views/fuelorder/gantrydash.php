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
					
               <h5 class="card-title">Gantry Filling Confirmation</h5>
			   <div class="float-right">
			   		  
			   </div>
			   <br><br>
               <table id="orders" class="display nowrap" style="width:100%" >
                  <thead class="thead-dark">
                     <tr>
                        <th>#</th>
                        <th>Invoice No</th>
                        <th>Order Date</th>
                        <th>Approved by</th>
                        <th>Fillingstation Name</th>
                        <th>Fillingstation Address</th>
                        <th>District</th>
                        <th>Item Name</th>
                        <th>Quantity(Litre)</th>
						<th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
						<?php $i=1; 
              foreach($orders as $row) {?>

                <?php if($row->orderstatus == 3){ ?>

						  <tr>
							<td><?=$i++?></td>
                            <td><?=$row->invoicenum;?></td>
                            <td><?=$row->orderdate;?></td>
                            <td><?=$row->approvedby;?></td>
                            <td><?=$row->fillingstation_name;?></td>
                            <td><?=$row->fillingstation_address;?></td>
                            <td><?=$row->district;?></td>
                            <td><?=$row->itemname;?></td>
                            <td><?=$row->qty;?></td>    
                <td>
                  <a href="<?php echo base_url();?>index.php/gantry/assign/<?=$row->idorderitems; ?>" class="btn btn-sm btn-primary">Gantry fill</a>
                </td>  
						</tr>
						<?php } ?>
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