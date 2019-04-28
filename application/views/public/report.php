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
      <link rel="stylesheet" href="../dist/leaflet.label.css" />
</head>

<body class="bg-light">

<div class="row mt-2">
  <div class="col">
    <div class="">
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
      <th scope="col" title="Persentase %"><?php $persen_tt = ($total['total_stunted']/$total['total_balita'])*100; echo ceil($persen_tt).' %'; ?></th>
    </tr>
  </tfoot>
  <tbody>
        <th scope="row">1</th>
      <td>Berbah</td>
      <td><?php echo $param['Berbah_total_b']; ?></td>
      <td><?php echo $param['Berbah_total_s']; ?></td>
      <td><?php echo $param['Berbah_s_l']; ?></td>
      <td><?php echo $param['Berbah_s_p']; ?></td>
      <td><?php $persen_berbah= ($param['Berbah_total_s']/$param['Berbah_total_b'])*100; echo ceil($persen_berbah) .' %';?></td>
    </tr>
     <tr>
      <th scope="row">2</th>
      <td>Cangkringan</td>
      <td><?php echo $param['Cangkringan_total_b']; ?></td>
      <td><?php echo $param['Cangkringan_total_s']; ?></td>
      <td><?php echo $param['Cangkringan_s_l']; ?></td>
      <td><?php echo $param['Cangkringan_s_p']; ?></td>
      <td><?php $persen_cangkringan= ($param['Cangkringan_total_s']/$param['Cangkringan_total_b'])*100; echo ceil($persen_cangkringan) .' %';?></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Depok</td>
      <td><?php echo $param['Depok_total_b']; ?></td>
      <td><?php echo $param['Depok_total_s']; ?></td>
      <td><?php echo $param['Depok_s_l']; ?></td>
      <td><?php echo $param['Depok_s_p']; ?></td>
      <td><?php $persen_depok= ($param['Depok_total_s']/$param['Depok_total_b'])*100; echo ceil($persen_depok) .' %';?></td>
    </tr>
    <tr>

      <tr>
      <th scope="row">4</th>
      <td>Gamping</td>
      <td><?php echo $param['Gamping_total_b']; ?></td>
      <td><?php echo $param['Gamping_total_s']; ?></td>
      <td><?php echo $param['Gamping_s_l']; ?></td>
      <td><?php echo $param['Gamping_s_p']; ?></td>
      <td><?php $persen_gamping= ($param['Gamping_total_s']/$param['Gamping_total_b'])*100; echo ceil($persen_gamping) .' %';?></td>
    </tr>
        <tr>
      <th scope="row">5</th>
      <td>Godean</td>
      <td><?php echo $param['Godean_total_b']; ?></td>
      <td><?php echo $param['Godean_total_s']; ?></td>
      <td><?php echo $param['Godean_s_l']; ?></td>
      <td><?php echo $param['Godean_s_p']; ?></td>
      <td><?php $persen_godean= ($param['Godean_total_s']/$param['Godean_total_b'])*100; echo ceil($persen_godean) .' %';?></td>
    </tr>
        <tr>
      <th scope="row">6</th>
      <td>Kalasan</td>
      <td><?php echo $param['Kalasan_total_b']; ?></td>
      <td><?php echo $param['Kalasan_total_s']; ?></td>
      <td><?php echo $param['Kalasan_s_l']; ?></td>
      <td><?php echo $param['Kalasan_s_p']; ?></td>
      <td><?php $persen_kalasan= ($param['Kalasan_total_s']/$param['Kalasan_total_b'])*100; echo ceil($persen_kalasan) .' %';?></td>
    </tr>
        <tr>
      <th scope="row">7</th>
      <td>Moyudan</td>
      <td><?php echo $param['Moyudan_total_b']; ?></td>
      <td><?php echo $param['Moyudan_total_s']; ?></td>
      <td><?php echo $param['Moyudan_s_l']; ?></td>
      <td><?php echo $param['Moyudan_s_p']; ?></td>
      <td><?php $persen_moyudan = ($param['Moyudan_total_s']/$param['Moyudan_total_b'])*100; echo ceil($persen_moyudan) .' %';?></td>
    </tr>
        <tr>
      <th scope="row">8</th>
      <td>Minggir</td>
      <td><?php echo $param['Minggir_total_b']; ?></td>
      <td><?php echo $param['Minggir_total_s']; ?></td>
      <td><?php echo $param['Minggir_s_l']; ?></td>
      <td><?php echo $param['Minggir_s_p']; ?></td>
      <td><?php $persen_minggir= ($param['Minggir_total_s']/$param['Minggir_total_b'])*100; echo ceil($persen_minggir) .' %';?></td>
    </tr>
        <tr>
      <th scope="row">9</th>
      <td>Mlati</td>
      <td><?php echo $param['Mlati_total_b']; ?></td>
      <td><?php echo $param['Mlati_total_s']; ?></td>
      <td><?php echo $param['Mlati_s_l']; ?></td>
      <td><?php echo $param['Mlati_s_p']; ?></td>
      <td><?php $persen_mlati= ($param['Mlati_total_s']/$param['Mlati_total_b'])*100; echo ceil($persen_mlati) .' %';?></td>
    </tr>
      <tr>
      <th scope="row">10</th>
      <td>Ngaglik</td>
      <td><?php echo $param['Ngaglik_total_b']; ?></td>
      <td><?php echo $param['Ngaglik_total_s']; ?></td>
      <td><?php echo $param['Ngaglik_s_l']; ?></td>
      <td><?php echo $param['Ngaglik_s_p']; ?></td>
      <td><?php $persen_ngaglik= ($param['Ngaglik_total_s']/$param['Ngaglik_total_b'])*100; echo ceil($persen_ngaglik) .' %';?></td>
    </tr>
        <tr>
      <th scope="row">11</th>
      <td>DeNgemplakpok</td>
      <td><?php echo $param['Ngemplak_total_b']; ?></td>
      <td><?php echo $param['Ngemplak_total_s']; ?></td>
      <td><?php echo $param['Ngemplak_s_l']; ?></td>
      <td><?php echo $param['Ngemplak_s_p']; ?></td>
      <td><?php $persen_ngemplak= ($param['Ngemplak_total_s']/$param['Ngemplak_total_b'])*100; echo ceil($persen_ngemplak) .' %';?></td>
    </tr>
            <tr>
      <th scope="row">12</th>
      <td>Pakem</td>
      <td><?php echo $param['Pakem_total_b']; ?></td>
      <td><?php echo $param['Pakem_total_s']; ?></td>
      <td><?php echo $param['Pakem_s_l']; ?></td>
      <td><?php echo $param['Pakem_s_p']; ?></td>
      <td><?php $persen_pakem= ($param['Pakem_total_s']/$param['Pakem_total_b'])*100; echo ceil($persen_pakem) .' %';?></td>
    </tr>
        <tr>
      <th scope="row">13</th>
      <td>Prambanan</td>
      <td><?php echo $param['Prambanan_total_b']; ?></td>
      <td><?php echo $param['Prambanan_total_s']; ?></td>
      <td><?php echo $param['Prambanan_s_l']; ?></td>
      <td><?php echo $param['Prambanan_s_p']; ?></td>
      <td><?php $persen_prambanan= ($param['Prambanan_total_s']/$param['Prambanan_total_b'])*100; echo ceil($persen_prambanan) .' %';?></td>
    </tr>
      <tr>
      <th scope="row">14</th>
      <td>Seyegan</td>
      <td><?php echo $param['Seyegan_total_b']; ?></td>
      <td><?php echo $param['Seyegan_total_s']; ?></td>
      <td><?php echo $param['Seyegan_s_l']; ?></td>
      <td><?php echo $param['Seyegan_s_p']; ?></td>
      <td><?php $persen_seyegan= ($param['Seyegan_total_s']/$param['Seyegan_total_b'])*100; echo ceil($persen_seyegan) .' %';?></td>
    </tr>
        <tr>
      <th scope="row">15</th>
      <td>Sleman</td>
      <td><?php echo $param['Sleman_total_b']; ?></td>
      <td><?php echo $param['Sleman_total_s']; ?></td>
      <td><?php echo $param['Sleman_s_l']; ?></td>
      <td><?php echo $param['Sleman_s_p']; ?></td>
      <td><?php $persen_sleman= ($param['Sleman_total_s']/$param['Sleman_total_b'])*100; echo ceil($persen_sleman) .' %';?></td>
    </tr>
      <tr>
      <th scope="row">16</th>
      <td>Tempel</td>
      <td><?php echo $param['Tempel_total_b']; ?></td>
      <td><?php echo $param['Tempel_total_s']; ?></td>
      <td><?php echo $param['Tempel_s_l']; ?></td>
      <td><?php echo $param['Tempel_s_p']; ?></td>
      <td><?php $persen_tempel= ($param['Tempel_total_s']/$param['Tempel_total_b'])*100; echo ceil($persen_tempel) .' %';?></td>
    </tr>
        <tr>
      <th scope="row">17</th>
      <td>Turi</td>
      <td><?php echo $param['Turi_total_b']; ?></td>
      <td><?php echo $param['Turi_total_s']; ?></td>
      <td><?php echo $param['Turi_s_l']; ?></td>
      <td><?php echo $param['Turi_s_p']; ?></td>
      <td><?php $persen_turi= ($param['Turi_total_s']/$param['Turi_total_b'])*100; echo ceil($persen_turi) .' %';?></td>
    </tr>

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

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
</body>

</html>