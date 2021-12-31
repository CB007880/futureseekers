<?php

include('source/db_connect.php');

include_once 'source/session.php';



?>

<?php
$field = "";
$status = "";

?>

<!DOCTYPE html>

<head>
    <title>Future Seekers</title>
    <!-- font awsome icons-->
    <link href="assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Google Fonts-->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles-->
    <link href="assets/css/customCSS.css" rel="stylesheet">

    <style type="text/css">
    table {
        counter-reset: section;
    }

    .count:before {
        counter-increment: section;
        content: counter(section);
    }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!--back to jobs button-->
                        <div class="d-sm-flex align-items-center justify-content-between mb-2">
                            <a href="jobs.php" class="d-sm-inline-block btn btn-md btn-primary shadow-sm">Back to
                                Jobs</a>
                        </div>



                        <?php
                        include('source/db_connect.php');


                        $statement = $conn->prepare("SELECT * FROM notification_tbl WHERE receiver_id = '" . $_SESSION['id'] . "' AND `status`='Unread' ");
                        $statement->execute();











                        ?>

                        <li class="nav-item dropdown no-arrow mx-1">







                            <a class="nav-link dropdown-toggle" href="job-notification.php">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">
                                    <?php echo ($statement->rowCount()); ?></span>
                            </a>
                        </li>

                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter"></span>
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>


                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Kavisha Withana</span>
                                <img class="img-profile rounded-circle" src="images/undraw_profile.svg">
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="row">

                        <!-- 4 card sections -->

                        <!--JOBS APPLIED-->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jobs Applied</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">32</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ACCEPTED APPLICATIONS -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Accepted Applications </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">8</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-check fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- REJECTED APPLICATIONS -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Rejected Applications </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">15</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-times fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PENDING APPLICATIONS -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Applications
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">15</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">


                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- DataTales -->
                                <div class="card shadow mb-4">
                                    <div class="card-body">


                                        <div style="display: inline-block;">

                                            <span class="input-icon">
                                                <select name="status" id="status" class="form-control">
                                                    <option value="">Choose Status</option>
                                                    <option value="Accepted">Accepted</option>
                                                    <option value="Rejected">Rejected</option>
                                                    <option value="Pending">Pending</option>
                                                    <option value="Active">Active</option>

                                                </select>








                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">


                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Applied Jobs</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover" id="datatable" width="100%"
                                                cellspacing="0">

                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Company</th>
                                                        <th>Position</th>
                                                        <th>Date Applied</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <?php
                                                    include('source/db_connect.php');
 if (isset($_GET['cat_type'])) {
                            $cat_type = $_GET['cat_type'];
                            
                            $query = $conn->prepare("SELECT name,title,application,date_applied,jstatus, jt.id FROM users u INNER JOIN jobs_tbl jt ON u.id = jt.applicant_id INNER JOIN job_listings j ON j.id = jt.job_id WHERE jt.applicant_id= :id AND `jstatus` LIKE  '" .$cat_type. "'");
                           
                       


                                                    $query->bindParam(":id", $_SESSION['id'], PDO::PARAM_INT);
                                                    $query->execute();
                                               

    
                        } else {
                           $query = $conn->prepare("SELECT name,title,application,date_applied,jstatus, jt.id FROM users u INNER JOIN jobs_tbl jt ON u.id = jt.applicant_id INNER JOIN job_listings j ON j.id = jt.job_id WHERE jt.applicant_id= :id");
                                                    $query->bindParam(":id", $_SESSION['id'], PDO::PARAM_INT);
                                                    $query->execute();
                        }
                                                    
                                                    if ($query->rowCount() > 0) :
                                                        // output data of each row
                                                        while ($row = $query->fetch()) :
                                                    ?>
                                                    <tr>
                                                        <td class="count"></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['title']; ?></td>
                                                        <td><?php echo $row['date_applied']; ?></td>
                                                        <td><?php echo $row['jstatus']; ?></td>
                                                    </tr>
                                                    <?php
                                                        endwhile;
                                                    endif;
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- End of Main Content -->


                                <!-- Footer -->
                                <footer class="sticky-footer bg-white">
                                    <div class="container my-auto">
                                        <div class="copyright text-center my-auto">
                                            <span>Copyright &copy; Future Seekers 2021</span>
                                        </div>
                                    </div>
                                </footer>
                                <!-- End of Footer -->


</body>

</html>
<script src="vendor/jquery/jquery.min.js"></script>
<!-- javascript -->
<script src="assets/js/login.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/jquery.easing.min.js"></script>
<script src="assets/js/plugins.js"></script>


<script>
$(document).ready(function() {
    $("#status").on("change", function() {
        var cat_type = $("#status").val();
        console.log(cat_type);
        window.location.href = 'jobSeeker-dashboard.php?cat_type=' + cat_type;
    });
});
</script>