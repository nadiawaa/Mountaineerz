<?php 
    require 'admin/functions.php';

    if (isset($_GET['order_id'])) {
        $order = select("SELECT * FROM order_t AS o INNER JOIN schedule_t AS s ON o.schedule_id = s.schedule_id WHERE o.order_id = {$_GET['order_id']}")[0];
    }

    $schedule_data = select("SELECT schedule_id, nama_wisata FROM schedule_t");

    if (isset($_POST['save'])) {
        if (insert($_POST, 'order') > 0) {
            echo "<script> alert('Success'); document.location.href = 'user.php' </script>";
        }
    } else if (isset($_POST['change'])) {
        if (update($_POST, 'order') > 0) {
            echo "<script> alert('Success'); document.location.href = 'user.php' </script>";
        }
    }
?>
<?php require_once "userverify/controllerUserData.php"; ?>
<?php
    $email = isset($_SESSION['email'])? $_SESSION['email']:'';
    $email = !empty($_SESSION['email']) ? $_SESSION['email'] : '';
    $password = isset($_SESSION['password'])? $_SESSION['password']:'';
    $password = !empty($_SESSION['password']) ? $_SESSION['password'] : '';
    $level = isset($_SESSION['level'])? $_SESSION['level']:'3';
    $level = !empty($_SESSION['level']) ? $_SESSION['level'] : '3';
    $verif = isset($_SESSION['status'])? $_SESSION['status']:'';
    if($email != false && $password != false){
        $sql = "SELECT * FROM usertable WHERE email = '$email'";
        $run_Sql = mysqli_query($con, $sql);
        if($run_Sql){
            $fetch_info = mysqli_fetch_assoc($run_Sql);
            $status = $fetch_info['status'];
            $code = $fetch_info['code'];
            $level = $fetch_info['level'];
            if($code != 0){
                header('Location: index.php');
            }
        }
    }
?>

 

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mountaineerz</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/mnticon.webp">
    
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="imageslider.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        window.onload = function() { jam(); }

        function jam() {
        var e = document.getElementById('jam'),
        d = new Date(), h, m, s;
        h = d.getHours();
        m = set(d.getMinutes());
        s = set(d.getSeconds());

        e.innerHTML ='GMT+7 | ' + h +':'+ m +':'+ s;

        setTimeout('jam()', 1000);
        }

        function set(e) {
        e = e < 10 ? '0'+ e : e;
        return e;
        }
    </script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();   
        });
    </script>

    <style>
        .form-control{
            color:5e6472;
            font-size:20px; 
            padding :20px; 
            background-color:transparent;
            border : 4px solid;
            border-radius:12px;
            box-shadow: 5px 5px 15px;
            font-family: Montserrat,Helvetica Neue,Helvetica,Arial,sans-serif;
        }
        .form-label{
            color: #5e6472; 
            font-size: 24px;
            font-family: Montserrat,Helvetica Neue,Helvetica,Arial,sans-serif;

        }
    </style>

