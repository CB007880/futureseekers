<?php

include_once 'source/session.php';



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
                                                List of Vacancies</div>
                                        </div>
                                        <div class="col-auto">
                                           
                                          <button class="btn-primary" onclick="document.location='addJob.html'" ><i class="fas fa-plus-circle fa-1x text-gray-300"></i>Add job vacancy</button>
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
                            <h6 class="m-0 font-weight-bold text-primary">Available Jobs</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">

                                    <thead>
                                        <tr>
                                            <th>Occupation Title</th>
                                            <th>Salary</th>
                                            <th>Post Date</th>
                                            <th>Duration of employment</th>
                                            <th>Qualification/Work experience</th>
                                            <th>Job Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        include('source/db_connect.php');


                                       $query = $conn->prepare("SELECT * FROM `job_listings` WHERE `user_id` = :id");
                                       $query->execute([':id' => $_SESSION["id"]]);
                                        if ($query->rowCount()>0):
                                            // output data of each row
                                            while($row = $query->fetch()):
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['title']; ?></td>
                                                    <td><?php echo $row['salary']; ?></td>
                                                    <td><?php echo $row['pdate']; ?></td>
                                                    <td><?php echo $row['edate']; ?></td>
                                                    <td><?php echo $row['experience']; ?></td>
                                                    <td><?php echo $row['description']; ?></td>
                                                    <td>
                                                        <a href="editJob.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit fa-1x text-gray-300"></i>
                                                        </a>
                                                        <a href="deleteJob.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt fa-1x text-gray-300"></i></a>
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


 

  

</body>
</html>