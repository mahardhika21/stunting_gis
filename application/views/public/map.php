<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Map</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/public/css/theme.css" type="text/css"> 
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>

<link rel="stylesheet" href="<?php echo base_url(); ?>asset/public/libs/leaflet/leaflet.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/public/dist/leaflet.label.css" />
  
  <script src="<?php echo base_url(); ?>asset/public/libs/leaflet/leaflet-src.js"></script>

  <script src="<?php echo base_url(); ?>asset/public/src/Label.js"></script>
  <script src="<?php echo base_url(); ?>asset/public/src/BaseMarkerMethods.js"></script>
  <script src="<?php echo base_url(); ?>asset/public/src/Marker.Label.js"></script>
  <script src="<?php echo base_url(); ?>asset/public/src/CircleMarker.Label.js"></script>
  <script src="<?php echo base_url(); ?>asset/public/src/Map.Label.js"></script>


  <style>
    html, body {
      height: 100%;
      margin: 0;
    }
    #map {
      width: 600px;
      height: 400px;
    }
  </style>

  <style>#map { width: 800px; height: 500px; }
.info { padding: 6px 8px; font: 14px/16px Arial, Helvetica, sans-serif; background: white; background: rgba(255,255,255,0.8); box-shadow: 0 0 15px rgba(0,0,0,0.2); border-radius: 5px; } .info h4 { margin: 0 0 5px; color: #777; }
.legend { text-align: left; line-height: 18px; color: #555; } .legend i { width: 18px; height: 18px; float: left; margin-right: 8px; opacity: 0.7; }</style>
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
            <a class="nav-link" href="<?php echo site_url('gis/gizi'); ?>"><i class="fa fa-medkit"></i> Gizi
            </a>
          </li>
          <li class="nav-item active">
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
     <div  <?php if($param == 0){ echo 'hidden'; }?>>
        <div class="bg-white col-4 offset-4">
      <form method="" action="<?php echo site_url('Gis/grafik'); ?>">
       <div class="form-row">
          <div class="col-12">
          <select class="form-control form-control-sm" name="tahun" id="tahun">
          <option>Pilihan</option>
          <?php foreach ($year as $val) { ?>
          <option value="<?php echo $val->tahun; ?>"><?php echo $val->tahun; ?></option>
          <?php } ?>
          </select>
          </div>
       
      </div>
    </form>
    </div>
			<div class="card border-primary mt-1" style="max-width: 80rem;">
  <div class="card-header font-weight-bold text-center">Peta Persebaran Kasus Gizi Buruk (Stunting) Per-Kecamatan di Kabupaten Sleman Yogyakarta Tahun <?php echo $tahun; ?></div>
  <div class="card-body text-primary">
  <div class="col-10 offset-1">
    <div id='map'></div>
  </div>
  </div>
</div>

<div class="card border-primary mt-2" style="max-width: 80rem;">
  <div class="card-body m-0 p-0">
      <div class="d-flex flex-row-reverse m-0">
            <div class="p-2"><a class=" font-weight-bold btn btn-danger btn-sm fotn-light" data-toggle="collapse" href="#multiCollapseExample1">Tabel Data Stunting Kabupaten Sleman beerdasar kecamatan <i class="fa fa-table" aria-hidden="true"></i></a></div>
            <div class="p-2"><a class=" font-weight-bold btn btn-danger btn-sm fotn-light" data-toggle="collapse" href="#multiCollapseExample2">Tabel Data Stunting Kabupaten Sleman Puskesmas <i class="fa fa-hospital-o" aria-hidden="true"></i></a></div>
            <div class="p-2">
                 <a href="http://api.html2pdfrocket.com/pdf?value=http://www.google.co.nz&apikey=40710e10-74a4-4fef-9e74-8d93836956de" class="btn btn-sm btn-danger float-right" id="pdf">Download Laporan <i class="fa fa-download"></i></a>
            </div>
          
           </div>
  </div>
</div>
<div class="row mt-2">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample1">
      <div class="card card-body">
      <div class="card-titel text-center font-weight-bold">Tabel Persebaran Gizi Buruk (Stunting) Berdasar Kecamatan di Kabupaten Sleman Yogyakarta Tahun<?php echo $tahun; ?></div>
        <table class="table table-sm table-striped text-center mt-2">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Kecamatan </th>
      <th scope="col" title="Jumlah Baliata">Balita</th>
      <th scope="col" title="Jumlah Balita Stunting">Balita Stunting</th>
      <th scope="col" title="Jumlah Balita Stunting Laki-Laki">Stunting Laki-Laki</th>
      <th scope="col" title="Jumlah Balita Stunting Perempuan">Stunting Perempuan</th>
      <th scope="col" title="Persentase %">Persentase</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th scope="col" colspan="2">Total </th>
      <th scope="col"><?php echo $total['total_balita']; ?></th>
      <th scope="col" title="Jumlah Balita Stunting"><?php echo $total['total_stunted']; ?></th>
      <th scope="col" title="Jumlah Balita Stunting Laki-Laki"><?php echo $total['stunted_l']; ?></th>
      <th scope="col" title="Jumlah Balita Stunting Perempuan"><?php echo $total['stunted_p']; ?></th>
      <th scope="col" title="Persentase %"><?php $persen_tt = ($total['total_stunted']/$total['total_balita'])*100;  echo number_format($persen_tt,2,'.',',').' %'; ?></th>
    </tr>
  </tfoot>
  <tbody>
        <th scope="row">1</th>
      <td>Berbah</td>
      <td><?php echo $param['Berbah_total_b']; ?></td>
      <td><?php echo $param['Berbah_total_s']; ?></td>
      <td><?php echo $param['Berbah_s_l']; ?></td>
      <td><?php echo $param['Berbah_s_p']; ?></td>
      <td><?php $persen_berbah= ($param['Berbah_total_s']/$param['Berbah_total_b'])*100; echo number_format($persen_berbah,2,'.',',').' %';?></td>
    </tr>
     <tr>
      <th scope="row">2</th>
      <td>Cangkringan</td>
      <td><?php echo $param['Cangkringan_total_b']; ?></td>
      <td><?php echo $param['Cangkringan_total_s']; ?></td>
      <td><?php echo $param['Cangkringan_s_l']; ?></td>
      <td><?php echo $param['Cangkringan_s_p']; ?></td>
      <td><?php $persen_cangkringan= ($param['Cangkringan_total_s']/$param['Cangkringan_total_b'])*100; echo number_format($persen_cangkringan,2,'.',',').' %';?></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Depok</td>
      <td><?php echo $param['Depok_total_b']; ?></td>
      <td><?php echo $param['Depok_total_s']; ?></td>
      <td><?php echo $param['Depok_s_l']; ?></td>
      <td><?php echo $param['Depok_s_p']; ?></td>
      <td><?php $persen_depok= ($param['Depok_total_s']/$param['Depok_total_b'])*100;
       echo number_format($persen_depok,2,'.',',').' %';?></td>
    </tr>
    <tr>

      <tr>
      <th scope="row">4</th>
      <td>Gamping</td>
      <td><?php echo $param['Gamping_total_b']; ?></td>
      <td><?php echo $param['Gamping_total_s']; ?></td>
      <td><?php echo $param['Gamping_s_l']; ?></td>
      <td><?php echo $param['Gamping_s_p']; ?></td>
      <td><?php $persen_gamping= ($param['Gamping_total_s']/$param['Gamping_total_b'])*100; echo number_format($persen_gamping,2,'.',',').' %';?></td>
    </tr>
        <tr>
      <th scope="row">5</th>
      <td>Godean</td>
      <td><?php echo $param['Godean_total_b']; ?></td>
      <td><?php echo $param['Godean_total_s']; ?></td>
      <td><?php echo $param['Godean_s_l']; ?></td>
      <td><?php echo $param['Godean_s_p']; ?></td>
      <td><?php $persen_godean= ($param['Godean_total_s']/$param['Godean_total_b'])*100;  echo number_format($persen_godean,2,'.',',').' %';?></td>
    </tr>
        <tr>
      <th scope="row">6</th>
      <td>Kalasan</td>
      <td><?php echo $param['Kalasan_total_b']; ?></td>
      <td><?php echo $param['Kalasan_total_s']; ?></td>
      <td><?php echo $param['Kalasan_s_l']; ?></td>
      <td><?php echo $param['Kalasan_s_p']; ?></td>
      <td><?php $persen_kalasan= ($param['Kalasan_total_s']/$param['Kalasan_total_b'])*100; echo number_format($persen_kalasan,2,'.',',').' %';?></td>
    </tr>
        <tr>
      <th scope="row">7</th>
      <td>Moyudan</td>
      <td><?php echo $param['Moyudan_total_b']; ?></td>
      <td><?php echo $param['Moyudan_total_s']; ?></td>
      <td><?php echo $param['Moyudan_s_l']; ?></td>
      <td><?php echo $param['Moyudan_s_p']; ?></td>
      <td><?php $persen_moyudan = ($param['Moyudan_total_s']/$param['Moyudan_total_b'])*100; echo number_format($persen_moyudan,2,'.',',').' %';?></td>
    </tr>
        <tr>
      <th scope="row">8</th>
      <td>Minggir</td>
      <td><?php echo $param['Minggir_total_b']; ?></td>
      <td><?php echo $param['Minggir_total_s']; ?></td>
      <td><?php echo $param['Minggir_s_l']; ?></td>
      <td><?php echo $param['Minggir_s_p']; ?></td>
      <td><?php $persen_minggir= ($param['Minggir_total_s']/$param['Minggir_total_b'])*100; echo number_format($persen_minggir,2,'.',',').' %';?></td>
    </tr>
        <tr>
      <th scope="row">9</th>
      <td>Mlati</td>
      <td><?php echo $param['Mlati_total_b']; ?></td>
      <td><?php echo $param['Mlati_total_s']; ?></td>
      <td><?php echo $param['Mlati_s_l']; ?></td>
      <td><?php echo $param['Mlati_s_p']; ?></td>
      <td><?php $persen_mlati= ($param['Mlati_total_s']/$param['Mlati_total_b'])*100; echo number_format($persen_mlati,2,'.',',').' %';?></td>
    </tr>
      <tr>
      <th scope="row">10</th>
      <td>Ngaglik</td>
      <td><?php echo $param['Ngaglik_total_b']; ?></td>
      <td><?php echo $param['Ngaglik_total_s']; ?></td>
      <td><?php echo $param['Ngaglik_s_l']; ?></td>
      <td><?php echo $param['Ngaglik_s_p']; ?></td>
      <td><?php $persen_ngaglik= ($param['Ngaglik_total_s']/$param['Ngaglik_total_b'])*100; echo number_format($persen_ngaglik,2,'.',',').' %';?></td>
    </tr>
        <tr>
      <th scope="row">11</th>
      <td>DeNgemplakpok</td>
      <td><?php echo $param['Ngemplak_total_b']; ?></td>
      <td><?php echo $param['Ngemplak_total_s']; ?></td>
      <td><?php echo $param['Ngemplak_s_l']; ?></td>
      <td><?php echo $param['Ngemplak_s_p']; ?></td>
      <td><?php $persen_ngemplak= ($param['Ngemplak_total_s']/$param['Ngemplak_total_b'])*100; echo number_format($persen_ngemplak,2,'.',',').' %';?></td>
    </tr>
            <tr>
      <th scope="row">12</th>
      <td>Pakem</td>
      <td><?php echo $param['Pakem_total_b']; ?></td>
      <td><?php echo $param['Pakem_total_s']; ?></td>
      <td><?php echo $param['Pakem_s_l']; ?></td>
      <td><?php echo $param['Pakem_s_p']; ?></td>
      <td><?php $persen_pakem= ($param['Pakem_total_s']/$param['Pakem_total_b'])*100;  echo number_format($persen_pakem,2,'.',',').' %';?></td>
    </tr>
        <tr>
      <th scope="row">13</th>
      <td>Prambanan</td>
      <td><?php echo $param['Prambanan_total_b']; ?></td>
      <td><?php echo $param['Prambanan_total_s']; ?></td>
      <td><?php echo $param['Prambanan_s_l']; ?></td>
      <td><?php echo $param['Prambanan_s_p']; ?></td>
      <td><?php $persen_prambanan= ($param['Prambanan_total_s']/$param['Prambanan_total_b'])*100;  echo number_format($persen_prambanan,2,'.',',').' %';?></td>
    </tr>
      <tr>
      <th scope="row">14</th>
      <td>Seyegan</td>
      <td><?php echo $param['Seyegan_total_b']; ?></td>
      <td><?php echo $param['Seyegan_total_s']; ?></td>
      <td><?php echo $param['Seyegan_s_l']; ?></td>
      <td><?php echo $param['Seyegan_s_p']; ?></td>
      <td><?php $persen_seyegan= ($param['Seyegan_total_s']/$param['Seyegan_total_b'])*100; echo number_format($persen_seyegan,2,'.',',').' %'; ?></td>
    </tr>
        <tr>
      <th scope="row">15</th>
      <td>Sleman</td>
      <td><?php echo $param['Sleman_total_b']; ?></td>
      <td><?php echo $param['Sleman_total_s']; ?></td>
      <td><?php echo $param['Sleman_s_l']; ?></td>
      <td><?php echo $param['Sleman_s_p']; ?></td>
      <td><?php $persen_sleman= ($param['Sleman_total_s']/$param['Sleman_total_b'])*100;  echo number_format($persen_sleman,2,'.',',').' %';?></td>
    </tr>
      <tr>
      <th scope="row">16</th>
      <td>Tempel</td>
      <td><?php echo $param['Tempel_total_b']; ?></td>
      <td><?php echo $param['Tempel_total_s']; ?></td>
      <td><?php echo $param['Tempel_s_l']; ?></td>
      <td><?php echo $param['Tempel_s_p']; ?></td>
      <td><?php $persen_tempel= ($param['Tempel_total_s']/$param['Tempel_total_b'])*100; echo ceil($persen_tempel) .' %'; echo number_format($persen_tempel,2,'.',',').' %';?></td>
    </tr>
        <tr>
      <th scope="row">17</th>
      <td>Turi</td>
      <td><?php echo $param['Turi_total_b']; ?></td>
      <td><?php echo $param['Turi_total_s']; ?></td>
      <td><?php echo $param['Turi_s_l']; ?></td>
      <td><?php echo $param['Turi_s_p']; ?></td>
      <td><?php $persen_turi= ($param['Turi_total_s']/$param['Turi_total_b'])*100; echo number_format($persen_turi,2,'.',',').' %';?></td>
    </tr>

  </tbody>
</table>
      </div>
    </div>
     <div class="collapse multi-collapse" id="multiCollapseExample2">
      <div class="card card-body">
        <div class="card-titel text-center font-weight-bold">Tabel Persebaran Gizi Buruk (Stunting) Berdasaar Puskesmas di Kabupaten Sleman Yogyakarta Tahun <?php echo $tahun; ?></div>
       <table class="table table-striped text-center mt-2">
  <thead>
    <tr>
      <th scope="col">#</th>
            <th scope="col">Puskesmas</th>
      <th scope="col">Kecamatan</th>
      <th scope="col">Baliata</th>
       <th scope="col">Baliata Stunting</th>
    </tr>
  </thead>
  <tbody>
  <?php $no=1; 
  foreach($puskesmas as $val){ ?>
    <tr>
      <th scope="row"><?php echo $no++; ?></th>
      <td><?php echo $val->puskesmas; ?></td>
      <td><?php echo $val->nama_kecamatan; ?></td>
      <td><?php echo $val->balita_laki + $val->balita_laki .' Anak'; ?></td>
       <td><?php echo $val->stuted_l + $val->stunted_p .' Anak'; ?></td>
    </tr>
  <?php } ?>
  </tbody>
</table>

      </div>
    </div>
  </div>
        </div>
      </div>
    </div>
</div>
</div>
</div>

  <div class="py-0 bg-dark text-white <?php if($param == 0){ echo 'fixed-bottom';} ?>">
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
  <script type="text/javascript">
    var berbah = <?php echo $param['Berbah_total_s']; ?>; 
    var cangkringan =<?php echo $param['Cangkringan_total_s']; ?>; 
    var depok =<?php echo $param['Depok_total_s']; ?>; 
    var gamping = <?php echo $param['Gamping_total_s']; ?>; 
    var godean =<?php echo $param['Godean_total_s']; ?>; 
    var kalasan =<?php echo $param['Kalasan_total_s']; ?>; 
    var minggir =<?php echo $param['Minggir_total_s']; ?>; 
    var mlati =<?php echo $param['Mlati_total_s']; ?>; 
    var moyudan =<?php echo $param['Moyudan_total_s']; ?>; 
    var ngaglik =<?php echo $param['Ngaglik_total_s']; ?>; 
    var ngemplak =<?php echo $param['Ngemplak_total_s']; ?>; 
    var pakem =<?php echo $param['Pakem_total_s']; ?>; 
    var prambanan =<?php echo $param['Prambanan_total_s']; ?>; 
    var seyegan =<?php echo $param['Seyegan_total_s']; ?>; 
    var sleman =<?php echo $param['Sleman_total_s']; ?>; 
    var tempel =<?php echo $param['Tempel_total_s']; ?>; 
    var turi =<?php echo $param['Turi_total_s']; ?>; 
    
   // var depoklat ='';
  </script>
  <script src="<?php echo base_url(); ?>asset/public/js/sleman.js"></script>
  <script type="text/javascript">
    

  var map = L.map('map').setView([-7.716165, 110.335403], 12);

  L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 12,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
      '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
      'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox.light'
  }).addTo(map);


  // control that shows state info on hover
  var info = L.control();

  info.onAdd = function (map) {
    this._div = L.DomUtil.create('div', 'info');
    this.update();
    return this._div;
  };

  info.update = function (props) {
    this._div.innerHTML = '' +  (props ?
      '<b>' + props.name + '</b><br />' + props.density + ' Kasus/Bayi'
      : '');
  };
  info.addTo(map);
  function getColor(d) {
    return d > 1000 ? '#006400' :
        d > 500  ? '#FFD700' :
        d > 250  ? '#8B0000' :
        d > 100  ? '#1E90FF' :
        
              '#FFEDA0';
  }

  function style(feature) {
    return {
      weight: 2,
      opacity: 1,
      color: 'white',
      dashArray: '3',
      fillOpacity: 0.7,
      fillColor: getColor(feature.properties.density)
    };
  }

  function highlightFeature(e) {
    var layer = e.target;

    layer.setStyle({
      weight: 5,
      color: '#666',
      dashArray: '',
      fillOpacity: 0.7
    });

    if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
      layer.bringToFront();
    }

    info.update(layer.feature.properties);
  }

  var geojson;

  function resetHighlight(e) {
    geojson.resetStyle(e.target);
    info.update();
  }

  function zoomToFeature(e) {
    map.fitBounds(e.target.getBounds());
  }

  function onEachFeature(feature, layer) {
    layer.on({
      mouseover: highlightFeature,
      mouseout: resetHighlight,
      click: zoomToFeature
    });
  }

  geojson = L.geoJson(statesData, {
    style: style,
    onEachFeature: onEachFeature
  }).addTo(map);

  map.attributionControl.addAttribution('Population data &copy; <a href="http://census.gov/">US Census Bureau</a>');


  var legend = L.control({position: 'bottomright'});

  legend.onAdd = function (map) {

    var div = L.DomUtil.create('div', 'info legend'),
      grades = [0, 100, 250, 500, 1000],
      labels = [],
      from, to;

    for (var i = 0; i < grades.length; i++) {
      from = grades[i];
      to = grades[i + 1];

      labels.push(
        '<i style="background:' + getColor(from + 1) + '"></i> ' +
        from + (to ? '&ndash;' + to : '+'));
    }
    

    div.innerHTML = labels.join('<br>');
    return div;
  };

  