</head>
  <body id="page-top" style="background-color: #293241;">
  <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="index.php" style="left :320px;position : fixed">Mountaineerz</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="index.php#services">Services</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.php#team">Team</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="explore.php#goexplore">Go Explore</a>
                    </li>
                    <li>
                        <?php if($level == '1'){?>
                            <a class="page-scroll" href="#payment" style="text-align : center;">Payment</a>
                        <?php }elseif($level == '10'){?>
                            <a class="page-scroll" href="#payment" style="text-align : center;">Payment</a>
                        <?php }elseif($level == '3'){?>
                            <a href="#" class="page-scroll" data-toggle="popover" data-trigger="focus" data-content="Please Login First" data-placement="bottom">Payment</a>
                        <?php }?>
                    </li>
                    <li>  
                        <?php if($level == '1'){?>
                                <div class="dropdown" style ="margin-top : 5px;left :50px">
                                    <button class="btn btn-warning dropdown-toggle dropdown-toggle-split" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style ="border : 0px; align:center;background-color : #f6bf01; font-size:17px; font-family:  Montserrat,'Helvetica Neue',Helvetica,Arial,sans-serif;">
                                        Hai, <?php echo $fetch_info['name']; ?> !
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu2"style ="color : blue; text-align : center; background-color : #222;">
                                        <br>
                                        <a class="dropdown-item" href="user.php" style = " text-decoration : none; border:1px solid;padding :9px;padding-left:19px;padding-right:19px;border-radius:4px;background-color:black">Profile</a><br><br><br>
                                        <a class="dropdown-item" href="userverify/logout-user.php" style = " text-decoration : none; border:1px solid;padding :9px;padding-left:19px;padding-right:19px;border-radius:4px;background-color:black">Logout</a><br><br>
                                    </div>
                                </div>
                            <?php } elseif($level == '10'){?>
                                <li>
                                    <a class="page-scroll" href="admin/index.php"style ="border : 0px; align:center;background-color : #f6bf0100; font-size:18px; font-family:  Montserrat,'Helvetica Neue',Helvetica,Arial,sans-serif; border-radius : 7px;left:60px;margin-top:-2px">Admin Mode</a>
                                </li>
                            <?php } else{?>
                                <li>
                                    <a class="page-scroll" href="userverify/login-user.php"style ="border : 0px; align:center;background-color : #f6bf0100; font-size:18px; font-family:  Montserrat,'Helvetica Neue',Helvetica,Arial,sans-serif;border-radius : 7px;left:60px;margin-top:-2px">Login</a>
                                </li>
                            <?php }?>
                    </li>
                    <li>
                        <a class="page-scroll" id="jam" style="text-align : center;position : fixed; left :100px; font-size:17px;
                        user-select:none;
                        -moz-user-select:none;
                        -ms-user-select:none;
                        -khtml-user-select:none;
                        -webkit-user-select:none"></a>
                    </li>
                </ul>
            </div>
            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <div class="head"></div>
    <section id="payment">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                <div class="display-5 fw-bolder animate__animated animate__fadeInDown">
                    <h2 class="section-heading" style="color: lightblue">Payment</h2>
                </div>
                </div>
            </div>
        </div>
    </div>
    </header>
    
      <div class="container">
        <h1 style="text-align: center; color :#f7f7f7" class="display-5 animate__animated animate__fadeInDown" style="text-align: center;"><?= isset($schedule) ? 'Change Data' : 'Add' ?> Destination</h1>
        <br><br>
        <form action="" method="POST" style="background-color:lightblue; padding :50px; margin:10px; border-radius:19px;box-shadow: 5px 10px 15px ;">
          <div class="form-group">
            <label for="nama_wstwn" class="form-label">Name</label>
            <input type="text" style="background-color:transparent" class="form-control" id="nama_wstwn" name="nama_wstwn" 
            <?php if($level != 10){?>
                value="<?= $fetch_info['name'] ?? '' ?>" readonly
            <?php } else {?>
                value="<?= $order['nama_wstwn'] ?? '' ?>" required>
            <?php } ?>
          </div>
          <br>
            <div class="form-group">
              <label for="email_wstwn" class="form-label">Email</label>
              <input type="email" style="background-color:transparent" class="form-control" id="email_wstwn" name="email_wstwn"  
              <?php if($level != 10){?>
                value="<?= $fetch_info['email'] ?? '' ?>" readonly
              <?php } else {?>
                value="<?= $order['email_wstwn'] ?? '' ?>"required>
              <?php } ?>
            </div>
            <br>
            <div class="form-group">
              <label for="nohp_wstwn" class="form-label">Phone Number</label>
              <input type="number"  class="form-control" id="nohp_wstwn" name="nohp_wstwn" placeholder="Phone Number"  required value="<?= $order['nohp_wstwn'] ?? '' ?>">
            </div>
            <br>
            <div class="form-group">
              <label for="jmlh_wstwn" class="form-label">Order Quantity</label>
              <input type="number" min="1" max="10" style = "width : 30%" class="form-control" id="jmlh_wstwn" name="jmlh_wstwn" placeholder="Jumlah Pemesanan" required value="<?= $order['jmlh_wstwn'] ?? '' ?>">
            </div>
            <br>
            <div class="form-group">
              <label for="destination" class="form-label">Destination</label>
            <br>
            <div class="col-75">
                    <select class="form-select" id="schedule" name="schedule" required style="color:#5e6472;font-size:20px; padding :10px; background-color:transparent;border : 4px solid;border-radius:12px;box-shadow: 5px 5px 15px; width : 30%">
                        <option value="<?= $order['schedule_id'] ?? '' ?>" disabled selected class="form-control"><?= $order['nama_wisata'] ?? 'Select a Destination' ?></option>
                        <?php foreach ($schedule_data as $schedule) : ?>
                            <option value="<?= $schedule['schedule_id'] ?>" style= "color:black" ><?= $schedule['nama_wisata'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
          <br>
            <input type="hidden" name="order_id" id="order_id" value="<?= isset($order) ? $order['order_id'] : '' ?>">
            <input type="hidden" name="schedule_update" id="schedule" value="<?= isset($order) ? $order['schedule_id'] : '' ?>">
            <div class="container">
            <div class="col col-lg-2">
                <input type="submit" style="padding : 10px;padding-left:25px;padding-right:25px;border-radius: 4px ;background-color:#DEEDF0;box-shadow: 5px 5px 15px;text-size:15px;" value="Submit" name="<?= isset($order) ? 'change' : 'save' ?>">
            </div>
            </div>
        </form>
      </div>
    </nav>
  </body>
</html>