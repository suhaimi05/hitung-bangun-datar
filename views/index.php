<?php
// MENGAMBIL DATA SEGITIGA PADA FOLDER DATA/SEGITIGA.TXT
$data_segitiga = unserialize(file_get_contents('../data/segitiga.txt'));
// MENGAMBIL DATA SEGITIGA PADA FOLDER DATA/PERSEGI.TXT
$data_persegi = unserialize(file_get_contents('../data/persegi.txt'));
// MENGAMBIL DATA SEGITIGA PADA FOLDER DATA/LINGKARAN.TXT
$data_lingkaran = unserialize(file_get_contents('../data/lingkaran.txt'));

// MENGHITUNG SEMUA DATA
$jumlah_bangun_datar = count($data_segitiga) + count($data_lingkaran) + count($data_persegi);

// MENGHITUNG PERSENTASE SEGITIGA YANG DITAMBAHKAN
$persentase_segitiga = count($data_segitiga) / $jumlah_bangun_datar * 100;

// MENGHITUNG PERSENTASE PERSEGI YANG DITAMBAHKAN
$persentase_persegi = count($data_persegi) / $jumlah_bangun_datar * 100;

// MENGHITUNG PERSENTASE LINGKARAN YANG DITAMBAHKAN
$persentase_lingkaran = count($data_lingkaran) / $jumlah_bangun_datar * 100;

// MENGHITUNG TOTAL DATA SEGITIGA
$total_segitiga = count($data_segitiga);

// MENGHITUNG TOTAL DATA PERSEGI
$total_persegi = count($data_persegi);

// MENGHITUNG TOTAL DATA LINGKARAN
$total_lingkaran = count($data_lingkaran);

// MENGHITUNG NILAI MAKSIMUM YANG DITAMBAHKAN
$max = max($total_segitiga, $total_lingkaran, $total_persegi);

// MENGHITUNG NILAI MINIMUM YANG DITAMBAHKAN
$min = min($total_segitiga, $total_lingkaran, $total_persegi);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>UJI Kompetensi | Bangun Datar</title>
    </head>
    <body>

    <?php include_once "../components/navbar.php" ?>
    <div class="container mt-4">
      <div class="row">
        <!-- MENAMPILKAN TOTAL PERHITUNGAN SEMUA DATA -->
        <div class="col-md-6">
          <div class="shadow p-3 mb-3 bg-white rounded">
            <div class="card-header">Total Perhitungan</div>
            <div class="card-body"><h3><?= $jumlah_bangun_datar ?><span> Kali</span></h3></div>
          </div>
        </div>

        <!-- MENAMPILKAN PERHITUNGAN PERSENTASE SEGITIGA -->
        <div class="col-md-6">
          <div class="shadow p-3 mb-3 bg-white rounded">
            <div class="card-header">Persentase Segitiga</div>
            <div class="card-body"><h3><?= round($persentase_segitiga) ?><span> %</span></h3></div>
          </div>
        </div>

      </div>

      <div class="row">
        <!-- MENAMPILKAN PERHITUNGAN PERSENTASE PERSEGI -->
        <div class="col-md-6">
          <div class="shadow p-3 mb-3 bg-white rounded">
            <div class="card-header">Persentase Persegi</div>
            <div class="card-body"><h3><?= round($persentase_lingkaran) ?><span> %</span></h3></div>
          </div>
        </div>

        <!-- MENAMPILKAN PERHITUNGAN PERSENTASE LINGKARAN -->
        <div class="col-md-6">
          <div class="shadow p-3 mb-3 bg-white rounded">
            <div class="card-header">Persentase Lingkaran</div>
            <div class="card-body"><h3><?= round($persentase_persegi) ?><span> %</span></h3></div>
          </div>
        </div>

      </div>

      <div class="row">
        <!-- MENAMPILKAN PERHITUNGAN NILAI MAKSIMUM SEMUA DATA -->
        <div class="col-md-6">
          <div class="shadow p-3 mb-3 bg-white rounded">
            <div class="card-header">Nilai Maksimum</div>
            <div class="card-body"><h3><?= round($max) ?></h3></div>
          </div>
        </div>

        <div class="col-md-6">
          <!-- MENAMPILKAN PERHITUNGAN NILAI MINIMUM SEMUA DATA -->
          <div class="shadow p-3 mb-3 bg-white rounded">
            <div class="card-header">Nilai Minimum</div>
            <div class="card-body"><h3><?= round($min) ?></h3></div>
          </div>
        </div>

      </div>

    </div>
  </body>
</html>
