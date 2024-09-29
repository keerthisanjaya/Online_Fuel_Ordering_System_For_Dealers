<div class="container-xxl flex-grow-1 container-p-y">
   <!-- Examples -->
   <div class="row mb-5">
      <div class="col-md-12 mb-3">
         <div class="card h-100">
            <div class="card-body">
					
               <h5 class="card-title">Login Log Details Report</h5>
			   
			   <br><br>
               <table id="loginlog" class="display nowrap" style="width:100%" >
			   
                  <thead class="thead-dark">
                     <tr>
                        <th>#</th>
                        <th>Log ID</th>
						<th>Login date/Time </th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>NIC</th>
						<th>Email</th>
						<th>User ID</th>
						<th>User Phone number</th>
						
						
						

                     </tr>
                  </thead>
                  <tbody>
						<?php $i=1; foreach($login as $row) {?>
						<tr>
							<td><?=$i++?></td>
                            <td><?=$row->idloginlog;?></td>
							<td><?=$row->logindate;?></td>
							<td><?=$row->firstname;?></td>
							<td><?=$row->lastname;?></td>
							<td><?=$row->nic;?></td>
							<td><?=$row->email;?></td>
							<td><?=$row->Users_idUsers;?></td>
							<td><?=$row->phonenumber;?></td>
						     			
											
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
   new DataTable('#loginlog', {
        scrollX: true,
        scrollY: 350,
		dom: 'Bfrtip',
		lengthChange: false,
        buttons: 
		[ 
			{
                extend: 'print',
                title: 'loginlog details report',
				
            },
            {
                extend: 'excel',
                filename: 'loginlog details report',
				title: 'loginlog details report',
            },
            {
                extend: 'pdf',
                filename: 'loginlog details report',
				title: 'loginlog details report',
            },
            {
                extend: 'colvis',
                filename: 'loginlog details report',
            }

		],
					
    });
   
</script>
