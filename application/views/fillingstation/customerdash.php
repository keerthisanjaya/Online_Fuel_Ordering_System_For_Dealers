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
                    
               <h5 class="card-title">Customer Dashboard</h5>
               <div class="float-right">
               </div>
               <br><br>
               <table id="orderitems" class="display nowrap" style="width:100%" >
                  <thead class="thead-dark">
                     <tr>
                        <th>#</th>
                       <!-- <th>Idorderitems</th> -->
                        <th>Invoice Number</th>
                        <th>Filling Station Name</th>
                        <th>Item Name</th>
                        <th>Qty (Litre)</th>
                        <th>Item Amount (Rs)</th>
                        <th>Order Status</th>
                        <th>Accept Action</th>
                        <th>Invoice Download</th>
                        <!--<th>Action</th>-->
                     </tr>
                  </thead>
                  <tbody>
                        <?php $i=1; foreach($orderitems as $row) {?>
                        <tr>
                            <td><?=$i++?></td>
                            <!--<td><?=$row->idorderitems;?></td>-->
                            <td><?=$row->invoicenum;?></td>
                            <td><?=$row->fillingstation_name;?></td>
                            <td><?=$row->itemname;?></td>
                            <td><?=$row->qty;?></td>
                            <td><?=$row->itemamount;?></td>
                            <td>
                                <?php if($row->orderstatus == 1){ ?>
                                    <a href="#" class="btn btn-primary">Pending approval</a>
                                <?php }else if($row->orderstatus == 2){ ?>
                                    <a href="#" class="btn btn-primary">Bouser Assigned</a>
                                <?php }else if($row->orderstatus == 3){ ?>
                                    <a href="#" class="btn btn-primary">Gantry Filling</a>
                                <?php }else if($row->orderstatus == 4){ ?>
                                    <a href="#" class="btn btn-primary">Gate Exit</a>
                                <?php }else if($row->orderstatus == 5){ ?>
                                    <a href="#" class="btn btn-primary">Gate Exit Confirmed</a>    
                                <?php }else if($row->orderstatus == 6){ ?>
                                    <a href="#" class="btn btn-success">Order Complete</a>
                                <?php }else if($row->orderstatus == 0){ ?>
                                    <a href="#" class="btn btn-info">Order pending</a>    
                                <?php }else{ ?>
                                    <a href="#" class="btn btn-warning">Error</a>
                                <?php } ?>   
                            </td>

                            <td>
                              <?php if($row->orderstatus == 5) {?>
                                <a href="<?php echo base_url();?>index.php/fillingstation/customers/acceptorder/<?=$row->idorderitems; ?>" class="btn btn-sm btn-primary">Order Accepted</a>

                              <?php } ?>  
                              
                            </td>
                            
                            <td>
                              <?php if($row->orderstatus > 0) {?>
                                <a href="<?php echo base_url();?>index.php/Orders/printInvoice/<?=$row->idorderitems; ?>" class="btn btn-sm btn-primary">Download</a>
								<?php } ?> 
                            
                            </td>
                            <!--<td>
                                <a href="<?php echo base_url();?>index.php/fillingstation/deleteitems/<?=$row->idorderitems; ?>" class="btn btn-sm btn-danger">delete</a>
                            </td>-->
                        
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
   new DataTable('#orderitems', {
   scrollX: true,
   scrollY: 350
   });
   
</script>