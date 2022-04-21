<?php 
    require './includes/login-inc.php';
    
    $Login = new Login();
    session_start();
    if(isset($_SESSION['valid'])) {
        header('location:dashboard.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/login.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./javascript/login.js"></script>
    <title>StudentHelp</title>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand">Student Help</a>
        </div>
    </nav>
    <form class="login-form" method="POST" id='login-form' action="">
        <div class="form-group">
            <label for="exampleInputEmail1">Email adresa</label>
            <input type="email" class="form-control" name='email' id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <label id='email-alert' class="form-label alert-danger" style="display: none; margin-top: 10px;" required>Email mora biti unesen.</label>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Lozinka</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
            <label id='password-alert' class="form-label alert-danger" style="display: none; margin-top: 10px;" required>Sifra mora biti unesena.</label>
        </div>
        <!-- <div class="form-group"> -->
            <!-- <a href="forgot-password.php">Zaboravljena lozinka</a> -->
        <!-- </div> -->
        <button type="submit" onsubmit="validateLoginForm()" class="btn btn-primary btn-login">Login</button>
        <?php
                if(isset($_POST['email']) && isset($_POST['password'])) {
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $status = $Login->loginUser($email, $password);
                    if($status['status'] == false) {
                        echo '<div class="alert alert-danger" role="alert">'.$status['msg'].'</div>';
                    } else {
                        $_SESSION['email'] = $email;
                        $_SESSION['valid'] = true;
                        if($status['admin'] == true) {
                            $_SESSION['admin'] = true;
                            $_SESSION['valid'] = true;
                            header('location:admin-dashboard.php');
                        } else {
                            header('location:dashboard.php');
                        }
                    }
                }
        ?>
    </form>
    <footer class="text-center text-lg-start bg-light text-muted">
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <div>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-github"></i>
                </a>
            </div>
        </section>
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <div class="row mt-3">
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem"></i>Student Help
                        </h6>
                        <p>
                            Najbolji alat za pomaganje studentima IPI Akademije.
                        </p>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            Kontakt
                        </h6>
                        <p><i class="fas"></i> Kulina bana 2, Tuzla 75000</p>
                        <p>
                            <i class="fas"></i>
                            studenthelp@studenthelp-support.com
                        </p>
                        <p><i class="fas"></i> + 01 234 567 88</p>
                        <p><i class="fas"></i> + 01 234 567 89</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2022 Copyright:
            <a class="text-reset fw-bold" href="">www.studenthelp.com</a>
        </div>
    </footer>
</body>

</html>