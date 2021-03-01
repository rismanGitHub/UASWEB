<?php 
include "koneksi.php"; // panggil perintah koneksi database 

if(!isset($_SESSION["pengguna"] )== 0) { // cek session apakah kosong(belum login) maka alihkan ke index.php
    header("Location: index.php");
}

if(isset($_POST["login"])) { // mengecek apakah form variabelnya ada isinya
    $username = $_POST["username"]; // isi varibel dengan mengambil data username pada form
    $password = $_POST["password"]; // isi variabel dengan mengambil data password pada form

    try {
        $sql = "SELECT * FROM admin WHERE user = :username AND pass = :password"; // buat queri select
        $stmt = $conn->prepare($sql); 
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->execute(); // jalankan query

        $count = $stmt->rowCount(); // mengecek row
        if($count == 1) { // jika rownya ada 
            $_SESSION["pengguna"] = $username;
          header("Location: ?page=beranda");
            return;
        }else{
            echo "Anda tidak dapat login";
        }
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
}

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css" integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous"/>
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
  .card{
    background-color: #F5F5F5;
    border-radius: 8px;
  }
</style>
<div class="container">
  <div class="my-5">
    <div class="row justify-content-center">
      <div class="col-sm-5">
        <div class="card">
          <div class="card-header text-white text-center" style="background-color: #F08080; height: 50px">
          <h4 style="font-family: sans-serif"> Login your account</h4>
          </div>
            <div class="card-body text-dark">
              <form action="?page=login" method="post">
              <div class="my-3">
                <div class="row justify-content-center">
                <label class="col-sm-1 col-form-label"><i class="fas fa-user fa-2x"></i></label>
                <div class="col-sm-10">
                <div class="my-2">
                <input type="text" class="form-control form-control-md" name="username" placeholder="Username">
                </div>
                </div>
                </div>
                </div>
                <div class="row justify-content-center">
                <label class="col-sm-1 col-form-label"><i class="fas fa-lock fa-2x"></i></label>
                <div class="col-sm-10">
                <div class="my-1">
                <input type="password" class="form-control form-control-md" name="password" placeholder="Password">
                </div>
                </div>
                </div>
                <br />
                <div class="row justify-content-center">
                  <div class="col-md-3">
                  <button type="submit" name="login" value="Login" class="btn">Login</button>
                  </div>
                </div>
              </form>
          </div> 
        </div>
      </div>
    </div> 
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

