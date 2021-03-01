<?php
include "koneksi.php";

$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";
$kode = isset($_POST["kode"]) ? $_POST["kode"] : "";
$nama = isset($_POST["nama"]) ? $_POST["nama"] : "";
$harga = isset($_POST["harga"]) ? $_POST["harga"] : "";
$simpan = isset($_POST["simpan"]) ? $_POST["simpan"] : "";
if ($simpan AND $id != "" AND $kode != "" AND $nama != "" AND $harga != "")
{
	
 try {
 
  $query = $conn->prepare("UPDATE barang SET kode_barang=:kode, nama_barang=:nama, harga_satuan=:harga WHERE id_barang=:id");
  	$query->bindParam(":id", $id);
    $query->bindParam(":kode", $kode);
    $query->bindParam(":nama", $nama);
    $query->bindParam(":harga", $harga);
  if($query->execute()){
    echo "<script>alert('Data Berhasil Di Perbaharui')</script>";
  } else {
    echo "<script>alert('Gagal Perbaharui Data')</script>";
  }
}catch(PDOException $e){
	echo $e->getMessage();
}
}

/** Proses memilih data */
if ($id != "")
{
	try{
	 $query = $conn->prepare("SELECT * FROM barang WHERE id_barang=:id");
	 $query->bindParam(":id", $id);
	 $query->execute();
	 $data = $query->fetch(PDO::FETCH_OBJ);
	}
	catch(PDOException $e){
		echo $e->getMessage();
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
 					<div class="card-header text-center text-white" style="background-color: #F4A460; height: 45px">
              			<h5 class="font-monospace fw-bold fs-4"> EDIT DATA BARANG</h5></div>
              			<div class="card-body bg-light">
							<form action="?page=edit" method="post">
							<input type="hidden" name="id" value="<?php echo $id; ?>">
		                    <div class="mb-3 row">
		                    <label class="col-sm-2 col-form-label">Kode barang</label>
		                    <div class="col-sm-10">
		                    <input type="text" name="kode" class="form-control" placeholder="Kode Barang" value="<?php echo $data->kode_barang; ?>" required>
		                    </div>
		                    </div>
		                    <div class="mb-3 row">
		                    <label class="col-sm-2 col-form-label">Nama Barang</label>
		                    <div class="col-sm-10">
		                    <input type="text" name="nama" class="form-control" placeholder="Nama Barang" value="<?php echo $data->nama_barang; ?>" required>
		                    </div>
		                    </div>
		                     <div class="mb-3 row">
		                    <label class="col-sm-2 col-form-label">Harga Satuan</label>
		                    <div class="col-sm-10">
		                    <input type="text" name="harga" class="form-control" placeholder="Harga Satuan" value="<?php echo $data->harga_satuan; ?>" required>
		                    </div>
		                    </div>
		                    <div class="mb-3 row">
		                    <label class="col-sm-2 col-form-label">Gambar</label>
		                    <div class="col-sm-10">
		                    <input type="file" name="foto" class="form-control">
		                    </div>
		                    </div>
		                    
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