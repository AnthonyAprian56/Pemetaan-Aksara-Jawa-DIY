<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>DIGHUM 8</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/map.css">
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKH2F9gZMQyATwBodQsEr-uM0fokVCvZw&callback=initMap"></script>

</head>
<body>
<nav class="navbar navbar-inverse">
   <div class="container-fluid">

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Peta</a></li>
        <li class="active"><a href="tabel.php">Tabel Lokasi</a></li>
        </ul>
     </div>
  </div>
</nav>

<div class="container-fluid">
<div class="row">
<div>   
    <div class>
        <div class="table-responsive overflow-x:auto;">
        <table class="table table-bordered table-hover" style="font-size:12px;">

                <thead class="thead" style="background-color: #A8DAF8">
                <tr>
                <th style="text-align:center">No</th>
                <th style="text-align:center">Institusi</th>
                <th style="text-align:center">Jenis Manuskrip</th>
                <th style="text-align:center">Judul</th>
                <th style="text-align:center">Bentuk</th>
                <th style="text-align:center">Alamat</th>
                <th style="text-align:center">Latitude</th>
                <th style="text-align:center">Longitude</th>
                </tr>
                </thead>


            <tbody>
                <?php
                $tampil=mysqli_query($conn,"SELECT * FROM tabel_lokasi");
                while($datatampil=mysqli_fetch_assoc($tampil)){
                echo "<tr>";
                echo "<td>".mystripslashes($datatampil['id_lokasi'])."</td>";
                echo "<td>".mystripslashes($datatampil['nama_institusi'])."</td>";
                echo "<td>".mystripslashes($datatampil['jenis_manuscript'])."</td>";
                echo "<td>".mystripslashes($datatampil['judul_manuscript'])."</td>";
                echo "<td>".mystripslashes($datatampil['bentuk_manuscript'])."</td>";
                echo "<td>".mystripslashes($datatampil['alamat'])."</td>";
                echo "<td>".$datatampil['lat']."</td>";
                echo "<td>".$datatampil['lng']."</td>";
                echo "<td class='text-center'><a href='#modal-edit' data-id='$datatampil[id_lokasi]' data-toggle='modal'></a></td>";
                echo "</tr>";
                }
                ?>
            </tbody>
         </table>
         </div>
        
     </div>

  </body>
</html>