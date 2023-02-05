<?php 
$nama_pembeli = $_POST["nama_pembeli"];
$merk_laptop = $_POST["merk_laptop"];
$jumlah = $_POST["jumlah"];
$aksesoris = $_POST["aksesoris"];
$vga_jumlah = $_POST["vga_jumlah"];
$psu_jumlah = $_POST["psu_jumlah"];
$ram_jumlah = $_POST["ram_jumlah"];

$harga_laptop = 0;
   if ($merk_laptop == "ASUS") {
     $harga_laptop = 1000000;
   } elseif ($merk_laptop == "INTEL") {
     $harga_laptop = 2000000;
   } elseif ($merk_laptop == "LENOVO") {
     $harga_laptop = 1500000;
   }
$total_laptop = $harga_laptop * $jumlah;

$harga_vga = 500000;
$harga_psu = 100000;
$harga_ram = 200000;

$vga_jumlah = intval($vga_jumlah);
$psu_jumlah = intval($psu_jumlah);
$ram_jumlah = intval($ram_jumlah);
$total_aksesoris = ($harga_vga * $vga_jumlah) + ($harga_psu * $psu_jumlah) + ($harga_ram * $ram_jumlah);
$jumlahKeseluruhan = $total_laptop + $total_aksesoris;

function format_rupiah($curency){
    $rupiah = "Rp. ".number_format($curency,0,',','.');
    return $rupiah;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        background-color: #112942;
        color: white;
    }
    .isi-web {
        margin: auto;
        width: 490px;
    }
    .hasil {
        margin: 20px;
        text-align: center;
    }
</style>
<body>
    <div class="w3-container w3-blue">
        <h1 class="w3-h1"><center>HASIL PROSES PENJUALAN</center></h1>
    </div>
    <div class="w3-container isi-web">
        <div class="w3-card-2 w3-border card-holder">
        <table style="margin: 20px;"><hr>
                    <tr>
                        <td><label>Nama Pembeli</label></td>
                        <td><label>:</label></td>
                        <td colspan="4"><?php 
                        echo $nama_pembeli."<br>";
                        ?></td>
                    </tr>
                    <tr>
                        <td><label>Merk Laptop</label></td>
                        <td><label>:</label></td>
                        <td><?php 
                        echo $merk_laptop . "<br>";
                        ?></td>
                        <td><label>Jumlah :</label></td>
                        <td><?php 
                        echo $jumlah . "<br>";
                        ?></td>
                    </tr>
                    <tr>
                        <td>Total Harga Laptop</td>
                        <td>:</td>
                        <td><?php 
                        $total_laptop = $harga_laptop * $jumlah;
                        echo format_rupiah($total_laptop) . "<br>"; ?></td>
                    </tr>
                    <tr>
                        <td colspan="5">-----------------------------------------------------------------------------------</td>
                    </tr>
                    <tr>
                        <td>Aksesoris Tambahan</td>
                        <td>:</td>
                        <td><?php 
                        if (isset($aksesoris)) {
                            foreach ($aksesoris as $aksesori) {
                              if ($aksesori == "vga") {
                                echo "VGA ---- JUMLAH : " . $vga_jumlah . "<br>";
                              }
                              if ($aksesori == "psu") {
                                echo "PSU ---- JUMLAH : " . $psu_jumlah . "<br>";
                              }
                              if ($aksesori == "ram") {
                                echo "RAM ---- JUMLAH : " . $ram_jumlah . "<br>";
                              }
                            }
                          }
                        ?></td>
                    </tr>
                    <tr>
                        <td>Total Harga Aksesoris</td>
                        <td>:</td>
                        <td>
                            <?php 
                            echo format_rupiah($total_aksesoris) . "<br>";
                            ?>
                        </td>
                    </tr>
                </table><hr><br>
                <table style="border: 1px solid aqua; padding: 8px;" class="isi-web">
                    <tr>
                        <td>
                            Total Yang Harus Dibayar
                        </td>
                        <td>:</td>
                        <td style="padding-left: 80px; font-size: 20px;">
                            <?php
                            echo format_rupiah($jumlahKeseluruhan);
                            ?>
                        </td>
                    </tr>
                </table>
        </div>
    </div>

</body>
</html>