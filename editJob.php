<?php
    include('source/session.php');
    include('source/db_connect.php');

    $id=$_GET['id'];
    $query = $conn->prepare("SELECT * FROM `job_listings` WHERE `id` = :id");
    $query->bindParam(":id", $_GET["id"], PDO::PARAM_INT);
    $query->execute();
    $row = $query->fetch();

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
                                <a href="#" class="d-sm-inline-block btn btn-md btn-primary shadow-sm">Back to Jobs</a>
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

                        <!--JOBS APPLIED-->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="font-weight-bold text-primary text-uppercase mb-1">
                                                Add New Job Vacancy</div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>               
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-6 col-lg-12">
                            <div class="card shadow mb-4">             
                               
                
                                 <form method="POST" action="updateJob.php?id=<?php echo $id; ?>">

                                  <div class="form-group row">
                                    <label for="Occupation" class="col-sm-3 col-form-label">Occupation Title</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="Occupation" value="<?php echo $row['title']; ?>">
                                    </div>
                                  </div>

                                  <div class="form-group row">
                                    <label for="Salaries" class="col-sm-3 col-form-label">Salaries</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="Salaries" value="<?php echo $row['salary']; ?>">
                                    </div>
                                  </div>

                                  <div class="form-group row">
                                    <label for="Duration " class="col-sm-3 col-form-label">Duration of employment</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="Duration " value="<?php echo $row['edate']; ?>">
                                    </div>
                                  </div>

                                  <div class="form-group row">
                                    <label for="Qualification" class="col-sm-3 col-form-label">Qualification</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="Qualification" value="<?php echo $row['experience']; ?>">
                                    </div>
                                  </div>

                                  <div class="form-group row">
                                    <label for="Description" class="col-sm-3 col-form-label">Job Description</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="Description" value="<?php echo $row['description']; ?>">
                                    </div>
                                  </div>

                                  <div class="form-group row">
                                    <div class="col-sm-9">
                                        <input type="submit" name="submit" class="btn-primary">
                                        <a href="job_listing.php">Back</a>
                                    </div>
                                  </div>

                                

                                </form>

                                       
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


 

  

</body>
</html>