var m = L.marker([-7.7338888888889, 110.32888888889], {draggable:true}).bindLabel('Mlati ('+ <?php echo number_format($persen_mlati,2,'.',','); ?> +' %)', { noHide: true })
      .addTo(map);
var m = L.marker([-7.8052777777778, 110.44277777778], {draggable:true}).bindLabel('Berbah ('+ <?php echo number_format($persen_berbah,2,'.',','); ?> +' %)', { noHide: true })
      .addTo(map);
var m = L.marker([-7.6588888888889, 110.45611111111], {draggable:true}).bindLabel('Cangkringan ('+ <?php echo number_format($persen_cangkringan,2,'.',',');?> +' %)', { noHide: true })
      .addTo(map);
var m = L.marker([-7.7583333333333, 110.39361111111], {draggable:true}).bindLabel('Depok ('+ <?php echo  number_format($persen_depok,2,'.',','); ?> +' %)', { noHide: true })
      .addTo(map);

var m = L.marker([-7.7955555555556, 110.32166666667], {draggable:true}).bindLabel('Gamping ('+ <?php echo number_format($persen_gamping,2,'.',','); ?> +' %)', { noHide: true })
      .addTo(map);
var m = L.marker([-7.7697222222222, 110.29972222222], {draggable:true}).bindLabel('Godean ('+ <?php echo number_format($persen_godean,2,'.',','); ?> +' %)', { noHide: true })
      .addTo(map);
