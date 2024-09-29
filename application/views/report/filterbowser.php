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
		
	];
	
?>

<div class="container-xxl flex-grow-1 container-p-y">
   <!-- Examples -->
   <div class="row mb-5">
      <div class="col-md-12 mb-3">
         <div class="card h-100">
            <div class="card-body">
					
               <h5 class="card-title">Bowser wise delivery Report</h5>
			   <div class="row">
			   <div class="col-md-4 mb-3">
					<form action="<?php echo site_url('report/bowserwise'); ?>" method="post">



					<div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="bowser" class="form-label"> Vehicle: <span
                                class="text-danger">*</span> </label>
                        <select id="bowser" name="bowser" class="form-select" required>
                            <?php foreach($vehicle as $data){ ?>
                               <option value="<?php echo $data->idvehicle; ?>" <?php if (isset($_POST['bowser']) && $_POST['bowser'] == $data->idvehicle) echo 'selected="selected"'; ?>>
                                    <?php echo $data->vehicle_number; ?>
                                </option>
                               
                            <?php } ?>
                        </select>
                    </div>
                </div>
                    
                    <!--<div class="col-md-4 mb-3">
					<label for="approvalFilter" class="form-label">Filter by Approval:</label>
					<select id="approvalFilter" name= "approvalFilter" class="form-select" >
						<option value="All" <?php if(isset($_POST['approvalFilter']) && $_POST['approvalFilter'] == 'All') echo 'selected="selected"'; ?>>All</option>
                        <option value="1" <?php if(isset($_POST['approvalFilter']) && $_POST['approvalFilter'] == '1') echo 'selected="selected"'; ?>>Approved</option>
                        <option value="0" <?php if(isset($_POST['approvalFilter']) && $_POST['approvalFilter'] == '0') echo 'selected="selected"'; ?>>Pending or Suspend</option>
					</select>
					</div>-->


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
                        <th>Date</th>
                        <th>Vehicle Number</th>
						<th>Invoice Number</th>
						<th>Material</th>
						<th>Seal Number</th>
						<th>Amount</th>
						<th>fillingstation address</th>
						
						
                     </tr>
                  </thead>
                  <tbody>
						<?php $i=1; foreach($orders as $row) {?>
						<tr>
							<td><?=$i++?></td>
                            <td><?=$row->orderdate;?></td>
                            <td><?=$row->vehicle_number;?></td>
							<td><?=$row->invoicenum;?></td>
							<td><?=$row->itemname;?></td>
							<td><?=$row->sealnumber;?></td>
							<td><?=$row->amount;?></td>
							<td><?=$row->fillingstation_name;?></td>
							

							
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