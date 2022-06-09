<?php
require_once "../function/calculate.php";
// MENYIAPKAN DATA LINGKARAN
$data_lingkaran = [];

// MELAKUKAN CEK DATA LINGKARAN YANG ADA PADA FOLDER DATA/LINGKARAN.TXT
if (file_exists('../data/lingkaran.txt')) {
    $lingkaran = file('../data/lingkaran.txt');
    $data_lingkaran = unserialize($lingkaran[0]);

    // var_dump($data_lingkaran[0]['date']);
}

if (isset($_POST['jari'])) {
    // MENANGKAP NILAI JARI-JARI YANG DITERIMA DARI FORM
    $jari = $_POST['jari'];
    $date = date('Y-m-d');
    $time = date('H:i:s');

    // MENGHITUNG LUAS LINGKARAN DENGAN FUNCTION
    $luas = lingkaran($jari);
    // MENAMBAHKAN DATA BARU KE DALAM ARRAY
    $data_lingkaran[] = [
        'jari' => $jari,
        'luas' => $luas,
        'date' => $date,
        'time' => $time
    ];
    // MENYIMPAN DATA BARU KE FOLDER DATA/LINGKARAN.TXT
    file_put_contents('../data/lingkaran.txt', serialize($data_lingkaran));
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>UJI Kompetensi | Hitung Lingkaran</title>
    </head>
    <body>
    <?php include_once "../components/navbar.php" ?>
    <div class="container mt-4">
        <div class="shadow p-3 mb-3 bg-white rounded">
        <div class="card-header">
        <div class="text-right">
            <a class="btn btn-dark" data-toggle="modal" data-target="#modalLingkaran" style="background-color: #40407a;">
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
                                <th>Jari-Jari</th>
                                <th>Hasil</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            // SORTING ARRAY DATATABLE
                            rsort ($data_lingkaran);
                            // MENGAMBIL DATA DARI ARRAY
                            $no = 1;
                            foreach ($data_lingkaran as $key => $value) {
                                echo "<tr>";
                                echo "<td>".($key+1)."</td>";
                                echo "<td>".$value['jari']."</td>";
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
              if(isset($_POST['jari'])){
                  $jari = $_POST['jari'];
                  $luas = 3.14 * $jari * $jari;
                  echo "Hasil Perhitungan = $luas";
              }
            ?>
            </h6>
        </div>
    </div>
  </body>
</html>

<!-- MODAL TAMBAH DATA -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalLingkaran">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hitung Luas Lingkaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="luas_lingkaran.php" method="post">
        <div class="form-group">
            <input min="0" type="number" class="form-control" id="jari" name="jari" placeholder="Masukkan Jari-Jari" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-dark" style="background-color: #40407a;">Hitung</button>
      </div>
      </form>
    </div>
  </div>
</div>