<?php include("../config/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $GLOBALS['sitename']; ?> Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo $GLOBALS['admin_webroot']; ?>vendors/feather/feather.css">
  <link rel="stylesheet" href="<?php echo $GLOBALS['admin_webroot']; ?>vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo $GLOBALS['admin_webroot']; ?>vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo $GLOBALS['admin_webroot']; ?>css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo $GLOBALS['admin_webroot']; ?>images/favicon.png" />
</head>

<body class="sidebar-dark">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="<?php echo $GLOBALS['admin_webroot']; ?>images/<?php echo $GLOBALS['site_logo']; ?>" alt="logo">
              </div>
              <h4>Welcome back!</h4>
              <h6 class="font-weight-light">Sign in to your account</h6>
              <?php if($_REQUEST['login']=='failure') { 
						echo '<div class="alert alert-danger">Invalid username and password.</div>';
				} ?>
              <form action="<?php echo $GLOBALS['admin_webroot']?>actions.php?type=login" method="post" class="pt-3">
                <div class="form-group">
                  <label for="exampleInputEmail">Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-user text-primary"></i>
                      </span>
                    </div>
                    <input type="text" name="username" class="form-control form-control-lg border-left-0" id="exampleInputEmail" placeholder="Username" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-lock text-primary"></i>
                      </span>
                    </div>
                    <input type="password" name="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password" required="required">                        
                  </div>
                </div>                
                <div class="my-3">                  
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Sign In</button>
                </div>                                
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; <?php echo date("Y"); ?> All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo $GLOBALS['admin_webroot']; ?>vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?php echo $GLOBALS['admin_webroot']; ?>js/off-canvas.js"></script>
  <script src="<?php echo $GLOBALS['admin_webroot']; ?>js/hoverable-collapse.js"></script>
  <script src="<?php echo $GLOBALS['admin_webroot']; ?>js/template.js"></script>
  <script src="<?php echo $GLOBALS['admin_webroot']; ?>js/settings.js"></script>
  <script src="<?php echo $GLOBALS['admin_webroot']; ?>js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>