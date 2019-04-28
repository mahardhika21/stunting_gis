<!DOCTYPE html>
<html>

<head>
<title>Grafik</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/public/css/theme.css" type="text/css"> 
    
   </head>


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
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('gis/index'); ?>"><i class="fa fa-home"></i> Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('gis/Gizi'); ?>"><i class="fa fa-medkit"></i> Gizi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('gis/map'); ?>"><i class="fa fa-map"></i> Map</a>
          </li>
          <li class="nav-item active">
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
       <div class="col-md-10 offset-1"  <?php if($param != 0){ echo 'hidden'; }?>>
      <div class="card" >
         <div class="card-body text-center">
          
            <div class="alert alert-danger " role="alert">
                Data Yang anda inginkan tidak tersedia atau belum lengkap....!
              </div>
            <a href="#" class="btn btn-primary">Refresh</a>
       </div>
     </div>
     </div>

     <div class="col-md-10 offset-1"  <?php if($tahun != 1){ echo 'hidden'; }?>>
      <div class="card" >
         <div class="card-body text-center">
          
            <div class="alert alert-danger " role="alert">
                SIlakan masukana tahun untuk melihat data stunting
              </div>
               <form method="" action="<?php echo site_url('Gis/grafik'); ?>">
       <div class="form-row">
          <div class="col-sm-4 offset-sm-4">
          <select class="form-control form-control-sm tahun" name="tahun" id="tahun">
          <option>Pilihan</option>
          <?php foreach ($year as $val) { ?>
          <option value="<?php echo $val->tahun; ?>"><?php echo $val->tahun; ?></option>
          <?php } ?>
          </select>
          </div>
      </div>
    </form>
            
       </div>
     </div>
     </div>
      <?php // echo '<pre>'.print_r($param, true) .'</pre>'; ?>
        <div class="col-md-10 offset-1" <?php if($param == 0){ echo 'hidden'; }?> <?php if($tahun == 1){ echo 'hidden'; }?>>
        <div class="bg-white col-4 offset-4">
      <form method="" action="<?php echo site_url('Gis/grafik'); ?>">
       <div class="form-row">
          <div class="col">
          <select class="form-control form-control-sm tahun" name="tahun" id="tahun">
          <option>Pilihan</option>
          <?php foreach ($year as $val) { ?>
          <option value="<?php echo $val->tahun; ?>"><?php echo $val->tahun; ?></option>
          <?php } ?>
          </select>
          </div>
        <div class="col">
           <button type="button" class="btn btn-info float-right" id="thn">Submit</button>
        </div>
      </div>
    </form>
    </div>
			<div class="card border-primary mt-2" style="max-width: 80rem;" id="pie_chart">
      <div class="card-header font-weight-bold text-center">Diagram Lingkaran Gizi Buruk Per-Kecamatan di Kabupaten Sleman Yogyakarta Pada Tahun <?php echo $tahun; ?></div>
        <div class="card-body text-primary p-0">
           <div class="row p-0">
            <div class="col-6 offset-2"><div id="chart_div"></div></div>
          </div>
          
          </div>
        </div>


  <div class="card border-primary mt-2" style="max-width: 80rem;" id="bar_chart">
  <div class="card-header font-weight-bold text-center">Diagram Batang Persebaran Kasus Gizi Buruk Per-Kecamatan di Kabupaten Sleman Yogyakarta Pada Tahun <?php echo $tahun; ?></div>
  <div class="card-body text-primary">
    <div class="row p-0">
            <div class="col-6 offset-2"><div id="bar_div2" style="width: 700px; height: 700px;"></div></div>
          </div>
  </div>
</div>

<div class="card border-primary mt-2" style="max-width: 80rem;" hidden="">
  <div class="card-body m-0 p-0">
      <div class="d-flex flex-row-reverse m-0">
            <div class="p-2"><a class=" font-weight-bold btn btn-danger btn-sm fotn-light" id="bar12">Bar Chart Data Stunting Kabupaten Sleman beerdasar Gender <i class="fa fa-bar-chart" aria-hidden="true"></i></a></div>
            <div class="p-2"><a class=" font-weight-bold btn btn-danger btn-sm fotn-light" id="pie12" >Pie Chart Data Stunting Kabupaten Sleman<i class="fa fa-pie-chart" aria-hidden="true"></i></a></div>
          
           </div>
  </div>
</div>
</div>
      </div>
    </div>
