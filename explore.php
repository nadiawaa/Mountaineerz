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
            if($verif == "notverified"){
                header('Location: userverify/user-otp.php');
            }
        }
    }
?>
<?php 
    require 'admin/functions.php';

    $schedule = select("SELECT s.schedule_id, s.nama_wisata, s.tanggal_wisata, s.kesulitan, s.lokasi_wisata, s.harga_wisata, s.narahubung, s.gambar_wisata, COUNT(o.schedule_id) AS ttl_order FROM schedule_t AS s LEFT JOIN order_t AS o ON s.schedule_id = o.schedule_id GROUP BY tanggal_wisata");
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

    <title>Explore</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/mnticon.webp">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    

    <!-- Custom CSS -->
    <link href="css/explore.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Coiny' rel='stylesheet'>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
    <style>
        .explore{
            color :white;
            padding-bottom :100px;
            width : 90%;
            padding: 50px;
            color: lavender;
            line-height:38px;
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size: 20px;
        }
        .zoom:hover{
            transform:scale(1.1);
            z-index: 12;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();   
        });
    </script>

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
                        <a class="page-scroll" href="index.php#team">team</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#goexplore">Go Explore</a>
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

    <!-- Header -->
    <header>
    <div class="head"></div>
    <section id="goexplore">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                <div class="display-5 fw-bolder animate__animated animate__fadeInDown">
                    <br><br><br><br>
                    <h2 class="section-heading" style="color: lightblue">Explore</h2>
                    <h1 class="section-subheading text-muted" style="color: #f7f7f7">Where do you want to go?</h1>
                </div>
                </div>
            </div>
        </div>
    </div>
    </header>


    <!-- tabel -->
    <div class="isi">
        <div class="table">
            <table class="explore">
                <?php foreach ($schedule as $kls): ?>
                    <tr style="border: 50px solid transparent;" class="zoom">
                        <td style="text-align : center; color : transparent" rowspan="6"><?= $i ?></td>
                        <td style="
                        text-align : center;
                        background-size: auto;
                        height: 280px;
                        width: 500px;
                        padding-top: 250px;
                        font-family: 'Coiny'; 
                        font-size: 22px;
                        background: linear-gradient(rgba(0,0,0,0.50), rgba(0,0,0,0.10)),
                        url(admin/imgexplore/<?= $kls['gambar_wisata']?>);
                        image-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                        text-shadow: 2px 2px 5px black;
                        background-repeat : repeat-x;
                        " rowspan="6">
                        <?= $kls['nama_wisata'] ?></td>
                    </tr>
                    <tr style="height: 60px ">
                        <td>
                            <i class="material-icons" style="padding-left : 30px; padding-top : 15px;color :lighred ;vertical-align: top">perm_contact_calendar</i><br>
                        </td>
                        <td style="text-align : left; padding-top : 15px; padding-left : 15px;color :lightblue" >Tanggal</td>
                        <td style="text-align : left; padding-top : 15px; padding-left : 15px;color :#f7f7f7" ><?= $kls['tanggal_wisata'] ?></td>
                    </tr>
                    <tr style="height: 60px;">
                        <td>
                            <i class="material-icons"  style="padding-left : 30px; padding-top : 15px;color:green;vertical-align: top">money</i><br>
                        </td>
                        <td style="text-align : left; padding-top : 15px; padding-left : 15px;color :lightblue" >Harga</td>
                        <td style="text-align : left; padding-top : 15px; padding-left : 15px;color :#f7f7f7">
                        <?php
                        $angka = $kls['harga_wisata'];
                        $angka_jadi = number_format($angka,0,"",".");
                        ?> Rp. <?= $angka_jadi?><span style="color:#f7f7f7"> / orang</span></td>
                    </tr>
                    <tr style="height: 60px;">
                        <td>
                            <i class="material-icons" style="padding-left : 30px; padding-top : 2px;color:yellow;vertical-align: top">warning</i><br>
                        </td>
                        <td style="text-align : left; padding-top : 2px; padding-left : 15px;color :lightblue" >Kesulitan</td>
                        <td style="text-align : left; padding-top : 2px; padding-left : 15px;color :#f7f7f7" ><?= $kls['kesulitan'] ?> / <span style="color:#f7f7f7"> 10</span></td>
                    </tr>
                    <tr style="height: 60px;">
                        <td>
                            <i class="material-icons" style="padding-left : 30px; padding-top : 2px;color:lightblue;vertical-align: top">place</i><br>
                        </td>
                        <td style="text-align : left; padding-top : 2px; padding-left : 15px;color :lightblue" >Lokasi</td>
                        <td style="text-align : left; padding-top : 2px; padding-left : 15px;color :#f7f7f7" ><?= $kls['lokasi_wisata'] ?></td>
                    </tr>
                    <tr style="height: 60px;">
                        <td>
                            <i class="material-icons" style="padding-left : 30px; padding-top : 10px;color:gray;vertical-align: top">phone</i><br>
                        </td>
                        <td style="text-align : left; padding-top : 10px; padding-left : 15px;color :lightblue" >Narahubung</td>
                        <td style="text-align : left; padding-top : 10px; padding-left : 15px;color :#f7f7f7" ><?= $kls['narahubung'] ?></td>
                    </tr>
                <?php 
                    $i++;
                    endforeach; 
                ?>
            </table>
        </div>
    
    </div>
    <!-- FOOTER Section -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Your Website 2021</span>
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>
    </footer>

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

