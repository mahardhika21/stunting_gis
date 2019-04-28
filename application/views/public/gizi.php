<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GIS Stunting</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/public/css/theme.css" type="text/css"> </head>

<body class="bg-light">
  <nav class="navbar navbar-expand-md bg-primary navbar-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <i class="fa pull-left fa-fw fa-map-marker fa-2x"></i>
        <b class="text-warning font-weight-bold"> Info Stunting </b>
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav list-unstyled bg-secondary font-weight-bold">
          <ul class="navbar-nav list-unstyled bg-secondary font-weight-bold">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('gis/index'); ?>"><i class="fa fa-home"></i> Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
           <li class="nav-item active">
            <a class="nav-link" href="<?php echo site_url('gis/gizi'); ?>"><i class="fa fa-medkit"></i> Gizi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('gis/map'); ?>"><i class="fa fa-map"></i> Map</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('gis/grafik'); ?>"><i class="fa fa-pie-chart"></i> Grafik</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('gis/login'); ?>"><i class="fa fa-user"></i> Login User</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="py-5">
    <div class="container">
      <div class="row m-2">
        <div class="col-md-12">
			<div class="card mt-4 p-4" style="">
				  <div class="card-body">
					<h5 class="card-title text-center">Deskripsi Aplikasi</h5>
					<p class="card-text"><?php echo $gizi['gizi']; ?></p>

					<div class="d-flex flex-row-reverse">
					 
				   </div>
				  </div>
</div>
        </div>
      </div>
    </div>
</div>
  <div class="py-0 bg-dark text-white <?php if(strlen($gizi['gizi']) <= 1600){ echo 'fixed-bottom';} ?>">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-3 text-center">
          <p>© Copyright 2018 All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
</body>

</html>