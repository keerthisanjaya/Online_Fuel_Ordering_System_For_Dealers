<?php
	$sriLankaDistricts = [
		'All',
		'Ampara',
		'Anuradhapura',
		'Badulla',
		'Batticaloa',
		'Colombo',
		'Galle',
		'Gampaha',
		'Hambantota',
		'Jaffna',
		'Kalutara',
		'Kandy',
		'Kegalle',
		'Kilinochchi',
		'Kurunegala',
		'Mannar',
		'Matale',
		'Matara',
		'Moneragala',
		'Mullaitivu',
		'Nuwara Eliya',
		'Polonnaruwa',
		'Puttalam',
		'Ratnapura',
		'Trincomalee',
		'Vavuniya'
	];
	
?>

<div class="container-xxl flex-grow-1 container-p-y">
   <!-- Examples -->
   <div class="row mb-5">
      <div class="col-md-12 mb-3">
         <div class="card h-100">
            <div class="card-body">
					
               <h5 class="card-title">Filling Station Details Report</h5>
			   <div class="row">
			   <div class="col-md-4 mb-3">
					<form action="<?php echo site_url('report/'); ?>" method="post">

					<label for="districtFilter" class="form-label">Filter by District:</label>
					<select id="districtFilter" name = "districtFilter" class="form-select" class="form-select">
					    	<?php foreach($sriLankaDistricts as $dname) { ?>
            					<option value="<?php echo $dname; ?>" <?php if(isset($_POST['districtFilter']) && $_POST['districtFilter'] == $dname) echo 'selected="selected"'; ?>><?php echo $dname; ?></option>
            				<?php } ?>

					</select>
					</div>
                    
                    <div class="col-md-4 mb-3">
					<label for="approvalFilter" class="form-label">Filter by Approval:</label>
					<select id="approvalFilter" name= "approvalFilter" class="form-select" >
						<option value="All" <?php if(isset($_POST['approvalFilter']) && $_POST['approvalFilter'] == 'All') echo 'selected="selected"'; ?>>All</option>
                        <option value="1" <?php if(isset($_POST['approvalFilter']) && $_POST['approvalFilter'] == '1') echo 'selected="selected"'; ?>>Approved</option>
                        <option value="0" <?php if(isset($_POST['approvalFilter']) && $_POST['approvalFilter'] == '0') echo 'selected="selected"'; ?>>Pending or Suspend</option>
					</select>
					</div>


                    <div class="col-md-12">
				    	<button type="submit" class="btn btn-primary">Filter</button>
					</div>
					
				</div>
					</form>



			  
			   <br><br>
               <table id="fillingstation" class="display nowrap" style="width:100%" >
			   
                  <thead class="thead-dark">
                     <tr>
                        <th>#</th>
                        <th>Fillingstation Name</th>
						<th>Fillingstation Address</th>
						<th>Number Despencers</th>
						<th>Capacity Petrol Tank</th>
						<th>Capacity Diesel Tank</th>
						<th>Capacity Super Petrol Tank</th>
						<th>Capacity Super Diesel Tank</th>
						<th>District</th>
						
						<th>Isapproved</th>
						<th>Approvedby</th>
						
                     </tr>
                  </thead>
                  <tbody>
						<?php $i=1; foreach($fillingstation as $row) {?>
						<tr>
							<td><?=$i++?></td>
                            <td><?=$row->fillingstation_name;?></td>
							<td><?=$row->fillingstation_address;?></td>
							<td><?=$row->numberoffueldespencers;?></td>
							<td><?=$row->capacityofpetroltank;?></td>
							<td><?=$row->capacityofdieseltank;?></td>
							<td><?=$row->capacityofsuperpetrol;?></td>
							<td><?=$row->capacityofsuperdiesel;?></td>
							<td><?=$row->district;?></td>
							<td>
								<?php if($row->isapproved == 1): ?>
									<span class="badge bg-label-success">Approved</span>
						    	<?php else: ?>
								<span class="badge bg-label-danger">Pending or Suspend</span>
								<?php endif; ?>	
							</td>
							<td><?=$row->approvedby;?></td>

							
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
   new DataTable('#fillingstation', {
        scrollX: true,
        scrollY: 350,
		dom: 'Bfrtip',
		lengthChange: false,
        buttons: 
		[ 
			{
                extend: 'print',
                title: 'Filling stations details report',
				
            },
            {
                extend: 'excel',
                filename: 'Filling stations details report',
				title: 'Filling stations details report',
            },
            {
                extend: 'pdf',
                filename: 'Filling stations details report',
				title: 'Filling stations details report',
            },
            {
                extend: 'colvis',
                filename: 'Filling stations details report',
            }

		],
					
    });
   
   
</script>