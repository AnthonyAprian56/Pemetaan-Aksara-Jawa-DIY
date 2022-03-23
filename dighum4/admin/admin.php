<?php
include "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="custom.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKH2F9gZMQyATwBodQsEr-uM0fokVCvZw&callback=initMap"></script>  
</head>
<body>
<nav class="navbar navbar-inverse">
   <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class><a href="index_admin.php">Peta</a></li>
        <li class="active"><a href="admin.php">Tabel Lokasi</a></li>
        </ul>
     </div>
  </div>
</nav>

<div class="container-fluid">
<div class="row">

<?php
//Menambah Data
if(isset($_POST['save'])){
    $nama_institusi=myaddslashes($_POST['nama']);
    $jenis_manuscript=myaddslashes($_POST['jenis']);
    $judul_manuscript=myaddslashes($_POST['judul']);
    $bentuk_manuscript=myaddslashes($_POST['bentuk']);
    $alamat=myaddslashes($_POST['alamat']);
    $lat=myaddslashes($_POST['lat']);
    $lng=myaddslashes($_POST['lng']);
$save=mysqli_query($conn,"INSERT INTO tabel_lokasi VALUES ('','$nama_institusi','$jenis_manuscript','$judul_manuscript','$bentuk_manuscript','$alamat','$lat','$lng')");
if($save){
echo "<p class='alert alert-success'>Data Telah Berhasil Di Simpan</p>";
}else{
echo "<p class='alert alert-success'>Data Gagal Di Simpan</p>";
}
echo "<script>'admin.php'</script>";
}   
?>

<?php
//Update Data
if(isset($_POST['update'])){
    $nama_institusi=myaddslashes($_POST['nama']);
    $jenis_manuscript=myaddslashes($_POST['jenis']);
    $judul_manuscript=myaddslashes($_POST['judul']);
    $bentuk_manuscript=myaddslashes($_POST['bentuk']);
    $alamat=myaddslashes($_POST['alamat']);
    $lat=myaddslashes($_POST['lat']);
    $lng=myaddslashes($_POST['lng']);
    mysqli_query($conn,"UPDATE tabel_lokasi SET nama='$nama_institusi',jenis='$jenis_manuscript',judul='$judul_manuscript',bentuk='$bentuk_manuscript',alamat='$alamat', lat='$lat', lng='$lng' WHERE id_lokasi='".$_POST['id_lokasi']."'") or die (mysqli_error());
    echo "<script>'admin.php'</script>";
}
?>


<?php
//Hapus Data
    if(isset($_GET['hapus'])){
    $id=$_GET['hapus'];
    mysqli_query($conn,"DELETE FROM tabel_lokasi WHERE id_lokasi='$id'");
    echo "<script>'admin.php'</script>";
}?>



    <div class="panel-body">
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
                <th></th>
                <td class='text-center'><a class="btn btn-primary" data-target='#modal-add' data-toggle='modal'><i class="fa fa-plus-circle"></a></td>
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
                echo "<td class='text-center'><a href='#modal-edit' data-id='$datatampil[id_lokasi]' data-toggle='modal'><i class='fa fa-pencil-square'></i></a>
                <a href='?hapus=$datatampil[id_lokasi]'><i class='fa fa-trash'></i></a></td>";
                echo "</tr>";
                }
                ?>
            </tbody>
         </table>
         </div>
        
     </div>
</div>


 <div id="modal-edit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-pencil-square"></i>Update Data</h4>
      </div>
      <div class="modal-body">
        
        <form method="POST" action="">
       <div class="form-group">
           <label for="nama">Nama Institusi</label>
           <input type="text" name="nama" class="form-control" id="nama" placeholder="$nama_insitusi" required>
       </div>

       <div class="form-group">
           <label for="nama">Jenis Manuskrip</label>
           <input type="text" name="jenis" class="form-control" id="jenis" placeholder="Jenis Manuskrip required>
       </div>
       <div class="form-group">
           <label for="nama">Judul Manuskrip</label>
           <input type="text" name="judul" class="form-control" id="judul" placeholder="Judul Manuskrip" required>
       </div>
       <div class="form-group">
           <label for="nama">Bentuk Manuskrip</label>
           <input type="text" name="bentuk" class="form-control" id="bentuk" placeholder="Bentuk Manuskrip" required>
       </div>
   
       <div class="form-group">
           <label for="alamat">Alamat</label>
           <textarea name="alamat" class="form-control" id="alamat" Placeholder="Alamat" required></textarea>
        </div>
       <div class="form-group">
           <label for="lat">Latitude</label>
           <input type="text" name="lat" class="form-control" id="lat" placeholder="Posisi Latitude" required>
       </div>
       <div class="form-group">
           <label for="lng">Longitude</label>
           <input type="text" name="lng" class="form-control" id="lng" placeholder="Posisi Longitude" required>
       </div>
       <hr>
       <button type="submit" name="update" class="btn btn-primary">Update Data</button>
       </form>

       </div>

     </div>

  </div>
</div>


<!-- Form Tambah Data -->
 <div id="modal-add" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Tambah Data</h4>
      </div>
      <div class="modal-body">
        
         <form method="POST" action="">
        <div class="form-group">
            <label for="nama">Nama Institusi</label>
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Institusi" required>
        </div>

        <div class="form-group">
            <label for="nama">Jenis Manuskrip</label>
            <input type="text" name="jenis" class="form-control" id="jenis" placeholder="Jenis Manuskrip required>
        </div>
        <div class="form-group">
            <label for="nama">Judul Manuskrip</label>
            <input type="text" name="judul" class="form-control" id="judul" placeholder="Judul Manuskrip" required>
        </div>
        <div class="form-group">
            <label for="nama">Bentuk Manuskrip</label>
            <input type="text" name="bentuk" class="form-control" id="bentuk" placeholder="Bentuk Manuskrip" required>
        </div>
    
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" class="form-control" id="alamat" Placeholder="Alamat" required></textarea>
         </div>
        <div class="form-group">
            <label for="lat">Latitude</label>
            <input type="text" name="lat" class="form-control" id="lat" placeholder="Posisi Latitude" required>
        </div>
        <div class="form-group">
            <label for="lng">Longitude</label>
            <input type="text" name="lng" class="form-control" id="lng" placeholder="Posisi Longitude" required>
        </div>
        <hr>
        <button type="submit" name="save" class="btn btn-primary">Simpan Data</button>
        </form>

        </div>
     </div>

  </div>
</div>




</div>

  </div>
 </div>

  </body>
</html>