
<?php 
    include('source/session.php');
    include('source/db_connect.php');

include('save_to_db.php');

$position = "";
$type = "";
$status = "";
$user_id = "";

?>

<?php

  if (isset($_POST['submit_status'])) {

  $attachment_id = $_POST['attachment_id'];
  $status = $_POST['status'];
  $sender_id = $_POST['sender_id'];
  $receiver_id = $_POST['receiver_id']; 
  $read_status = "Unread";

if ($status == 'Pending') {
    $note_title = "Application Received";
    $content = "We have received your CV for accreditation. You will be contancted if you application is successful";
}

if ($status == 'Accepted') {
    $note_title = "Application Accepted";
    $content = "We received your CV for accreditation. Your application was successful";
}

if ($status == 'Rejected') {
    $note_title = "Application Rejected";
    $content = "We received your CV for accreditation. Your application was unsuccessfull";
}
  
  $query_cv = "UPDATE attachment_tbl SET status='$status' WHERE attachment_id ='$attachment_id' ";

  mysqli_query($conn, $query_cv);

  if ($query_cv) {
      
      $sql = "INSERT INTO notification_tbl (receiver_id, sender_id, note_title, status, content, post_date) VALUES ('$receiver_id', '$sender_id', '$note_title', '$read_status', '$content', '".date("y-m-d H:i:s")."')";
        mysqli_query($conn, $sql);
  }
    
  }

?>

<!DOCTYPE html>
<head>
    <title>Future Seekers</title>
    <!-- font awsome icons-->
    <link href="assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
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
                                <a href="jobs.php" class="d-sm-inline-block btn btn-md btn-primary shadow-sm">Back to Jobs</a>
                            </div>

              
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>                    
                        </li>
                   
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                      
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Kavisha Withana</span>
                                <img class="img-profile rounded-circle"
                                    src="images/undraw_profile.svg">
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

                        <!--Applications Received-->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Applications Received</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">127</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reviewed APPLICATIONS -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Applications Reviewed</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">8</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending APPLICATIONS -->
                         <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Pending Applications </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">15</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Accepted APPLICATIONS -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Accepted Applications
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
                                            <i class="fas fa-check fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                
                               
                                 <!-- DataTales -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Received Applications</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NO.</th>
                                            <th>Applicant Name</th>
                                            <th>Position</th>
                                            <th>Application</th>
                                            <th>Date Applied</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <tr>
                                            <th>NO.</th>
                                            <th>Applicant Name</th>
                                            <th>Position</th>
                                            <th>Application</th>
                                            <th>Date Applied</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php
                                     include('source/db_connect.php');

                                       $query = $conn->prepare("SELECT name,title,application,date_applied,jstatus, jt.id FROM users u INNER JOIN jobs_tbl jt ON u.id = jt.applicant_id INNER JOIN job_listings j ON j.id = jt.job_id WHERE jt.comp_id= :id");
                                        $query->bindParam(":id", $_SESSION['id'], PDO::PARAM_INT);
                                       $query->execute();
                                        if ($query->rowCount()>0):
                                            // output data of each row
                                            while($row = $query->fetch()):
                                                ?>
                                                    <tr><td class="count"></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['title']; ?></td>
                                                        <td><a href="uploads/cv/" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">View Application</a></td>
                                                        <td><?php echo $row['date_applied']; ?></td>
                                                        <td>
                                                        <form method="POST" action="status_update.php">
                                                            <select name="status" >
                                                                <option value="Pending" <?=$row['jstatus'] == 'Pending' ? ' selected="selected"' : '';?>>Pending</option>
                                                                <option value="Accepted" <?=$row['jstatus'] == 'Accepted' ? ' selected="selected"' : '';?>>Accepted</option>
                                                                <option value="Rejected" <?=$row['jstatus'] == 'Rejected' ? ' selected="selected"' : '';?>>Rejected</option>
                                                            </select>

                                                            <input type="hidden" name="applicationID" value="<?php echo ($row['id']);?>">
                                                            <input type="submit" class="d-sm-inline-block btn btn-sm btn-success shadow-sm" name="submit">
                                                        </form>    
                                                        
                                                        </td>                                            
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
                </div>
            </div>
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

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper --> 


    <!-- Bootstrap core JavaScript-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>



  

</body>
</html>