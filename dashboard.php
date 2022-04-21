<?php 
    require './includes/dashboard-inc.php';

    $Dashboard = new Dashboard();
    session_start();
    if(!isset($_SESSION['valid'])) {
        header('location:index.php');
    }

    $User = $Dashboard->getUserUsingEmail($_SESSION['email']);
    $answeredReports = $Dashboard->getAnsweredProblems($_SESSION['email']);
    $announcement = $Dashboard->getAnnouncement();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/dashboard.css">
    <script src="./javascript/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>StudentHelp</title>
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
    <section id="announcement-section">
        <div class="last-announcement border">
            <div class='innerIntroducingScreen'>
            <span>Pozdrav <?php echo $User['fname']?>.</span>
            <p>Dobrodosli na najbolji StudentHelp alat.</p>
            <span><?php echo date("Y/m/d")?></span>
            <div class="last-announcment-div">
                <span>Posljednje obavjestenje: </span>
                <?php 
                    echo '<p class=announcement>'.$announcement['text'].'</p>';
                ?>
            </div>
            </div>
        </div>
    </section>
    <div id="report-section">
        <span class="title">Prijavi problem</span>
        <div class="report">
            <form action="" id='problem_report_form' method="POST" action="">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Odaberite vrstu problema</label>
                    <select name='problem_type' class="form-select" id='report_problem_select' aria-label="Default select example">
                        <option value="1">Incident u prostorijama IPI Akademije.</option>
                        <option value="2">Problem sa profesorom.</option>
                        <option value="3">Problem sa dokumentacijom.</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Opisite problem</label>
                    <textarea name='desc' id='report_problem_desc' class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    <label id='desc-alert' class="form-label alert-danger" style="display: none; margin-top: 10px;">Morate opisati problem.</label>
                </div>
                <div class="form-group">
                    <button type="submit" onsubmit="validatePorblemReportForm()"  class="btn btn-primary submit-report">Prijavi</button>
                    <label for="exampleFormControlTextarea1">Administrator ce prvom prilikom pogledati problem i posalti vam odgovor.</label>
                </div>
            </form>
            <?php 
                if(isset($_POST['desc'])) {
                    $desc = $_POST['desc'];
                    $type = $_POST['problem_type'];
                    if($Dashboard->reportProblem($type, $desc, $User['id'])) {
                        $_SESSION['form-submited'] = true;
                    }
                    else {
                        echo '<label class="alert alert-danger">Doslo je do greske prilikom pirijave problema.</label>';
                    }
                }
            ?>
        </div>
    </div>
    <section id="feedback-section">
        <span class="title">Odgovori na vase prijavljene probleme</span>
        <table class="table problem-reports-table">
            <thead>
                <tr>
                    <th scope="col">Redni Broj</th>
                    <th scope="col">Odgovor</th>
                    <th scope="col">Ukloni</th>
                </tr>
                <tbody>
                    <?php 
                         foreach ($answeredReports as $key => $value) {
                            echo "<tr id='".$value['id']."'>
                                <th scope='row'>" . $value['id'] . "</th>
                                <td scope='row'>".$value['text']."</td>
                                <td scope='row'><button onclick=deleteResponse('".$value['id']."') class='btn btn-primary'>Ukloni</button></td>
                            </tr>";
                        }
                    ?>
                </tbody>
            </thead>
        </table>
 
    </section>
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