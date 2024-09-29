<div class="container-xxl flex-grow-1 container-p-y">
   <!-- Examples -->
   <div class="row mb-5">
      <div class="col-md-12 mb-3">
         <div class="card h-100">
            <div class="card-body">
					
               <h5 class="card-title">Employee Details Report</h5>
			   
			   <br><br>
               <table id="employee" class="display nowrap" style="width:100%" >
			   
                  <thead class="thead-dark">
                     <tr>
                        <th>#</th>
                        <th>Epf</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Gender</th>
						<th>Grade</th>
						<th>Isactive</th>
						<th>Employee type </th>
						<!--<th>Userid</th>
						<th>Isdelete</th>-->
						
						

                     </tr>
                  </thead>
                  <tbody>
						<?php $i=1; foreach($employee as $row) {?>
						<tr>
							<td><?=$i++?></td>
                            <td><?=$row->epf;?></td>
							<td><?=$row->fname;?></td>
							<td><?=$row->lname;?></td>
							<td>
							    <?php if($row->gender == 0){ ?>
                                    <b class="badge bg-label-danger">Female</b>
                                 <?php }else{ ?>
                                    <b class="badge bg-label-warning">Male</b>
                                <?php } ?>
							</td>
							<td><?=$row->grade;?></td>
							<td>
							    <?php if($row->isactive == 0){ ?>
                                    <b class="badge bg-label-info">Not Active</b>
                                 <?php }else{ ?>
                                    <b class="badge bg-label-success">Active</b>
                                <?php } ?> 
							</td>
							 
                            <td>
                                <?php
                                    $employeetype_id = $row->employeetype_idemployeetype;
                                    switch ($employeetype_id) {
                                        case 2:
                                            echo 'Admin';
                                            break;
                                        case 3:
                                            echo 'Gantry Operator';
                                            break;
                                        case 4:
                                            echo 'Driver';
                                            break;
                                        // Add more cases if needed
                                        default:
                                            echo 'Security';
                                    }
                                ?>
                            </td>


							<!--<td><?=$row->userid;?></td>
							<td><?=$row->isdelete;?></td>-->

							
						
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
   new DataTable('#employee', {
        scrollX: true,
        scrollY: 350,
		dom: 'Bfrtip',
		lengthChange: false,
        buttons: 
		[ 
			{
                extend: 'print',
                title: 'Employee details report',
				
            },
            {
                extend: 'excel',
                filename: 'Employee details report',
				title: 'Employee details report',
            },
            {
                extend: 'pdf',
                filename: 'Employee details report',
				title: 'Employee details report',
            },
            {
                extend: 'colvis',
                filename: 'Employee details report',
            }

		],
					
    });
   
</script>
