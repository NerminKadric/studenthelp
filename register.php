<?php 
    require './includes/register-inc.php';

    $Register = new Register();

    session_start();
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/register.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./javascript/register.js"></script>
    <title>StudentHelp</title>
</head>
<body>
<nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand">Student Help</a>
        </div>
</nav>
<form class="register-form" id='register-form' method="POST" action="">
        <div class="mb-3">
            <label for="fname" class="form-label" required>Ime*</label>
            <input type="text" name="fname" class="form-control" aria-describedby="emailHelp">
            <label id='fname-alert' class="form-label alert-danger" style="display: none; margin-top: 10px;" required>Ime mora biti uneseno.</label>
        </div>
        <div class="mb-3">
            <label for="lname" class="form-label" required>Prezime*</label>
            <input type="text" name="lname" class="form-control">
            <label id='lname-alert' class="form-label alert-danger" style="display: none; margin-top: 10px;" required>Prezime mora biti uneseno.</label>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label" required>Korisnicko ime*</label>
            <input type="text" name="username" class="form-control">
            <label id='username-alert' class="form-label alert-danger" style="display: none; margin-top: 10px;" required>Korisnicko ime mora biti uneseno.</label>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label" required>Email*</label>
            <input type="email" name="email" class="form-control">
            <label id='email-alert' class="form-label alert-danger" style="display: none; margin-top: 10px;" required>Email mora biti unesen.</label>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label" required>Sifra*</label>
            <input type="password" name="password" class="form-control">
            <label id='password-alert' class="form-label alert-danger" style="display: none; margin-top: 10px;" required>Sifra mora biti unesena.</label>
        </div>
        <div class="mb-3">
            <label for="confirm-password" class="form-label" required>Potvrdi sifru*</label>
            <input type="password" name="confirmpassword" class="form-control">
            <label id='confirm-password-alert' class="form-label alert-danger" style="display: none; margin-top: 10px;" required>Potvrdite vasu sifru.</label>
        </div>
        <div class="mb-3">
            <label class="" for="exampleCheck1">Ako vec imas racun, <a href="index.php">prijavi se</a></label>
        </div>
        <button type="submit" class="btn btn-primary" onsubmit="validateForm()">Registruj se</button>
        <?php 
            if(isset($_POST['email']) 
            && isset($_POST['password'])
            && isset($_POST['confirmpassword'])
            && isset($_POST['fname'])
            && isset($_POST['lname'])
            && isset($_POST['username'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $username = $_POST['username'];
                $confirm_password = $_POST['confirmpassword'];
                $status = $Register->registerUser($fname,$lname,$email,$password,$username);
                if($status['status'] == false) {
                    echo '<div class="alert alert-danger" role="alert">'.$status['msg'].'</div>';
                } else {
                    $_SESSION['valid'] = true;
                    $_SESSION['email'] = $email;
                    header('location:dashboard.php');
                }
            } 
                // echo '<div class="alert alert-danger" role="alert">Sva polja su obavezna.</div>';
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