</div>
</div>
  <div class="py-0 bg-dark text-white   <?php if($param == 0 or $tahun == 1){ echo 'fixed-bottom';} ?>">
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
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">

     google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Depok', <?php echo $param['Depok_total_s'];  ?>],
          ['Gamping', <?php echo $param['Gamping_total_s']; ?>],
          ['Sleman', <?php echo $param['Sleman_total_s']; ?>],
          ['Tempel', <?php echo $param['Tempel_total_s']; ?>],
          ['Berbah', <?php echo $param['Berbah_total_s']; ?>],

          ['Cangkringan', <?php echo $param['Cangkringan_total_s']; ?>],
          ['Kalasan', <?php echo $param['Kalasan_total_s']; ?>],

          ['Minggir', <?php echo $param['Minggir_total_s']; ?>],
          ['Mlati', <?php echo $param['Mlati_total_s']; ?>],
          ['Moyudan', <?php echo $param['Moyudan_total_s']; ?>],
          ['Ngaglik', <?php echo $param['Ngaglik_total_s']; ?>],
          ['Ngemplak', <?php echo $param['Ngemplak_total_s']; ?>],
          ['Pakem', <?php echo $param['Pakem_total_s']; ?>],
          ['Prambanan', <?php echo $param['Prambanan_total_s']; ?>],
          ['Seyegan', <?php echo $param['Seyegan_total_s']; ?>],
          ['Turi', <?php echo $param['Turi_total_s']; ?>],
          ['Godean', <?php echo $param['Godean_total_s']; ?>]
        ]);

        // Set chart options
        var options = { 'width':700,'height':500,'position':'center'};
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }

      google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawTitleSubtitle);

function drawTitleSubtitle() {
      var data = google.visualization.arrayToDataTable([
        ['Gender', 'Laki-Laki', 'Wanita'],
         ['Depok', <?php echo $param['Depok_s_l'].','. $param['Depok_s_p']; ?>],
          ['Gamping',  <?php echo $param['Gamping_s_l'].','. $param['Gamping_s_p']; ?>],
          ['Sleman',  <?php echo $param['Depok_s_l'].','. $param['Sleman_s_l']; ?>],
          ['Tempel',  <?php echo $param['Tempel_s_l'].','. $param['Tempel_s_p']; ?>],
          ['Berbah',  <?php echo $param['Berbah_s_l'].','. $param['Berbah_s_p']; ?>],
          ['Cangkringan',  <?php echo $param['Cangkringan_s_l'].','. $param['Cangkringan_s_p']; ?>],
          ['Kalasan',  <?php echo $param['Kalasan_s_l'].','. $param['Kalasan_s_p']; ?>],
          ['Minggir', <?php echo $param['Minggir_s_l'].','. $param['Minggir_s_p']; ?>],
          ['Mlati',  <?php echo $param['Mlati_s_l'].','. $param['Mlati_s_p']; ?>],
          ['Moyudan',  <?php echo $param['Moyudan_s_l'].','. $param['Moyudan_s_p']; ?>],
          ['Ngaglik',  <?php echo $param['Ngaglik_s_l'].','. $param['Ngaglik_s_p']; ?>],
          ['Ngemplak',  <?php echo $param['Ngemplak_s_l'].','. $param['Ngemplak_s_p']; ?>],
          ['Pakem',  <?php echo $param['Pakem_s_l'].','. $param['Pakem_s_p']; ?>],
          ['Prambanan',  <?php echo $param['Prambanan_s_l'].','. $param['Prambanan_s_p']; ?>],
          ['Seyegan',  <?php echo $param['Seyegan_s_l'].','. $param['Seyegan_s_p']; ?>],
          ['Turi',  <?php echo $param['Turi_s_l'].','. $param['Turi_s_p']; ?>],
          ['Godean',  <?php echo $param['Godean_s_l'].','. $param['Godean_s_p']; ?>]
      ]);

      var materialOptions = {
        chart: {
          title: 'Total Kasus Gizi Buruk berdasar Jenis Klamin di Kabupaten Sleman',
        },
        hAxis: {
          title: 'Total Kasus',
          minValue: 0,
        },
        vAxis: {
          title: 'Kecamatan'
        },
        bars: 'horizontal'
      };
      var materialChart = new google.charts.Bar(document.getElementById('bar_div2'));
      materialChart.draw(data, materialOptions);
    }

    $(document).ready(function(){
     // $('#bar_chart').hide();
    $('.tahun').change(function(){
     // alert(6565);
      var d =$('#tahun').val();
     // var base_url = window.location.origin;
        window.location.href='http://localhost/gis_stunting/index.php/gis/grafik/'+d;
    });
      });


    </script>
  
</body>

</html>