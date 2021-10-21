<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Mountaineerz</title>
    <link rel="shortcut icon" href="../img/mnticon.webp">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="undefined" crossorigin="anonymous">
    <script src="script.js"></script>

</head>
<body>
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
            <a class="navbar-brand page-scroll" href="../" style="left :20px;position : fixed">Mountaineerz</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="login-user.php" method="POST" autocomplete="" >
                    <h2 class="text-center">Login Mountaineerz</h2>
                    <p class="text-center">Login with your email and password.</p>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                    <label>Email</label>
                        <input class="form-control" type="email" name="email" placeholder="Email Address" title="8 Character Email" required value="<?php echo $email ?>">
                    </div>
                    <label>Password</label>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" id="myInput" maxlength="32" minlength="8" placeholder="Must be 8-32 Characters long." required>
                        <input type="checkbox" onclick="myFunction()">Show Password
                    </div>
                    <div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password?</a></div>
                    
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="Login">
                    </div>
                    <div class="link login-link text-center">Not yet a member? <a href="signup-user.php">Signup now</a></div>
                </form>
            </div>
        </div>
    </div>
    
    
</body>
</html>