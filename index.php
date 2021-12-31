<?php

include_once 'source/session.php';
include('source/db_connect.php');

$query = $conn->prepare("SELECT `type` FROM `users` WHERE `id` = :id");
$query->bindParam(":id", $_SESSION["id"], PDO::PARAM_INT);
$query->execute();
$row = $query->fetch();


?>

<?php

include('save_to_db.php');

?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <link rel="shortcut icon" href="images/favicon.ico">

    <!--Bootstrap link-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />

    <!-- selectize css -->
    <link rel="stylesheet" type="text/css" href="assets/css/selectize.css" />

    <!-- Custom  Css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />

    <!-- font awsome icons-->
    <link href="assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">

</head>

<body>
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div>
    <!-- Loader -->



    <!-- Navigation Bar-->
    <header id="topnav" class="defaultscroll scroll-active">
        <!-- Tagline STart -->
        <div class="tagline">
            <div class="container">
                <div class="float-left">
                    <a href="index.php" class="logo">
                        <img src="images/logo-light.png" alt="" class="logo-light" height="38" />
                    </a>
                </div>
                <div class="float-right">
                    <ul class="topbar-list list-unstyled d-flex" style="margin: 11px 0px;">
                        <?php if (isset($_SESSION['username'])) : ?>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"><?php echo $_SESSION['username']; ?></button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item text-dark text-left mx-0" href="<?php if ($row['type'] == "Job Seeker") :  echo "jobSeeker-dashboard.php";
                                                                                            else : echo "organization-dashboard.php";
                                                                                            endif; ?>">Overview</a>
                                <a class="dropdown-item text-dark text-left mx-0" href="<?php if ($row['type'] == "Job Seeker") :  echo "jobSeeker_profile.html";
                                                                                            else : echo "company_profile.html";
                                                                                            endif; ?>">Profile</a>
                                <a class="dropdown-item text-dark text-left mx-0" href="<?php if ($row['type'] == "Job Seeker") :  echo "jobSeeker_Profile_edit.html";
                                                                                            else : echo "company_Profile_edit.html";
                                                                                            endif; ?>">Settings</a>
                                <a class="dropdown-item text-dark text-left mx-0" href="logout.php">Logout</a>
                            </div>
                        </div>
                        <?php else : ?>
                        <li class='list-inline-item'><a href='login.html'><i class='fas fa-user mr-2'></i>Login</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Tagline End -->

        <!-- Menu Start -->
        <div class="container">
            <!-- Logo container-->
            <div>
                <a href="index.php" class="logo">
                    <img src="images/logo-dark.png" alt="" class="logo-dark" height="38" />
                </a>
            </div>
            <!-- End Logo container-->
            <div class="menu-extras">
                <div class="menu-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </div>
            </div>

            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Jobs</a></li>



                    <li class="has-submenu">
                        <a href="javascript:void(0)">Company</a><span class="menu-arrow"></span>
                        <ul class="submenu">
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Pricing plans</a></li>
                            <li><a href="#">Faqs</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Contact Us</a>
                    </li>
                </ul>
                <!--end navigation menu-->
            </div>
            <!--end navigation-->
        </div>
        <!--end container-->
        <!--end end-->
    </header>
    <!--end header-->
    <!-- Navbar End -->

    <!-- Start Home -->
    <section class="bg-home">
        <div class="bg-overlay"></div>
        <div class="home-center">
            <div class="home-desc-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="title-heading text-center text-white">
                                <h6 class="small-title text-uppercase text-light mb-3">Find jobs, apply and start
                                    working.</h6>
                                <h1 class="heading font-weight-bold mb-4">Your Journey begins here.</h1>
                            </div>
                        </div>
                    </div>

                    <div class="home-form-position">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="home-registration-form p-4 mb-3">
                                    <form class="registration-form" method="get">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="registration-form-box">
                                                    <i class="fa fa-filter"></i>
                                                    <select id="select-country" class="demo-default" name="field">
                                                        <option>Choose Field...</option>

                                                        <?php $field = mysqli_query($conn, "SELECT * FROM jobs_tbl"); ?>
                                                        <?php while ($row = mysqli_fetch_array($field)) { ?>
                                                        <option value="<?php echo $row['field']; ?>">
                                                            <?php echo $row['field']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6">
                                                <div class="registration-form-box">
                                                    <i class="fa fa-location-arrow"></i>
                                                    <select id="select-country" class="demo-default" name="location">
                                                        <option>Choose Location...</option>

                                                        <?php $location = mysqli_query($conn, "SELECT * FROM jobs_tbl"); ?>
                                                        <?php while ($row = mysqli_fetch_array($location)) { ?>
                                                        <option value="<?php echo $row['location']; ?>">
                                                            <?php echo $row['location']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="registration-form-box">
                                                    <input type="submit" name="find_job"
                                                        class="submitBnt btn btn-primary btn-block" value="Submit">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <?php if (isset($_GET['find_job']) && !empty($_GET['find_job'])) : ?>
                        <div class="row gutters-sm">
                            <div class="col-xl-12 col-lg-12 mb-4">
                                <div class="card h-100">
                                    <div class="card-body">

                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary"
                                                style="display: inline-block;">Available Jobs</h6>
                                            <a href="index.php" style="display: inline-block;float: right;">Close</a>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover" id="dataTable" width="100%"
                                                cellspacing="0">

                                                <thead>
                                                    <tr>
                                                        <th>Job Id</th>
                                                        <th>Company</th>
                                                        <th>Field</th>

                                                        <th>Type</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (isset($_GET['find_job']) && !empty($_GET['find_job'])) { ?>
                                                    <?php
                                                            $location = $_GET['location'];
                                                            $field = $_GET['field'];
                                                            ?>
                                                    <?php $jobs = mysqli_query($conn, "SELECT * FROM jobs_tbl  WHERE location='$location' OR field='$field' "); ?>
                                                    <?php while ($row = mysqli_fetch_array($jobs)) { ?>
                                                    <tr>
                                                        <td><?php echo $row['job_id']; ?></td>

                                                        <td><?php echo $row['company']; ?></td>
                                                        <td><?php echo $row['field']; ?></td>

                                                        <td><?php echo $row['type']; ?></td>
                                                        <td
                                                            class="text-sm font-weight-bold text-success text-uppercase mb-1">
                                                            <?php echo $row['jstatus']; ?></td>
                                                        <td><a href="#"><i class="fa fa-list" title="view"></i></a></td>
                                                    </tr>
                                                    <?php } ?>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif ?>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- end home -->

    <!-- popular category start -->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title text-center mb-4 pb-2">
                        <h4 class="title title-line pb-5">Popular Categories</h4>
                        <p class="text-muted para-desc mx-auto mb-1">Search for any type of work that suits your
                            portfolio. We'll quickly match you with the right organization.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mt-4 pt-2">
                    <a href="javascript:void(0)">
                        <div class="popu-category-box bg-light rounded text-center p-4">
                            <div class="popu-category-icon mb-3">
                                <i class="fas fa-code d-inline-block rounded-pill h3 text-primary"></i>
                            </div>
                            <div class="popu-category-content">
                                <h5 class="mb-2 text-dark title">Web Developer</h5>
                                <p class="text-success mb-0 rounded">3 Jobs</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 mt-4 pt-2">
                    <a href="javascript:void(0)">
                        <div class="popu-category-box bg-light rounded text-center p-4">
                            <div class="popu-category-icon mb-3">
                                <i class="fas fa-pen d-inline-block rounded-pill h3 text-primary"></i>
                            </div>
                            <div class="popu-category-content">
                                <h5 class="mb-2 text-dark title">Graphic Designer</h5>
                                <p class="text-success mb-0 rounded">15 Jobs</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 mt-4 pt-2">
                    <a href="javascript:void(0)">
                        <div class="popu-category-box bg-light rounded text-center p-4">
                            <div class="popu-category-icon mb-3">
                                <i class="fas fa-building d-inline-block rounded-pill h3 text-primary"></i>
                            </div>
                            <div class="popu-category-content">
                                <h5 class="mb-2 text-dark title">Government</h5>
                                <p class="text-success mb-0 rounded">55 Jobs</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 mt-4 pt-2">
                    <a href="javascript:void(0)">
                        <div class="popu-category-box bg-light rounded text-center p-4">
                            <div class="popu-category-icon mb-3">
                                <i class="fas fa-chart-line d-inline-block rounded-pill h3 text-primary"></i>
                            </div>
                            <div class="popu-category-content">
                                <h5 class="mb-2 text-dark title">Accounting / Finance</h5>
                                <p class="text-success mb-0 rounded">22 Jobs</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 mt-4 pt-2">
                    <a href="javascript:void(0)">
                        <div class="popu-category-box bg-light rounded text-center p-4">
                            <div class="popu-category-icon mb-3">
                                <i class="fas fa-tools d-inline-block rounded-pill h3 text-primary"></i>
                            </div>
                            <div class="popu-category-content">
                                <h5 class="mb-2 text-dark title">Construction</h5>
                                <p class="text-success mb-0 rounded">8 Jobs</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 mt-4 pt-2">
                    <a href="javascript:void(0)">
                        <div class="popu-category-box bg-light rounded text-center p-4">
                            <div class="popu-category-icon mb-3">
                                <i class="fas fa-pen-nib d-inline-block rounded-pill h3 text-primary"></i>
                            </div>
                            <div class="popu-category-content">
                                <h5 class="mb-2 text-dark title">Content Writer</h5>
                                <p class="text-success mb-0 rounded">56 Jobs</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 mt-4 pt-2">
                    <a href="javascript:void(0)">
                        <div class="popu-category-box bg-light rounded text-center p-4">
                            <div class="popu-category-icon mb-3">
                                <i class="fas fa-pencil-ruler d-inline-block rounded-pill h3 text-primary"></i>
                            </div>
                            <div class="popu-category-content">
                                <h5 class="mb-2 text-dark title">Design & Multimedia</h5>
                                <p class="text-success mb-0 rounded">85 Jobs</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 mt-4 pt-2">
                    <a href="javascript:void(0)">
                        <div class="popu-category-box bg-light rounded text-center p-4">
                            <div class="popu-category-icon mb-3">
                                <i class="fas fa-user d-inline-block rounded-pill h3 text-primary"></i>
                            </div>
                            <div class="popu-category-content">
                                <h5 class="mb-2 text-dark title">Human Resource</h5>
                                <p class="text-success mb-0 rounded">48 Jobs</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- popular category end -->



    <!-- How it Work start -->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title text-center mb-4 pb-2">
                        <h4 class="title title-line pb-5">How It Works</h4>
                        <p class="text-muted para-desc mx-auto mb-1">Finding a job has never been this easy.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mt-4 pt-2">
                    <div class="how-it-work-box bg-light p-4 text-center rounded shadow">
                        <div class="how-it-work-img position-relative rounded-pill mb-3">
                            <img src="images/how-it-work/register.png" alt="" class="mx-auto d-block" height="50">
                        </div>
                        <div>
                            <h5>Register an account</h5>
                            <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy text.</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-4 pt-2">
                    <div class="how-it-work-box bg-light p-4 text-center rounded shadow">
                        <div class="how-it-work-img position-relative rounded-pill mb-3">
                            <img src="images/how-it-work/search.png" alt="" class="mx-auto d-block" height="50">
                        </div>
                        <div>
                            <h5>Search your job</h5>
                            <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy text.</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-4 pt-2">
                    <div class="how-it-work-box bg-light p-4 text-center rounded shadow">
                        <div class="how-it-work-img position-relative rounded-pill mb-3">
                            <img src="images/how-it-work/apply.png" alt="" class="mx-auto d-block" height="50">
                        </div>
                        <div>
                            <h5>Apply for job</h5>
                            <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy text.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- How it Work end -->

    <!-- counter start -->
    <section class="section bg-counter position-relative">
        <div class="bg-overlay bg-overlay-gradient"></div>
        <div class="container">
            <div class="row" id="counter">
                <div class="col-md-3 col-6">
                    <div class="home-counter pt-4 pb-4">
                        <div class="float-left counter-icon mr-3">
                            <i class="fas fa-university h1 text-white"></i>
                        </div>
                        <div class="counter-content overflow-hidden">
                            <h1 class="counter-value text-white mb-1" data-count="100">10</h1>
                            <p class="counter-name text-white text-uppercase mb-0">Companies</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <div class="home-counter pt-4 pb-4">
                        <div class="float-left counter-icon mr-3">
                            <i class="fas fa-file-alt h1 text-white"></i>
                        </div>
                        <div class="counter-content overflow-hidden">
                            <h1 class="counter-value text-white mb-1" data-count="300">80</h1>
                            <p class="counter-name text-white text-uppercase mb-0">Applications</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <div class="home-counter pt-4 pb-4">
                        <div class="float-left counter-icon mr-3">
                            <i class="fas fa-calendar-check h1 text-white"></i>
                        </div>
                        <div class="counter-content overflow-hidden">
                            <h1 class="counter-value text-white mb-1" data-count="500">10</h1>
                            <p class="counter-name text-white text-uppercase mb-0">Job Posted</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="home-counter pt-4 pb-4">
                        <div class="float-left counter-icon mr-3">
                            <i class="fas fa-users h1 text-white"></i>
                        </div>
                        <div class="counter-content overflow-hidden">
                            <h1 class="counter-value text-white mb-1" data-count="700">10</h1>
                            <p class="counter-name text-white text-uppercase mb-0">Member</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- counter end -->



    <!-- subscribe start -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="float-left position-relative notification-icon mr-2">
                        <i class="mdi mdi-bell-outline text-primary"></i>
                        <span class="badge badge-pill badge-danger">1</span>
                    </div>
                    <h5 class="mt-2 mb-0">Your Job Notification</h5>
                </div>
                <div class="col-lg-8 col-md-7 mt-4 mt-sm-0">
                    <form>
                        <div class="form-group mb-0">
                            <div class="input-group mb-0">
                                <input name="email" id="email" type="email" class="form-control"
                                    placeholder="Your email :" required="" aria-describedby="newssubscribebtn">
                                <div class="input-group-append">
                                    <button class="btn btn-primary submitBnt" type="submit"
                                        id="newssubscribebtn">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- subscribe end -->

    <!-- footer start -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                    <a href="javascript:void(0)"><img src="images/logo-light.png" height="20" alt=""></a>
                    <p class="mt-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text.</p>

                </div>
                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <p class="text-white mb-4 footer-list-title">Company</p>
                    <ul class="list-unstyled footer-list">
                        <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> About Us</a></li>
                        <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Pricing</a></li>

                    </ul>
                </div>
                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <p class="text-white mb-4 footer-list-title">Resources</p>
                    <ul class="list-unstyled footer-list">
                        <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Privacy Policy</a></li>
                        <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Terms</a></li>
                        <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> F.A.Q.</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <p class="text-white mb-4 footer-list-title f-17">Connect With Us</p>
                    <ul class="social-icon social list-inline mb-0">
                        <li class="list-inline-item"><a href="#" class="rounded"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#" class="rounded"><i class="fab fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="rounded"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#" class="rounded"><i class="fab fa-google"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->
    <hr>
    <footer class="footer footer-bar">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="">
                        <p class="mb-0">&copy; 2021 FutureSeekers.</p>
                    </div>
                </div>
            </div>
        </div>
        <!--end container-->
    </footer>
    <!--end footer-->
    <!-- Footer End -->

    <!-- Back to top -->
    <a href="#" class="back-to-top rounded text-center" id="back-to-top">
        <i class="fas fa-chevron-up d-block"> </i>
    </a>
    <!-- Back to top -->

    <!-- javascript -->
    <script src="assets/js/login.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/plugins.js"></script>

    <!-- selectize js -->
    <script src="assets/js/selectize.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>

    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/counter.int.js"></script>

    <script src="assets/js/app.js"></script>
    <script src="assets/js/home.js"></script>

</body>

</html>