<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin Panel</title>
  <link href="<?php echo base_url(); ?>asset/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>asset/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>asset/admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <link href="<?php echo base_url(); ?>asset/admin/css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Admin Panel <i class="fa fa-align-center" aria-hidden="true"></i></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="<?php echo site_url('Admin/home'); ?>">
            <i class="fa fa-home"></i>
            <span class="nav-link-text">Home</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables" <?php if($param['level_user'] !='root'){echo 'hidden';} ?>>
          <a class="nav-link" href="<?php echo site_url('Admin/user_acount'); ?>" >
            <i class="fa fa-users"></i>
            <span class="nav-link-text">Kelola User</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-check-square-o"></i>
            <span class="nav-link-text">Data stunting</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="<?php echo site_url('Admin/list_stunting'); ?>">List Data</a>
            </li>
            <li>
              <a href="<?php echo site_url('Admin/stunting'); ?>">Add Data</a>
            </li>
          </ul>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="<?php echo site_url('Admin/media'); ?>">
            <i class="fa fa-fw fa-globe"></i>
            <span class="nav-link-text">Pengaturan web</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="<?php echo site_url('gis'); ?>">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Tampil Data</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">Menu seting</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo site_url('Admin/user_setting'); ?>">
			Kelola Profil
             <i class="fa fa-cogs" aria-hidden="true"></i>
            </a>
  
           
          </div>
        </li>
		 <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('admin/logout'); ?>">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
        <li class="nav-item dropdown">

        </li>
       <div class="col-md-1"></div>
       
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Home</a>
        </li>
        <li class="breadcrumb-item active">Stunting</li>
      </ol>
      <!-- Area Chart Example-->
      <div class="row">
                <div class="col-sm-10 offset-1">
                  <div class="card border-2 mb-2">
                    <div class="card-body">
                      <h5 class="mb-2">Masukkan Data Stunting</h5>
                      <form method="post" action="<?php echo site_url('Admin/insert_stunting'); ?>">
                       <div class="row mb-3">
                          <div class="col">
                            <label>Kecamatan</label>
                            <select name="kec" class="custom-select form-control-sm" required>
                            <?php foreach ($kec as $row) { ?>
                             <option value="<?php echo $row->id_kecamatan; ?>"><?php echo $row->nama_kecamatan; ?></option>
                          <?php   }  ?>
                             
                           </select>
                          </div>
                          <div class="col">
                            <label>Puskesmas</label>
                            <input type="text" class="form-control form-control-sm" name="puskesmas" value="" required autofocus>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col">
                            <label>Jumlah Balita Laki-laki</label>
                           <input type="number" class="form-control form-control-sm" name="j_bl" value="" required autofocus>
                          </div>
                          <div class="col">
                            <label>Jumlah Balita Perempuan</label>
                            <input type="number" class="form-control form-control-sm" name="j_bp" required autofocus>
                          </div>
                        </div>
                        <div class="row mb-4">
                          <div class="col">
                            <label>Jumlah Balita Laki-laki di ukur</label>
                            <input type="number" class="form-control form-control-sm" name="j_blu" required autofocus>
                          </div>
                          <div class="col">
                            <label>Jumlah Balita Perempuan di ukur</label>
                            <input type="number" class="form-control form-control-sm" name="j_bpu" required autofocus>
                          </div>
                        </div>
                        <div class="row mb-3">
                         <div class="col">
                            <label>Jumlah Balita Stunted laki</label>
                            <input type="number" class="form-control form-control-sm" name="j_bsl" required autofocus>
                          </div>
                          <div class="col">
                            <label>Jumlah Balita Stunted Perempuan</label>
                            <input type="number" class="form-control form-control-sm" name="j_bsp" required autofocus>
                          </div>
                        </div>
                        <div class="row mb-4">
                         
                         <div class="col">
                            <label>Tahun</label>
                            <select name="tahun" class="custom-select form-control-sm" required>
                             <option value="2016">2016</option>
                             <option value="2017">2017</option>
                             <option value="2018">2018</option>
                             <option value="2019">2019</option>
                           </select>
                          </div>
                        </div>
                       
                        <div class="row">
                          <div class="col-3">
                            <button type="submit" class="btn btn-sm btn-primary btn-block">Tambah Data </button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

      <!-- Example DataTables Card-->

    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright ©  2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(); ?>asset/admin/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>asset/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url(); ?>asset/admin/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>asset/admin/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="<?php echo base_url(); ?>asset/admin/js/sb-admin-datatables.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
