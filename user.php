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
        }
    }
?>
<?php 
    require 'admin/functions.php';
    
    $query = '';
    if (isset($_GET['schedule'])) {
        $wisatawan = $fetch_info['name'];
        $query = "SELECT * FROM order_t AS o LEFT JOIN schedule_t AS s ON o.schedule_id = s.schedule_id WHERE o.schedule_id = {$_GET['schedule']}";
    } else {
        $wisatawan = $fetch_info['email'];
        $query = "SELECT * FROM order_t AS o LEFT JOIN schedule_t AS s ON o.schedule_id = s.schedule_id WHERE email_wstwn = '$wisatawan'";
    }

    $querySchedule = "SELECT * FROM schedule_t";

    $order = select($query);
    $schedule = select($querySchedule);
    $i = 1;
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
    
        .th-tablee{
            text-align:center;
            font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif;
            background-color:#232323;
            color:lightblue;
            font-size: 19px;
        }
        .tr-tablee{
            font-size:18px;
            background-color:white;
        }
    </style>


</head>

<body id="page-top" class="index" >


    <!-- Navigation -->
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
                            <a class="page-scroll" href="payment.php#payment" style="text-align : center;">Payment</a>
                        <?php }elseif($level == '10'){?>
                            <a class="page-scroll" href="payment.php#payment" style="text-align : center;">Payment</a>
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
        <br><br><br><br><br>
    <div class="container" style="background-color:lightblue; width:90%;padding:10px;padding-top:2px;border-radius:20px;box-shadow: 5px 5px 15px black;">
        <table class="table table-bordered table-success table-striped" style="width:97%; border-radius:10px; box-shadow: 5px 5px 15px;" align="center">
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
          <h3 style="text-align: center; color:#232323" class="display-5 animate__animated animate__fadeInDown">Order Information</h3>
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
                    <a href="payment.php?order_id=<?= $ord['order_id'] ?>"style="text-decoration:none; color : black ">Update</a> |
                    <a href="admin/delete.php?type=order&id=<?= $ord['order_id'] ?>" onclick="return confirm('Anda yakin ingin hapus data ini?')" style="text-decoration:none; color : red ">Delete</a>
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
    </nav>



    <!-- FOOTER Section -->


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"> </script>
</body>

</html>
