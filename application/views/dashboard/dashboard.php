
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
        
        <br>

<div class="container">
    <div class="row">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-sm-7">
          <div class="card-body">
            <h5 class="card-title text-primary">Welcome <?php echo $this->session->userdata('username'); ?>! 🎉</h5>
             <?php
                 $userrole = $this->session->userdata('userrole');
                ?>    
                <?php 
                     if($userrole == 666){
                ?>     
            <p class="mb-4">
				<?php
					if (empty($fillingstationspending)) {
						echo "Your filling station is already approved by admin.";
					} else {
						echo "Your filling station, ";
						foreach ($fillingstationspending as $fillingstationunapproved) {
							echo $fillingstationunapproved->fillingstation_name . "\t";
						}
						echo " will be approved by admin.";
					}
					?>
					
			
			</p>
			<?php
        }
    ?>

          </div>
        </div>
        <div class="col-sm-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
            <img src="<?php echo base_url('/assets/img/illustrations/man-with-laptop-light.png');?>" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
          </div>
        </div>
      </div>
    </div>
    </div>
</div> 

<?php
    $userrole = $this->session->userdata('userrole');
?>       
		 
<div class="container-xxl flex-grow-1 container-p-y">
<div class="row mb-5">
    <?php 
        if($userrole == 666){
    ?>        
    <div class="col-md-6 col-lg-4">
        <div class="card mb-3">
        <div class="card-body">
            <div class="badge bg-label-warning p-3 rounded mb-3">
              <i class="bx bx-git-repo-forked fs-3"></i>
            </div>
            <h5 class="card-title">Register Fuel station</h5>
            <p class="card-text">Welcome to the Fuel Station Registration portal!</p>
            <a href="<?php echo base_url('fillingstation/insert'); ?>" class="btn btn-primary">Start Now</a>
            <a href="<?php echo base_url('fuelstation/documents'); ?>" class="btn btn-primary">Documents</a>
        </div>
        </div>
    </div>
    <?php
        }
    ?>


    <?php 
        if($userrole == 777){
    ?>  
    <div class="col-md-6 col-lg-4">
        <div class="card mb-3">
        <div class="card-body">
            <div class="badge bg-label-warning p-3 rounded mb-3">
              <i class="bx bx-git-repo-forked fs-3"></i>
            </div>
            <h5 class="card-title">Approve Fuel station</h5>
            <p class="card-text">Welcome to the Fuel Station Approval portal!</p>
            <a href="<?php echo base_url('fuelstations/list/unapproved'); ?>" class="btn btn-primary">Start Now</a>
        </div>
        </div>
    </div>
    <?php
        }
    ?>

    <?php 
        if($userrole == 777){
    ?>  
    <div class="col-md-6 col-lg-4">
        <div class="card mb-3">
        <div class="card-body">
            <div class="badge bg-label-warning p-3 rounded mb-3">
              <i class="bx bx-git-repo-forked fs-3"></i>
            </div>
            <h5 class="card-title">Approve Employees</h5>
            <p class="card-text">Approve employees</p>
            <a href="<?php echo base_url('/employee/register'); ?>" class="btn btn-primary">Start Now</a>
        </div>
        </div>
    </div>
    <?php
        }
    ?>

    <?php 
        if($userrole == 666){
    ?>    
    <div class="col-md-6 col-lg-4">
        <div class="card mb-3">
        <div class="card-body">
            <div class="badge bg-label-warning p-3 rounded mb-3">
              <i class="bx bx-git-repo-forked fs-3"></i>
            </div>
        <h5 class="card-title">Mark Daily Dip</h5>
            <p class="card-text">Mark Daily Dip Values Petrol Deisel Super Petrol Deisel</p>
            <a href="<?php echo base_url('dailydip/markdip/'.$this->session->user_id); ?>" class="btn btn-primary">Start Now</a>
        </div>
        </div>
    </div>
    <?php 
        }
    ?>

    <?php 
        if($userrole == 666){
    ?>   
    <div class="col-md-6 col-lg-4">
        <div class="card mb-3">
        <div class="card-body">
        <h5 class="card-title">Place A Order</h5>
            <p class="card-text">Place a order for your filling station</p>
            <form action="<?php echo base_url('fuelorders/placeorder/'); ?>" method="get">
            <div class="form-group mb-3">
                <label for="fillingstation_idfillingstation" class="form-label">Filling station: <span class="text-danger">*</span></label>
                <select id="fillingstation_idfillingstation" name="fillingstation_idfillingstation"
                    class="form-select" required>
                    <?php foreach($fillingstationspending2 as $data){ ?>
                        <option value="<?php echo $data->idfillingstation; ?>"><?php echo $data->fillingstation_name; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Order</button>
            </div>
            </form>
        </div>
        </div>
    </div>
    <?php
        }
    ?>

    <?php 
        if($userrole == 777){
    ?>   
    <div class="col-md-6 col-lg-4">
        <div class="card mb-3">
        <div class="card-body">
            <div class="badge bg-label-warning p-3 rounded mb-3">
              <i class="bx bx-git-repo-forked fs-3"></i>
            </div>
        <h5 class="card-title">Register a Vehicle</h5>
            <p class="card-text">Register a Vehicle in System</p>
            <a href="<?php echo base_url('vehicle/register'); ?>" class="btn btn-primary">Start Now</a>
        </div>
        </div>
    </div>
    <?php 
        }
    ?>

    <?php 
        if($userrole == 777){
    ?>   
    <div class="col-md-6 col-lg-4">
        <div class="card mb-3">
        <div class="card-body">
        <h5 class="card-title">Submit Vehicle Certifications</h5>
            <p class="card-text">submit vehicle certification</p>
            <a href="<?php echo base_url('vehiclecalibrationcertificate/insert'); ?>" class="btn btn-primary">calibration</a>
             
            <a href="<?php echo base_url('vehicle/certificate/revenuelicesen'); ?>" class="btn btn-primary">revenue licesen</a>
        </div>
        </div>
    </div>
    <?php 
        }
    ?>

    <?php 
        if($userrole == 777){
    ?>   
    <div class="col-md-6 col-lg-4">
        <div class="card mb-3">
        <div class="card-body">
        <h5 class="card-title">View Order Table</h5>
            <p class="card-text">Confirm the order payment received</p>
            <a href="<?php echo base_url('orders/table'); ?>" class="btn btn-primary">Open Table</a>
        </div>
        </div>
    </div>
    <?php 
        }
    ?>

    <?php 
        if($userrole == 5 || $userrole == 777){
    ?>  
    <div class="col-md-6 col-lg-4">
        <div class="card mb-3">
        <div class="card-body">
        <h5 class="card-title">Gate Exit</h5>
            <p class="card-text">Check Gates</p>
            <a href="<?php echo base_url('security/gate'); ?>" class="btn btn-primary">Open Gates</a>
        </div>
        </div>
    </div>
    <?php 
        }
    ?>


    <?php 
        if($userrole == 777){
    ?>  
    <div class="col-md-6 col-lg-4">
        <div class="card mb-3">
        <div class="card-body">
        <h5 class="card-title">Order Item Table</h5>
            <p class="card-text">Orer item status</p>
            <a href="<?php echo base_url('order/showtable'); ?>" class="btn btn-primary">Open</a>
        </div>
        </div>
    </div>
    <?php 
        }
    ?>

    <?php 
        if($userrole == 666){
    ?>  
     <div class="col-md-6 col-lg-4">
        <div class="card mb-3">
        <div class="card-body">
        <h5 class="card-title">Your requested Order Status</h5>
            <p class="card-text">Customer Order Status</p>
            <a href="<?php echo base_url('fillingstation/customers'); ?>" class="btn btn-primary">Check</a>
        </div>
        </div>
    </div>
    <?php 
        }
    ?>


    <?php 
        if($userrole == 3 || $userrole == 777){
    ?> 

    <div class="col-md-6 col-lg-4">
        <div class="card mb-3">
        <div class="card-body">
        <h5 class="card-title">Gantry order confirm</h5>
            <p class="card-text">Gantry operator tasks</p>
            <a href="<?php echo base_url('gantry/gantrydashboard'); ?>" class="btn btn-primary">Open</a>
        </div>
        </div>
    </div>
    <?php 
        }
    ?>
    
    
    <?php 
        if($userrole == 666){
    ?> 
        
        <div class="col-md-6 col-lg-4">
        <div class="card mb-3">
        <div class="card-body">
        <h5 class="card-title">Tank capacity Status</h5>
            <p class="card-text">Check your tank capacity</p>
            <a href="<?php echo base_url('index.php/dailydip/reorder'); ?>" class="btn btn-primary">Find</a>
        </div>
        </div>
    </div>
    
    <?php
        }
        ?>
    
    
	
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row mb-5">
	  
	  
	  <!--<div class="col-md-6 col-lg-4">
         <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">Product wise Orders Summary</h5>
          
			   
               <canvas id="barChart"></canvas>
			  
            </div>
         </div>
      </div>-->
	  
		<?php 
         if($userrole == 777){
         ?> 
	  <div class="col-md-6 col-lg-4">
         <div class="card mb-3 ">
            <div class="card-body ">
              <h5 class="card-title">Employee Gender wise Distribution</h5>
          
			   
               <canvas id="employeegenderChart" width="40" height="40"  ></canvas>
            </div>
         </div>
      </div>
      <?php
         }
         ?>
	  
	  <?php 
         if($userrole == 777){
         ?> 
	  <div class="col-md-6 col-lg-4">
         <div class="card mb-3 ">
            <div class="card-body">
              <h5 class="card-title">Employee Grade wise Distribution</h5>
                
			   
               <canvas id="employeegradeChart" ></canvas>
            </div>
         </div>
      </div>
       <?php
         }
         ?>
     
     	<div class="col-md-6 col-lg-4">
            <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">District wise Filling Stations</h5>
          
               <canvas id="pieChart"  ></canvas>
            </div>
         </div>
      </div>
      
       <?php 
         if($userrole == 777){
         ?> 
      
      <div class="col-md-6 col-lg-4">
	    <div class="row">
         <div class="card h-100">
            <div class="card-body">
              <h5 class="card-title">Orders Statistics</h5>
              <canvas id="myChart" width="400" height="400"></canvas>
			   
            </div>
         </div>
		 </div>
      </div>
      <?php
         }
         ?>
	  
	  
	  
	
	
	
        </div>
    </div>
    </div>
</div>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
 <script>
        var districtData = <?php echo json_encode($districtpie); ?>;

        var labels = [];
        var counts = [];

        // Extracting labels and counts
        for (var i = 0; i < districtData.length; i++) {
            labels.push(districtData[i].district);
            counts.push(districtData[i]['district-count']);
        }

        var ctx = document.getElementById('pieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'District Counts',
                    data: counts,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>

 <script>
        var orderData = <?php echo json_encode($orders); ?>;

        var dates = Object.keys(orderData);
        var productLabels = Object.keys(orderData[dates[0]]);
        var datasets = [];

        // Prepare datasets for each product
        productLabels.forEach(function(productLabel) {
            var productData = [];
            dates.forEach(function(date) {
                productData.push(orderData[date][productLabel]);
            });

            datasets.push({
                label: productLabel,
                data: productData,
                backgroundColor: getRandomColor(), // You can define your own function to generate colors
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            });
        });

        var ctx = document.getElementById('barChart').getContext('2d');
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: dates,
                datasets: datasets
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        stacked: true
                    },
                    y: {
                        stacked: true
                    }
                }
            }
        });

        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
    </script>
	
	<script>
        var orderData = <?php echo json_encode($orders); ?>;

        var dates = Object.keys(orderData);
        var productLabels = Object.keys(orderData[dates[0]]);
        var datasets = [];

        // Prepare datasets for each product
        productLabels.forEach(function(productLabel) {
            var productData = [];
            dates.forEach(function(date) {
                productData.push(orderData[date][productLabel]);
            });

            datasets.push({
                label: productLabel,
                data: productData,
                backgroundColor: getRandomColor(), // You can define your own function to generate colors
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            });
        });

        var ctx = document.getElementById('barChart1').getContext('2d');
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: dates,
                datasets: datasets
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        stacked: true
                    },
                    y: {
                        stacked: true
                    }
                }
            }
        });

        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
    </script>
	
		
