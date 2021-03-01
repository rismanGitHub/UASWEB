<?php 
  session_start();
  $page = isset($_GET["page"]) ? $_GET["page"] : "beranda";
  if ($page == "logout"){
    unset($_SESSION["pengguna"]);
    header("Location: ?page=beranda");
  }
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Informasi Akademik</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #008B8B;">
  <div class="container-fluid">
    <a class="navbar-brand" href="?page=beranda">IMANK CELL</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item active">
          <a class="nav-link" aria-current="page" href="?page=beranda">Beranda</a>
        </li>
          <li class="nav-item">
          <a class="nav-link active" href="?page=katalog">Katalog</a>
        </li>
         <?php 
          if (isset($_SESSION["pengguna"])){
        ?>
          <li class="nav-item">
          <a class="nav-link active" href="?page=input">Input Data</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="?page=logout">Logout</a>
        </li>
        <?php 
          } else {
         ?>
         <li class="nav-item">
          <a class="nav-link active" href="?page=login">Login</a>
        </li>
        <?php 
          }
        ?>
      </ul>
    </div>
  </div>
</nav>
  <?php
  include "koneksi.php";
  $page = isset($_GET["page"]) ? $_GET["page"] : "beranda"; 
    switch ($page) {
      case "login":
        include "login.php";
        break;
      case "input":
        include "input.php";
        break;
      case "edit":
        include "edit.php";
        break;
      case "katalog":
        include "katalog.php";
        break;
      default:
       include "beranda.php";
        break;
    }
  ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>