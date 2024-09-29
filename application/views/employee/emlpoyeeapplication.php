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
                    
               <h5 class="card-title">Employee Details</h5>
               <div class="float-right">
                       <a href="<?php echo base_url();?>index.php/employee/insert" class="btn btn-info"><i class="fa fa-pencil"></i> Add New Employee</a>
               </div>
               <br><br>
               <table id="employee" class="display nowrap" style="width:100%" >
                  <thead class="thead-dark">
                     <tr>
                        <th>#</th>
                        <th>Epf</th>
                        <th>Status</th>
                        <th>Availability</th>
                        <th>Employee type</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                        <?php $i=1; foreach($employee as $row) {?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$row->epf;?></td>
                            <td><?php echo ($row->isactive == 1) ? "Active":"Pending";?></td>
                            <td><?php echo ($row->isavailable==1) ? "Available":"Not Available";?></td>
                            <td>

                            <?php  
                             switch($row->employeetype_idemployeetype){
                                case 2:
                                echo "Manager";
                                break;

                                case 3:
                                echo "Gantry Operator";
                                break;

                                case 4:
                                echo "Driver";
                                break;

                                case 5:
                                echo "Security";
                                break;

                                default:
                                echo "none";
                                break;
                             }
                            ?>        
                            </td>

                            <td>
                                 <div class="row">
                                    <div class="col-md-3">
                                        <?php if($row->isactive == 0) { ?>    
                                            <a href="<?php echo base_url();?>index.php/employee/register/approval/<?=$row->idemployee; ?>" class="btn btn-sm btn-primary btn-block mb-2">Approve</a>
                                        <?php } else { ?>
                                            <button class="btn btn-sm btn-info btn-block mb-2" disabled>Approved</button>
                                        <?php } ?>
                                    </div>
                            
                                    <div class="col-md-3">
                                        <?php if($row->isavailable == 0) { ?>  
                                            <a href="<?php echo base_url();?>index.php/employee/register/activate/<?=$row->idemployee; ?>" class="btn btn-sm btn-success btn-block mb-2">Activate</a>
                                        <?php } else { ?>
                                            <a href="<?php echo base_url();?>index.php/employee/register/deactivate/<?=$row->idemployee; ?>" class="btn btn-sm btn-danger btn-block mb-2">Deactivate</a>
                                        <?php } ?>
                                    </div>
                                </div>
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
   new DataTable('#employee', {
   scrollX: true,
   scrollY: 350
   });
   
</script>