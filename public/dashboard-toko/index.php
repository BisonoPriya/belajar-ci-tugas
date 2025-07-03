<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard - Toko</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php 
function curl(){ 
  $curl = curl_init(); 
  curl_setopt_array($curl, array(
    CURLOPT_URL => "http://localhost:8080/api",
    CURLOPT_RETURNTRANSFER => true, 
    CURLOPT_CUSTOMREQUEST => "GET", 
    CURLOPT_HTTPHEADER => array(
      "content-type: application/x-www-form-urlencoded",
      "key:random123678abcghi",
    ),
  ));
  $output = curl_exec($curl); 	
  curl_close($curl);      
  
  $data = json_decode($output);   
  return $data;
} 


$send1 = curl();
?>

<div class="p-3 pb-md-4 mx-auto text-center">
  <h1 class="display-4 fw-normal">Dashboard - TOKO</h1>
  <p class="fs-5"><?= date("l, d-m-Y") ?> <span id="jam"></span>:<span id="menit"></span>:<span id="detik"></span></p>
</div>
<hr>

<div class="table-responsive card m-5 p-5">
  <table class="table table-bordered text-center">
    <thead class="table-light">
      <tr>
        <th>No</th>
        <th>Username</th>
        <th>Alamat</th>
        <th>Jumlah Item</th>
        <th>Total Harga</th>
        <th>Ongkir</th>
        <th>Status</th>
        <th>Tanggal Transaksi</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      if (!empty($send1)) {
        $hasil1 = $send1->results;
        $i = 1;

        if (!empty($hasil1)) {
          foreach ($hasil1 as $item1) {
          
            $jumlah_item = 0;
            if (!empty($item1->details)) {
              foreach ($item1->details as $detail) {
                $jumlah_item += $detail->jumlah;
              }
            }
      ?>
      <tr>
        <td><?= $i++ ?></td>
        <td><?= htmlspecialchars($item1->username); ?></td>
        <td><?= htmlspecialchars($item1->alamat); ?></td>
        <td><?= $jumlah_item; ?></td> 
        <td><?= number_format($item1->total_harga, 0, ',', '.'); ?></td>
        <td><?= number_format($item1->ongkir, 0, ',', '.'); ?></td>
        <td><?= ($item1->status == 1) ? "Sudah Selesai" : "Belum Selesai"; ?></td>
        <td><?= $item1->created_at; ?></td>
      </tr>
      <?php 
          } 
        } else {
          echo '<tr><td colspan="8">Data transaksi kosong.</td></tr>';
        }
      } else {
        echo '<tr><td colspan="8">Gagal mengambil data dari webservice.</td></tr>';
      }
      ?>
    </tbody>
  </table>
</div>

<script>
window.setTimeout("waktu()", 1000);
function waktu() {
  var waktu = new Date();
  setTimeout("waktu()", 1000);
  document.getElementById("jam").innerHTML = waktu.getHours();
  document.getElementById("menit").innerHTML = waktu.getMinutes();
  document.getElementById("detik").innerHTML = waktu.getSeconds();
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
