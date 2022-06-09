<?php
require_once "../function/calculate.php";
// MENYIAPKAN DATA SEGITIGA
$data_segitiga = [];

// MELAKUKAN CEK DATA LINGKARAN YANG ADA PADA FOLDER DATA/SEGITIGA.TXT
if (file_exists('../data/segitiga.txt')) {
    $segitiga = file('../data/segitiga.txt');
    $data_segitiga = unserialize($segitiga[0]);
}

if (isset($_POST['alas'])) {
    // MENANGKAP NILAI SISI YANG DITERIMA DARI FORM
    $alas = $_POST['alas'];
    $tinggi = $_POST['tinggi'];
    $date = date('Y-m-d');
    $time = date('H:i:s');

    // MENGHITUNG LUAS SEGITIGA DENGAN FUNCTION
    $luas = segitiga($alas, $tinggi);

    // MENAMBAHKAN DATA BARU KE DALAM ARRAY
    $data_segitiga[] = [
        'alas' => $alas,
        'tinggi' => $tinggi,
        'luas' => $luas,
        'date' => $date,
        'time' => $time
    ];
    // MENYIMPAN DATA BARU KE FOLDER DATA/SEGITIGA.TXT
    file_put_contents('../data/segitiga.txt', serialize($data_segitiga));
}
    ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>UJI Kompetensi | Hitung Segitiga</title>
    </head>
    <body>
    <?php include_once "../components/navbar.php" ?>
    <div class="container mt-4">
        <div class="shadow p-3 mb-3 bg-white rounded">
        <div class="card-header">
        <div class="text-right">
            <a class="btn btn-dark" data-toggle="modal" data-target="#modalSegitiga" style="background-color: #40407a;">
              <b>Tambah</b>
            </a>
        </div>
        </div>
        <div class="card-body">
          <!-- MENAMPILKAN DATATABLE -->
        <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Alas</th>
                                <th>Tinggi</th>
                                <th>Hasil</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        // SHORT
                        rsort ($data_segitiga);
                        // MENGAMBIL DATA DARI ARRAY
                            $no = 1;
                            foreach($data_segitiga as $key => $value){
                                echo "<tr>";
                                echo "<td>$no</td>";
                                echo "<td>$value[alas]</td>";
                                echo "<td>$value[tinggi]</td>";
                                echo "<td>$value[luas]</td>";
                                echo "<td>$value[date]</td>";
                                echo "<td>$value[time]</td>";
                                echo "</tr>";
                                $no++;
                            }
                        ?>
                        </tbody>
                    </table>
        </div>
        </div>
        <div class="card-footer">
            <h6>
              <!-- MENAMPILKAN HASIL PERHITUNGAN DATA BARU YANG DITAMBAHKAN --> 
                <?php
                  if(isset($_POST['alas']) && isset($_POST['tinggi'])){
                      $alas = $_POST['alas'];
                      $tinggi = $_POST['tinggi'];
                      $luas = $alas * $tinggi / 2;
                      echo "Hasil Perhitungan = $luas";
                  }
                ?>
            </h6>
        </div>
        </div>
    </div>
  </body>
</html>

<!-- MODAL TAMBAH DATA -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalSegitiga">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hitung Luas Segitiga</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="luas_segitiga.php" method="post">
        <div class="form-group">
            <input type="number" class="form-control" id="alas" name="alas" placeholder="Masukkan alas" required>
        </div>
        <div class="form-group">
            <input min="0" type="number" class="form-control" id="tinggi" name="tinggi" placeholder="Masukkan tinggi" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-dark" style="background-color: #40407a;">Hitung</button>
      </div>
      </form>
    </div>
  </div>
</div>