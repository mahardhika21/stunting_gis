<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login User</title>
  <link href="<?php echo base_url(); ?>asset/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>asset/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>asset/admin/css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
<?php
 if($status== 'galat'){ $alert ="danger";}elseif($status == "ok"){ $alert ="success";}else{ $alert="";}?>
  <div class="container">
	<div class="col-md-4 offset-4 mt-5 ">
	<div class="card alert-<?php echo $alert; ?>  text-center"  <?php if($msg ==''){ echo 'hidden'; } ?> >
		<div class="card-body">
		<?php echo $msg; ?> 
		</div>
	</div>
	</div>
    <div class="card card-login mx-auto mt-5">
      <div class="card-header text-center">Login Admin</div>
      <div class="card-body">
        <form action="<?php echo site_url('Admin/login'); ?>" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input class="form-control"  type="text"  placeholder="Username" name="username" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" type="password" placeholder="Password" name="password" required>
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit">Login</button>
        </form>
      </div>
    </div>
  </div>
  <script src="<?php echo base_url(); ?>asset/admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>asset/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>asset/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