var m = L.marker([-7.77, 110.46694444444], {draggable:true}).bindLabel('Kalasan ('+ <?php echo number_format($persen_kalasan,2,'.',','); ?> +' %)', { noHide: true })
      .addTo(map);

var m = L.marker([-7.7255555555556, 110.23472222222], {draggable:true}).bindLabel('Minggir ('+ <?php echo number_format($persen_minggir,2,'.',',');?> +' %)', { noHide: true })
      .addTo(map);
var m = L.marker([-7.7727777777778, 110.25361111111], {draggable:true}).bindLabel('Moyudan ('+ <?php echo number_format($persen_moyudan,2,'.',','); ?> +' %)', { noHide: true })
      .addTo(map);


var m = L.marker([-7.7238888888889, 110.40083333333], {draggable:true}).bindLabel('Ngaglik ('+ <?php echo number_format($persen_ngaglik,2,'.',','); ?> +' %)', { noHide: true })
      .addTo(map);
var m = L.marker([-7.6977777777778, 110.445], {draggable:true}).bindLabel('Ngemplak ('+ <?php echo number_format($persen_ngemplak,2,'.',','); ?> +' %)', { noHide: true })
      .addTo(map);
var m = L.marker([-7.6669444444444, 110.42], {draggable:true}).bindLabel('Pakem ('+ <?php echo number_format($persen_pakem,2,'.',','); ?> +' %)', { noHide: true })
      .addTo(map);

