<?php 
    require_once './includes/dashboard-inc.php';
    $AdminDash = new Dashboard();
    session_start();
    if(!isset($_SESSION['admin'])) {
        unset($_SESSION['valid']);
        header('location:index.php');
    }
    if(!isset($_SESSION['valid'])) {
        header('location:index.php');
    }
    $reports = $AdminDash->getProblemReports();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/admin-dashboard.css">
    <script src="./javascript/admin-dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>StdentHelp</title>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a href="dashboard.php" class="navbar-brand">Student Help</a>
            <div class="d-flex login-div">
                <a href="logout.php" class="btn btn-outline-success">Odjavi se</a>
            </div>
        </div>
    </nav>
    <div id="report-section">
        <div class='alerts'>
            <span id='announcement-empty' class="errors" style="display: none;">Obavijestenje ne smije biti prazno.</span>
            <span id='announcement-error' class="errors" style="display: none;">Doslo je do greske prilikom slanja obavijestenja.</span>
            <span id='announcement-success' class="success" style="display: none;">Poslali ste obavijestenje.</span>
        </div>
        <form action="" method="POST" class="report-form">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Postavite obavijestenje.</label>
                <textarea class="form-control" id='announcement-text' name="announcement" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Studenti ce ovo obavijestenje vidjeti na njihovom dashboard-u.</label>
            </div>
            <button type="button" onclick="postAnnouncement()" class="btn btn-primary submit-report">Podnesi</button>
        </form>
    </div>
    <div id="report-section">
        <div class='alerts'>
            <span id='answer-empty' class="errors" style="display: none;">Odgovor ne smije biti prazan.</span>
            <span id='answer-error' class="errors" style="display: none;">Doslo je do greske prilikom odgovaranja.</span>
        </div>
        <table class="table problem-reports-table">
            <thead>
                <tr>
                    <th scope="col">Redni Broj</th>
                    <th scope="col">Email Studenta</th>
                    <th scope="col">Tip problema</th>
                    <th scope="col">Problem</th>
                    <th scope="col">Odgovori</th>
                </tr>
                <tbody>
                    <?php
                    foreach ($reports as $key => $value) {
                        // $escapedEmail = htmlspecialchars(json_encode($value['email']));
                        echo "<tr>
                                    <th scope='row'>" . $value['0'] . "</th>
                                    <td>" . $value['email'] . "</td>
                                    <td>" . $value['type'] . "</td>
                                    <td>" . $value['description'] . "</td>
                                    <td><textarea name='response' id='".$value['0']."''></textarea></td>
                                    <td><button type='button' onclick=sendBack('".$value['email']."','".$value['0']."') class ='btn btn-primary back_report' id='approve'>Odgovori</button></td>
                                </tr>";
                    }
                    ?>
                </tbody>
            </thead>
        </table>
    </div>
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