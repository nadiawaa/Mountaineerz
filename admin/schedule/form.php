<?php
    require '../functions.php';

    if (isset($_GET['schedule_id'])) {
        $schedule = select("SELECT * FROM schedule_t WHERE schedule_id = {$_GET['schedule_id']}")[0];
    }

    if (isset($_POST['save'])) {
        if (insert($_POST, 'schedule') > 0) {
            echo "<script> alert('Success'); document.location.href = 'index.php' </script>";
        }
    } else if (isset($_POST['change'])) {
        if (update($_POST, 'schedule') > 0) {
            echo "<script> alert('Success'); document.location.href = 'index.php' </script>";
        }
    }
?>
<?php require_once "../../userverify/controllerUserData.php"; ?>
<?php 
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    if($email != false && $password != false){
        $sql = "SELECT * FROM usertable WHERE email = '$email'";
        $run_Sql = mysqli_query($con, $sql);
        if($run_Sql){
            $fetch_info = mysqli_fetch_assoc($run_Sql);
            $status = $fetch_info['status'];
            $code = $fetch_info['code'];
            $level =$fetch_info['level'];
            if($level != 10){
                header('Location: ../../index.php');
            }
        }
    }else{
        header('Location: ../../index.php');
    }
?>
 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="shortcut icon" href="../../img/mnticon.webp">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="style.css">
      <title>Admin</title>
  </head>
  <body id="page-top" style="background-color: #293241;">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
          <div class="container-fluid">
            <a class="navbar-brand" href="../index.php" style="margin-left:50px;">Home</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                      <a class="nav-link" href="../schedule/index.php" style = "color : burlywood;margin-right:50px">Explore</a>
                  </li>
              </ul>
              <!--<form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button cla ss="btn btn-outline-success" type="submit">Search</button>
              </form>-->
            </div>
          </div> 
      </nav>     
  </div>

      <br><br><a class="btn btn-dark btn-lg btn-outline-light" href="index.php" role="button" style="right: 100px;"><</a>
      <div class="container">
        <h3 style="text-align: center; color :#FCA311" class="display-5 animate__animated animate__fadeInDown"><?= isset($schedule) ? 'Change Data' : 'Add' ?>Destination</h3>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="schedule" style="color: white; font-size: 20px;">Nama Wisata</label>
            <input type="text" class="form-control" id="nama_wisata" name="nama_wisata" placeholder="Add the Destination" required value="<?= $schedule['nama_wisata'] ?? '' ?>">
          </div>
          <br>
          <div class="form-group">
            <label for="schedule" style="color: white; font-size: 20px;">Kesulitan</label>
            <input type="text" class="form-control" id="kesulitan" name="kesulitan" placeholder="Add the Level" required value="<?= $schedule['kesulitan'] ?? '' ?>">
          </div>
          <br>
          <div class="form-group">
            <label for="schedule" style="color: white; font-size: 20px;">Lokasi Wisata</label>
            <input type="text" class="form-control" id="lokasi_wisata" name="lokasi_wisata" placeholder="Add the Location" required value="<?= $schedule['lokasi_wisata'] ?? '' ?>">
          </div>
          <br>
          <div class="form-group">
            <label for="schedule" style="color: white; font-size: 20px;">Harga</label>
            <input type="text" class="form-control" id="harga_wisata" name="harga_wisata" placeholder="Add the Price" required value="<?= $schedule['harga_wisata'] ?? '' ?>">
          </div>
          <br>
          <div class="form-group">
            <label for="schedule" style="color: white; font-size: 20px;">Narahubung</label>
            <input type="text" class="form-control" id="narahubung" name="narahubung" placeholder="Add the Contact Person" required value="<?= $schedule['narahubung'] ?? '' ?>">
          </div>
          <br>
          <div class="col-md-6" >
            <div class="form-group">
              <label for="flight_no"style="color: white; font-size: 20px;">Tanggal</label>
              <input type="date" class="form-control" id="tanggal_wisata" name="tanggal_wisata" required value="<?= $schedule['tanggal_wisata'] ?? '' ?>">
            </div>
          </div>
          <br>
          <div class="col-md-6" >
            <div class="form-group">
              <label for="flight_no"style="color: white; font-size: 20px;">Gambar</label>
              <input type="file" class="form-control" id="gambar_wisata" name="gambar_wisata" value="<?= $schedule['gambar_wisata'] ?? '' ?>">
              <i style="float:left; font-size : 11px; color:red">Abaikan jika tidak ingin mengganti gambar</i>
            </div>
          </div>
          <br>
          <input type="hidden" name="schedule_id" id="schedule_id" value="<?= isset($schedule) ? $schedule['schedule_id'] : '' ?>">
            <div class="container">
            <div class="col col-lg-2">
                <input type="submit" style="border-radius: 5px ;background-color:#B2B2B2; float:right" value="Submit" name="<?= isset($schedule) ? 'change' : 'save' ?>">
            </div>
            </div>
        </form>
      </div>
    </nav>
  </body>
</html>