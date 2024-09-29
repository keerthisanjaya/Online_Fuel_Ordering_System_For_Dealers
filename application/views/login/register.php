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
    <!-- Content -->
    
    <!-- error message start -->
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
	<!-- error message end -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                    
                  </span>
                  
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">REGISTER</h4>
              <p class="mb-4"></p>

              <form id="formAuthentication" class="mb-3" action="<?php echo base_url('register/add'); ?>" method="POST">
                <div class="mb-3 row">
                  <label for="firstname" class="form-label">First Name<span class="text-danger">*</span</label>
                  <input
                    type="text"
                    class="form-control"
                    id="firstname"
                    name="firstname"
                    placeholder="Enter your first name"
                    autofocus required/>
                </div>


                <div class="mb-3 row">
                  <label for="lastname" class="form-label">Last Name<span class="text-danger">*</span</label>
                  <input
                    type="text"
                    class="form-control"
                    id="lastname"
                    name="lastname"
                    placeholder="Enter your last name" required
                    />
                </div>

                <div class="mb-3 row">
                  <label for="nic" class="form-label">NIC<span class="text-danger">*</span</label>
                  <input
                    type="text"
                    class="form-control"
                    id="nic"
                    name="nic"
                    placeholder="NIC" required
                    />
                </div>

                <div class="mb-3 row">
                  <label for="phonenumber" class="form-label">Phone number<span class="text-danger">*</span</label>
                  <small id="phonenumberHelp" class="form-text text-muted">(Entering format 94 xx xxx xxxx)</small>
                  <input
                    type="text"
                    class="form-control"
                    id="phonenumber"
                    name="phonenumber"
                    placeholder="Enter 94 xx xxx xxxx" required
                    />
                </div>

                <div class="mb-3 row">
                  <label for="email" class="form-label">Email<span class="text-danger">*</span</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" />
                </div>

                <div class="mb-3 form-password-toggle row">
                  <label class="form-label" for="password">Password<span class="text-danger">*</span</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password" required/>
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>

                 <div class="mb-3">
                  <input type="checkbox" id="dealer" name="dealer" value="1">
                  <label for="dealer"> Register me as a Dealer</label><br>
                  <small id="dealerhelp" class="form-text text-muted">(IF YOU ARE A DEALER/SHED OWNER SELECT THIS)</small>
                </div>                

                
                <button class="btn btn-primary d-grid w-100">Sign up</button>
              </form>

              <p class="text-center">
                <span>Already have an account?</span>
                <a href="<?php echo base_url("/"); ?>">
                  <span>Sign in instead</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="<?php echo base_url(); ?>assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/libs/popper/popper.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>