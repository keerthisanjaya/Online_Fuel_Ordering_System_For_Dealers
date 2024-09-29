<div class="container-xxl flex-grow-1 container-p-y">
   <!-- Examples -->
   <div class="row mb-5">
      <div class="col-md-12 mb-3">
         <div class="card h-100">
            <div class="card-body">
					
               <h5 class="card-title">User Order Items Report</h5>
			   <div class="row">
			   <div class="col-md-4 mb-3">
					<form action="<?php echo site_url('orders/userorderItems'); ?>" method="post">
						<label for="start_date" class="form-label">Start Date:</label>
						<input type="date" id="start_date" name="start_date" class="form-control" value="<?php echo isset($_POST['start_date']) ? $_POST['start_date'] : ''; ?>">
						</div>
						
						<div class="col-md-4 mb-3">
						<label for="end_date"class="form-label">End Date:</label>
						<input type="date" id="end_date" name="end_date" class="form-control" value="<?php echo isset($_POST['end_date']) ? $_POST['end_date'] : ''; ?>">
						</div>
						
						<div class="col-md-4 mb-3">
						<label for="item_name" class="form-label">Item Name:</label>
						<select id="item_name" name="item_name" class="form-control">
							<option value="All">All Items</option>
							<option value="petrol" <?php echo (isset($_POST['item_name']) && $_POST['item_name'] == 'petrol') ? 'selected' : ''; ?>>Petrol</option>
							<option value="deisel" <?php echo (isset($_POST['item_name']) && $_POST['item_name'] == 'deisel') ? 'selected' : ''; ?>>Diesel</option>
							<option value="superpetrol" <?php echo (isset($_POST['item_name']) && $_POST['item_name'] == 'superpetrol') ? 'selected' : ''; ?>>Super Petrol</option>
							<option value="superdiesel" <?php echo (isset($_POST['item_name']) && $_POST['item_name'] == 'superdiesel') ? 'selected' : ''; ?>>Super Diesel</option>
						</select>
						 </div>
						 
						 <div class="col-md-4 mb-3">
                            <label for="fillingstaion_name" class="form-label">Filling station: <span class="text-danger">*</span></label>
                            <select id="fillingstaion_name" name="fillingstaion_name"
                                class="form-select" required>
                                <?php foreach($fillingstation as $data){ ?>
                                    <option value="<?php echo $data->fillingstation_name; ?>"><?php echo $data->fillingstation_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
						 
						  <div class="col-md-12">
							<button type="submit" class="btn btn-primary">Filter</button>
							</div>
					</form>



			  
			   <br><br>
               <table id="orderitem" class="display nowrap" style="width:100%" >
			   
                  <thead class="thead-dark">
                     <tr>
                        <th>#</th>
						<th>Date</th>
						<th>Invoice Number</th>
						<th>Fillingstation Name</th>
                        <th>Item name</th>
						<th>Total quantity</th>
						<th>Amount</th>
						
                     </tr>
                  </thead>
				
				  
                  <tbody>
						<?php $i=1; foreach($order_items  as $row) {?>
						<tr>
							<td><?=$i++?></td>
							<td><?=$row->order_date?></td>
							<td><?=$row->invoicenum;?></td>
							<td><?=$row->fillingstation_name;?></td>
                            <td><?=$row->itemname;?></td>
							<td><?=$row->total_qty;?></td>
							<td><?=$row->itemamount;?></td>
							

							
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
   new DataTable('#orderitem', {
        scrollX: true,
        scrollY: 350,
		dom: 'Bfrtip',
		lengthChange: false,
        buttons: 
		[ 
			{
                extend: 'print',
                title: 'Date Wise user order quantity',
				
            },
            {
                extend: 'excel',
                filename: 'Date Wise user order quantity',
				title: 'Date Wise user order quantity',
            },
            {
                extend: 'pdf',
                filename: 'Date Wise user order quantity',
				title: 'Date Wise user order quantity',
            },
            {
                extend: 'colvis',
                filename: 'Date Wise user order quantity',
            }

		],
					
    });
   
   
</script>