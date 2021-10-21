<?php 
    require '../functions.php';

    $schedule = select("SELECT s.schedule_id, s.nama_wisata, s.tanggal_wisata, s.kesulitan, s.lokasi_wisata, s.harga_wisata, s.narahubung, COUNT(o.schedule_id) AS ttl_order FROM schedule_t AS s LEFT JOIN order_t AS o ON s.schedule_id = o.schedule_id GROUP BY tanggal_wisata");
    $i = 1;
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
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="shortcut icon" href="../../img/mnticon.webp">
      <title>Admin</title>
    <style>
        html,body{
          background-image: url(https://cdn.pixabay.com/photo/2016/01/19/17/47/mountain-1149897_1280.jpg);
          background-repeat: no-repeat;
          background-size: 150%;
          background-color:rgba(255, 255, 255, 0.13), 0, 0);
        }
}
    </style>
  </head>
  <body id="page-top" style="background-color : #748cab;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <div class="container-fluid">
          <a class="navbar-brand" href="../index.php" style="margin-left:50px;">Home</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" style = "color : burlywood; margin-right:50px">Insert Destination</a>
                </li>
            </ul>
          </div>
        </div>
      </nav>
      <br><br><br>
      <div class="container">
        <table class="table table-bordered table-success table-striped shadow p-3 mb-5 bg-body rounded" style="border-radius: 10px;">
          <thead>
          <h3 style="text-align: center; color:#f0ebd8" class="display-5 animate__animated animate__fadeInDown">Explore</h3>
            <tr class="table-dark" style="text-align : center">
              <th style="text-align : center">No</th>
              <th>Nama Wisata</th>
              <th>Kesulitan</th>
              <th>Lokasi Wisata</th>
              <th>Harga</th>
              <th>Narahubung</th>
              <th>Tanggal Wisata</th>
              <th>Total Passengers</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($schedule as $kls): ?>
            <tr>
                <td style="text-align : center"><?= $i ?></td>
                <td style="text-align : center"><?= $kls['nama_wisata'] ?></td>
                <td style="text-align : center"><?= $kls['kesulitan'] ?></td>
                <td style="text-align : center"><?= $kls['lokasi_wisata'] ?></td>
                <td style="text-align : center">Rp. <?= $kls['harga_wisata'] ?></td>
                <td style="text-align : center"><?= $kls['narahubung'] ?></td>
                <td style="text-align : center"><?= $kls['tanggal_wisata'] ?></td>
                <td style="text-align : center"><?= $kls['ttl_order'] ?></td>
                <td style="text-align : center">
                    <a href="form.php?schedule_id=<?= $kls['schedule_id'] ?>"style="text-decoration:none; color : black ">Update</a> |
                    <a href="../delete.php?type=schedule&id=<?= $kls['schedule_id'] ?>" onclick="return confirm('Anda yakin ingin hapus data ini?')" style="text-decoration:none; color : red ">Delete</a>
                </td>
            </tr>
            <?php 
                $i++;
                endforeach; 
            ?>
        </tbody>
          <div class="container-md">
            <div class="col col-lg-2">
              <a href="form.php" class="nav-link" style="background-color:#686868  ; text-align : center; color : white; border-radius: 4px;">Add</a>
            </div>
          </div>
          <br>
        </table>
      </div>
  </body>
</html>