<script>
         var employeeData = <?php echo json_encode($genderwisepiechart); ?>;
		  
		 function getGenderLabel(genderValue) {
				return genderValue == 0 ? "FeMale" : "Male";
		}

        var labels = [];
        var counts = [];

        // Extracting labels and counts
        for (var i = 0; i < employeeData.length; i++) {
             var genderLabel = getGenderLabel(employeeData[i].gender);
				labels.push(genderLabel);
				counts.push(employeeData[i]['gender_count']);
        }
		console.log(labels);

        var ctx = document.getElementById('employeegenderChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Gender Counts',
                    data: counts,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });
</script>

<script>
         var employeegradeData = <?php echo json_encode($gradewisepiechart); ?>;
		  
		 

        var labels = [];
        var counts = [];

        // Extracting labels and counts
        for (var i = 0; i < employeegradeData.length; i++) {
				labels.push(employeegradeData[i].grade);
				counts.push(employeegradeData[i]['grade_count']);
        }

        var ctx = document.getElementById('employeegradeChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Grade Counts',
                    data: counts,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });
</script>

<script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var ordersData = <?php echo json_encode($orders_data); ?>;
        
        var dates = [];
        var amounts = [];

        ordersData.forEach(function(item) {
            dates.push(item.order_date);
            amounts.push(item.total_amount);
        });

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Total Amount Received',
                    data: amounts,
                    backgroundColor: 'rgba(255, 159, 64, 0.2)',
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
				barPercentage: 0.9, // Percentage of the available width each bar should be
				categoryPercentage: .8, // Percentage of the x-axis range to use for bars
            }
        });
    </script>
