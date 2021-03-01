<?php
include "koneksi.php";
$kode = isset($_POST["kode"]) ? $_POST["kode"] : "";
$nama = isset($_POST["nama"]) ? $_POST["nama"] : "";
$harga = isset($_POST["harga"]) ? $_POST["harga"] : "";
$simpan = isset($_POST["simpan"]) ? $_POST["simpan"] : "";
if ($simpan AND $kode != "" AND $nama != "" AND $harga != "")
{
    $file_name = $_FILES['foto']['name'];
    $file_temp = $_FILES['foto']['tmp_name'];
    $allowed_ext = array("jpg", "jpeg", "gif", "png");
    $exp = explode(".", $file_name);
    $ext = end($exp);
    $path = "foto/".$file_name;
    if(in_array($ext, $allowed_ext)){
      if(move_uploaded_file($file_temp, $path)){
  try{
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $query = $conn->prepare("INSERT INTO barang (kode_barang, nama_barang, harga_satuan, foto) VALUES (:kode, :nama, :harga, :file_name)");
  $query->bindParam(":kode", $kode);
  $query->bindParam(":nama", $nama);
  $query->bindParam(":harga", $harga);
  $query->bindParam(":file_name", $file_name);
 if ($query->execute())
 {
 echo "<script>alert('Data berhasil disimpan')</script>";
 }
 else
 {
 echo "<script>alert('Data gagal disimpan')</script>";
 }
}
catch(PDOExcaption $e){
  echo $e->getMessage();
}
}
}
}
?>
<style type="text/css">
 .btn{
    background-color: #32CD32;
    color: #ffffff;
    width: 6rem;
    font-weight: bold;
  }
  .btn:hover{
    background-color: #ffffff;
    border: 2px solid #32CD32;
    color: #32CD32;
  }
</style>
<div class="container">
  <div class="my-5">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header text-center text-white" style="background-color: #F08080; height: 45px">
              <h5 class="font-monospace fw-bold fs-4"> INPUT DATA BARANG </h5></div>
              <div class="card-body bg-light">
                <form action="?page=input" method="post" enctype="multipart/form-data">
                    <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Kode Barang</label>
                    <div class="col-sm-10">
                    <input type="text" name="kode" class="form-control" placeholder="Kode Barang">
                    </div>
                    </div>
                    <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Nama Barang </label>
                    <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" placeholder="Nama Barang">
                    </div>
                    </div>
                    <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Harga Satuan</label>
                    <div class="col-sm-10">
                    <input type="text" name="harga" class="form-control" placeholder="Harga Satuan">
                    </div>
                    </div>
                    <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                    <input type="file" name="foto" class="form-control">
                    </div>
                    </div>
                    <br />
                    <div class="col-md-3">
                    <button type="submit" name="simpan" value="Simpan" class="btn">Simpan</button>
                    </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
