<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-wide customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?php echo base_url(); ?>assets/"
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Register Basic - Pages | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/css/pages/page-auth.css" />

    <!-- Helpers -->
    <script src="<?php echo base_url(); ?>assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?php echo base_url(); ?>assets/js/config.js"></script>
  </head>


<body>

<?php
    $hash = strtoupper(
        md5(
            1225314 . 
            $invdata['invoicenum'] . 
            number_format($invdata['amount'], 2, '.', '') . 
            "LKR" .  
            strtoupper(md5('MjYxNjYwNzg1MzMwMjgzNTk1NjQxMjIzODMwNDg1MzE2NDg3MzM5Nw==')) 
        ) 
    );
?>

<div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
			<h1 class="mb-2">Check Out Items</h1>
              <p class="mb-4"></p>
				
		<form id="formAuthentication" class="mb-3" method="post" action="https://sandbox.payhere.lk/pay/checkout">  
         
			<input type="hidden" name="merchant_id" value="1225314">    <!-- Replace your Merchant ID -->
			<input type="hidden" name="return_url" value="http://fuelorderdashboard.xyz/return">
			<input type="hidden" name="cancel_url" value="http://fuelorderdashboard.xyz/dashboard">
			<input type="hidden" name="notify_url" value="http://fuelorderdashboard.xyz/notify">  
        
            </br></br><h3 class="mb-2"> Items Details</h3>
              <p class="mb-4"></p></br>
			
				<div class="mb-3">
                  <label for="order_id" class="form-label">Order ID:</label>
                  <input type="text" class="form-control" id="order_id" name="order_id" value="<?php echo $invdata['invoicenum']; ?>" readonly>
                </div>
				
				<div class="mb-3">
                  <label for="items" class="form-label">Items :</label>
                  <input type="text" class="form-control" id="items" name="items" value="All Items" readonly>
                </div>
				<div class="mb-3">
                  <label for="currency" class="form-label">Currency:</label>
                  <input type="text" class="form-control" id="currency" name="currency" value="LKR" readonly>
                </div>
				<div class="mb-3">
                  <label for="amount" class="form-label">Amount :</label>
                  <input type="text" class="form-control" id="amount" name="amount" value="<?php echo $invdata['amount']; ?>" readonly>
                </div>
            
                     
                
        
        </br></br><h3 class="mb-2">Customer Details</h3>
              <p class="mb-4"></p></br>
        
				<div class="mb-3">
                  <label for="first_name" class="form-label">First Name:</label>
                  <input type="text" class="form-control" id="first_name" name="first_name" value=" " >
                </div>
				
				<div class="mb-3">
                  <label for="last_name" class="form-label">Last Name:</label>
                  <input type="text" class="form-control" id="last_name" name="last_name" value=" " >
                </div>
				
				<div class="mb-3">
                  <label for="email" class="form-label">Email:</label>
                  <input type="text" class="form-control" id="email" name="email" value="<?php echo $this->session->userdata('email'); ?>" readonly>
                </div>
				
				<div class="mb-3">
                  <label for="phone" class="form-label">Phone:</label>
                  <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $this->session->userdata('phone'); ?>" readonly >
                </div>
				
				<div class="mb-3">
                  <label for="address" class="form-label">Address:</label>
                  <input type="text" class="form-control" id="address" name="address" value="" >
                </div>
				
				<div class="mb-3">
                  <label for="city" class="form-label">City:</label>
                  <input type="text" class="form-control" id="city" name="city" value="" >
                </div>
				
            
            
            <input type="hidden" name="country" value="Sri Lanka">
            <input type="hidden" name="hash" value="<?php echo $hash; ?>"> <!-- Replace with generated hash -->
            
            <button class="btn btn-primary d-grid w-100" type="submit">Buy Now</button>
        </form>
				
			
			
			</div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>
     


        
         
    
    
   
  </body>
</html>





 