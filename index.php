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
                echo "<script> alert('Please verify your account first!'); document.location.href = 'userverify/reset-code.php' </script>";
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
                        <a class="page-scroll" href="#services">Services</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#team">Team</a>
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
        <div class="container-fluid">
            <div class="slide1"></div>
            <div class="slide2"></div>
            <div class="slide3"></div>
            <div class="slide4"></div>
            <div class="intro-text">
            <div class="display-5 fw-bolder animate__animated animate__fadeInDown" style="font-size:50px ;font-family:  Montserrat,'Helvetica Neue',Helvetica,Arial,sans-serif;">Hello!</div>
            <div class="display-5 fw-bolder animate__animated animate__fadeInDown"style="font-size:70px ;font-family:  Montserrat,'Helvetica Neue',Helvetica,Arial,sans-serif;">Welcome to <span style="font-family: 'Kaushan Script','Helvetica Neue','Helvetica','Arial','cursive';color: #fed136;"> Indonesia</div>
            <a href="#services" class="page-scroll btn btn-xl">Tell Me More</a>
        </div>
    </header>


    <!-- Services Section --><br><br><br><br><br><br>
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Services</h2>
                    <h1 class="section-subheading text-muted">Where do you want to go?</h1>
                </div>
            </div>

            <!--galery-->
            <div class="section-boxy">
                <ul class="grid">
                    <li>
                        <div class="gboxy img-1">
                                <div class="fontg">Pangrango</div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gboxy img-2">
                                <div class="fontg">Papandayan</div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gboxy img-3">
                                <div class="fontg">Ijen</div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gboxy img-4">
                                <div class="fontg">Jaya Wijaya</div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gboxy img-5">
                                <div class="fontg">Merbabu</div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gboxy img-6">
                                <div class="fontg">Kelimutu</div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gboxy img-7">
                                <div class="fontg">Semeru</div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gboxy img-8">
                                <div class="fontg">Bromo</div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gboxy img-9">
                                <div class="fontg">Rinjani</div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gboxy img-10">
                                <div class="fontg">Prau</div>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>   
        </div>
    </section>


    <!-- Team Section -->
    <section id="team">
        <div class="container" style=>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Our Amazing Team</h2>
                    <h3 class="section-subheading text-muted">Hi there! Nice to Meet You</h3>
                </div>
            </div>
            <div class="row">
                <div class="c1">
                    <div class="team-member">
                        <img src="gambar/nadiaa.jpeg" class="img-responsive img-circle" alt="">
                        <h4>Nadia Wartiningrum</h4>
                        <p class="text-muted">Designer</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="https://www.instagram.com/naddiaa0_/"><i class="fa fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="c1">
                    <div class="team-member">
                        <img src="gambar/aditt.jpeg"class="img-responsive img-circle" alt="">
                        <h4>Prahasditya</h4>
                        <p class="text-muted">Programmer</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="https://www.instagram.com/prahasditya/"><i class="fa fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="c1">
                    <div class="team-member">
                        <img src="gambar/arif.jpeg" class="img-responsive img-circle" alt="">
                        <h4>Arif Husaini</h4>
                        <p class="text-muted">Web Hoster</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="https://www.instagram.com/ariiffhsn/"><i class="fa fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="c1">
                    <div class="team-member">
                        <img src="gambar/kiki.jpeg" class="img-responsive img-circle" alt="">
                        <h4>Kikisan Mala</h4>
                        <p class="text-muted">Developer</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="https://www.instagram.com/kikisanmala_/"><i class="fa fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

        </div>
    </section>

    <!-- thanks Section -->
    <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"></h2>
                    <h3 class="section-subheading text-muted">____</h3>
                </div>



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
