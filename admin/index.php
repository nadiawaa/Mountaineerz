<?php require_once "../userverify/controllerUserData.php"; ?>
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
                header('Location: ../index.php');
            }
        }
    }else{
        header('Location: ../index.php');
    }
?>
<?php 
    require 'functions.php';

    $query = '';
    if (isset($_GET['schedule'])) {
        $query = "SELECT * FROM order_t AS o LEFT JOIN schedule_t AS s ON o.schedule_id = s.schedule_id WHERE o.schedule_id = {$_GET['schedule']}";
    } else {
        $query = "SELECT * FROM order_t AS o LEFT JOIN schedule_t AS s ON o.schedule_id = s.schedule_id";
    }

    $querySchedule = "SELECT * FROM schedule_t";

    $order = select($query);
    $schedule = select($querySchedule);
    $i = 1;
?>

<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="shortcut icon" href="../img/mnticon.webp">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>    
      <title>Admin</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

      <style>
  .carousel-inner img {
    width: 1700px;
    height: 1000px;
    float: center;
  }
  html,body{
    background-image: url(https://cdn.pixabay.com/photo/2016/01/19/17/47/mountain-1149897_1280.jpg);
    background-repeat: no-repeat;
    background-size: 150%;
    background-color: rgba(255, 255, 255, 0.4);
}
  </style>
  </head>

  <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
          <div class="container-fluid">
            <a class="navbar-brand" href="../index.php"style="margin-left:50px;">Home Mountaineerz</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                      <a class="nav-link" href="schedule/index.php">Insert Destination</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="../userverify/logout-user.php"style="margin-left:50px; margin-right:50px;color:red">Logout</a>
                  </li>
              </ul>
              <!--<form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button cla ss="btn btn-outline-success" type="submit">Search</button>
              </form>-->
            </div>
          </div> 
      </nav>
        <br><br><br><br><br>
    <div align="center" class="container" style="background-color:#3e5c76; width:90%;padding:10px;padding-top:2px;border-radius:20px;box-shadow: 5px 5px 15px white;float:right;position:relative">
        <table class="table table-bordered table-success table-striped" style="width:97%; border-radius:10px; box-shadow: 5px 5px 15px;position:relative" align="center">
          <thead>
            <tr class="table-dark" style="text-align : center">
              <th class = "th-tablee" >No</th>
              <th class = "th-tablee">Name</th>
              <th class = "th-tablee">Email</th>
              <th class = "th-tablee">Phone Number</th>
              <th class = "th-tablee">Destination</th>
              <th class = "th-tablee">Date</th>
              <th class = "th-tablee">Harga</th>
              <th class = "th-tablee">Jumlah</th>
              <th class = "th-tablee">Total</th>
              <th class = "th-tablee">Action</th>
            </tr>
          </thead>
          <br><br>
          <h3 style="text-align: center; color:white" class="display-5 animate__animated animate__fadeInDown">Order Information</h3>
          <tbody>
            <?php 
                if (!empty($order)) :
                foreach ($order as $ord) : 
            ?>
            <tr>
                <td style="text-align : center" class="tr-tablee"><?= $i ?></td>
                <td style="text-align : center" class="tr-tablee"><?= $ord['nama_wstwn'] ?></td>
                <td style="text-align : center" class="tr-tablee"><?= $ord['email_wstwn'] ?></td>
                <td style="text-align : center" class="tr-tablee"><?= $ord['nohp_wstwn'] ?></td>
                <td style="text-align : center" class="tr-tablee"><?= $ord['nama_wisata'] ?: '-' ?></td>
                <td style="text-align : center" class="tr-tablee"><?= $ord['tanggal_wisata'] ?: '-' ?></td>
                <td style="text-align : center" class="tr-tablee">
                <?php 
                $angka = $ord['harga_wisata'];
                $angka_jadi = number_format($angka,0,"",".");
                ?>
                <span style="color:green">Rp. </span><?= $angka_jadi ?: '-' ?></td>
                <td style="text-align : center" class="tr-tablee"><?= $ord['jmlh_wstwn'] ?: '-' ?> <span style="color:red">Orang</span></td>
                <td style="text-align : center" class="tr-tablee">
                <?php 
                $harga = $ord['harga_wisata'];
                $ttl_org = $ord['jmlh_wstwn'];
                $total = $harga*$ttl_org;
                $angka_jadi_total = number_format($total,0,"",".");
                ?>
                <span style="color:green">Rp. </span><?= $angka_jadi_total ?: '-' ?> </td>
                <td style="text-align : center"class="tr-tablee">
                    <a href="../payment.php?order_id=<?= $ord['order_id'] ?>"style="text-decoration:none; color : black ">Update</a> |
                    <a href="delete.php?type=order&id=<?= $ord['order_id'] ?>" onclick="return confirm('Anda yakin ingin hapus data ini?')" style="text-decoration:none; color : red ">Delete</a>
                </td>
            </tr>
            <?php 
                $i++;
                endforeach; 
                else:
            ?>
            <tr>
                <td colspan="7" style="text-align: center;">There is no Order. Please order first on Payment Menu.</td>
            </tr>
            <?php endif; ?>
        </tbody>
        <div class="container-md">
            <div class="col col-lg-2">

            </div>
          </div>
          <br>
        </table>
        </div>
      <footer class="mt-auto text-white-50 border-top">
        <p class="text-white">by.  Prahasditya  	&bull;  Nadia Wartiningrum  	&bull;  Kikisan Mala Suryani Putri  	&bull;  M. Arif Husaini</p>
      </footer>
  </body>
</html>