var m = L.marker([-7.7563888888889, 110.49], {draggable:true}).bindLabel('Prambanan ('+ <?php echo number_format($persen_prambanan,2,'.',','); ?> +' %)', { noHide: true })
      .addTo(map);
var m = L.marker([-7.7211111111111, 110.30805555556], {draggable:true}).bindLabel('Seyegan ('+ <?php echo number_format($persen_seyegan,2,'.',','); ?> +' %)', { noHide: true })
      .addTo(map);
var m = L.marker([-7.6836111111111, 110.34027777778], {draggable:true}).bindLabel('Sleman ('+ <?php echo number_format($persen_sleman,2,'.',','); ?> +' %)', { noHide: true })
      .addTo(map);

var m = L.marker([-7.6522222222222, 110.32638888889], {draggable:true}).bindLabel('Tempel ('+ <?php echo number_format($persen_tempel,2,'.',','); ?> +' %)', { noHide: true })
      .addTo(map);
var m = L.marker([-7.6519444444444, 110.36972222222], {draggable:true}).bindLabel('Turi ('+ <?php echo number_format($persen_turi,2,'.',','); ?> +' %)', { noHide: true })
      .addTo(map);
//*/


  legend.addTo(map);

 $(document).ready(function(){
     // $('#bar_chart').hide();
    $('#tahun').change(function(){
     // alert(6565);
      var d =$('#tahun').val();
     // var base_url = window.location.origin;
        window.location.href='http://localhost/gis_stunting/index.php/gis/map/'+d;
    });
      });

  </script>
</body>

</html>