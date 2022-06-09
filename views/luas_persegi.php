<?php
require_once "../function/calculate.php";
// MENYIAPKAN DATA PERSEGI
$data_persegi = [];

// MELAKUKAN CEK DATA LINGKARAN YANG ADA PADA FOLDER DATA/PERSEGI.TXT
if (file_exists('../data/persegi.txt')) {
    $persegi = file('../data/persegi.txt');
    $data_persegi = unserialize($persegi[0]);
}

if (isset($_POST['sisi'])) {
    // MENANGKAP NILAI SISI YANG DITERIMA DARI FORM
    $sisi = $_POST['sisi'];
    $date = date('Y-m-d');
    $time = date('H:i:s');

    // MENGHITUNG LUAS PERSEGI DENGAN FUNCTION
    $luas = persegi($sisi);
    // MENAMBAHKAN DATA BARU KE DALAM ARRAY
    $data_persegi[] = [
        'sisi' => $sisi,
        'luas' => $luas,
        'date' => $date,
        'time' => $time
    ];
    // MENYIMPAN DATA BARU KE FOLDER DATA/PERSEGI.TXT
    file_put_contents('../data/persegi.txt', serialize($data_persegi));
}
    ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>UJI Kompetensi | Hitung Persegi</title>
    </head>
    <body>
    <?php include_once "../components/navbar.php" ?>
    <div class="container mt-4">
        <div class="shadow p-3 mb-3 bg-white rounded">
        <div class="card-header">
        <div class="text-right">
            <a class="btn btn-dark" data-toggle="modal" data-target="#modalPersegi" style="background-color: #40407a;">
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
                                <th>Sisi²</th>
                                <th>Hasil</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            // SORTING ARRAY DATATABLE
                            rsort ($data_persegi);
                            // MENGAMBIL DATA DARI ARRAY
                            $no = 1;
                            foreach ($data_persegi as $key => $value) {
                                echo "<tr>";
                                echo "<td>".($key+1)."</td>";
                                echo "<td>".$value['sisi']."</td>";
                                echo "<td>".$value['luas']."</td>";
                                echo "<td>".$value['date']."</td>";
                                echo "<td>".$value['time']."</td>";
                                echo "</tr>";
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
              if(isset($_POST['sisi'])){
                  $sisi = $_POST['sisi'];
                  $luas = $sisi * $sisi;
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
<div class="modal fade" tabindex="-1" role="dialog" id="modalPersegi">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hitung Luas Persegi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="luas_persegi.php" method="post">
        <div class="form-group">
            <input min="0" type="number" class="form-control" id="sisi" name="sisi" placeholder="Masukkan sisi" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-dark" style="background-color: #40407a;">Hitung</button>
      </div>
      </form>
    </div>
  </div>
</div>