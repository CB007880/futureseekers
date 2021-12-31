<?php

include('save_to_db.php'); 
include_once 'source/session.php';
include('source/db_connect.php');

    $query = $conn->prepare("SELECT * FROM `users` WHERE `id` = :id");
    $query->bindParam(":id", $_SESSION["id"], PDO::PARAM_INT);
    $query->execute();
    $row = $query->fetch();
   

?>


<!DOCTYPE html>
<html>

<head>
    <title>User Profile</title>
    <!--custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/jobSeeker_Profile.css">
    <!--Bootstrap link-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- font awsome icons-->
    <link href="assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">



    <style type="text/css">
    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
        /* Could be more or less, depending on screen size */
    }

    /* The Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
    </style>

</head>

<body>

    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">

                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="images/cb.png" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4><?php echo $row['name']; ?></h4>
                                    <p class="text-secondary mb-1"><?php echo $row['ctype']; ?></p>
                                    <p class="text-muted font-size-sm"><?php echo $row['location']; ?></p>
                                    <a href="company_Profile_edit.php" class="btn btn-white btn-primary">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">

                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><i class="fas fa-globe-europe fa-lg mr-3"></i>Website</h6>
                                <span class="text-secondary"><?php echo $row['web']; ?></span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><i class="fab fa-github fa-lg mr-3"></i>Github</h6>
                                <span class="text-secondary"><?php echo $row['github']; ?></span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><i class="fab fa-twitter fa-lg mr-3"></i>Twitter</h6>
                                <span class="text-secondary">@<?php echo $row['twitter']; ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><i class="fab fa-instagram fa-lg mr-3"></i>Instagram</h6>
                                <span class="text-secondary"><?php echo $row['insta']; ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><i class="fab fa-facebook-f fa-lg mr-3"></i>Facebook</h6>
                                <span class="text-secondary"><?php echo $row['fb']; ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Company Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $row['name']; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $row['email']; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $row['phone']; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Mobile</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $row['phone-alt']; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $row['address']; ?>
                                </div>
                            </div>
                            <hr>

                        </div>
                    </div>

                    <div class="row gutters-sm">


                        <div class="col-sm-12 mb-3">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Available Jobs</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="dataTable" width="100%"
                                            cellspacing="0">

                                            <thead>
                                                <tr>
                                                    <th>Job Id</th>
                                                    <th>Position</th>
                                                    <th>Type</th>
                                                    <th>Final Date</th>
                                                </tr>
                                            </thead>



                                            <tbody>
                                                <tr>
                                                    <td>jc#001</td>
                                                    <td>Ceylan</td>
                                                    <td>Full-Time</td>
                                                    <td>Writer</td>



                                                </tr>

                                                <tr>
                                                    <td>jc#004</td>
                                                    <td>AMD</td>
                                                    <td>Part-Time</td>
                                                    <td>Accountant</td>


                                                </tr>

                                                <tr>
                                                    <td>jc#0021</td>
                                                    <td>FatBoi Company</td>
                                                    <td>Full-Time</td>
                                                    <td>Cook</td>


                                                </tr>

                                                <tr>
                                                    <td>jc#007</td>
                                                    <td>UGreen</td>
                                                    <td>Full-Time</td>
                                                    <td>Engineer</td>


                                                </tr>
                                            </tbody>

                                        </table>


                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Trigger/Open The Modal -->


                        <!-- The Modal -->
                        <div id="myModal" class="modal">

                            <!-- Modal content -->

                            <div class="modal-content">
                                Send you CV <span class="close" style="float: right;">&times;</span>
                                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                    <div class="widget-main">


                                        <fieldset>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label no-padding-right"></label>
                                                <div class="col-xs-5">
                                                    <input type="file" name="cv_attachment" />
                                                    <input type="text" name="user_id"
                                                        value="<?php echo $_SESSION['id']; ?>" style="display: none;"
                                                        readonly />
                                                </div>
                                            </div>

                                        </fieldset>
                                    </div>
                                    <div class="widget-toolbox padding-8 clearfix">
                                        <button class="btn btn-xs btn-default pull-left" data-dismiss="modal">
                                            <i class="ace-icon fa fa-arrow-down"></i>
                                            <span class="bigger-110">Cancel</span>
                                        </button>

                                        <button class="btn btn-xs btn-success pull-right" type="submit"
                                            name="submit_cv">
                                            <span class="bigger-110">Upload</span>
                                            <i class="ace-icon fa fa-arrow-up icon-on-right"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>


    <div id="myCV" class=" col-xs-7 modal fade" role="dialog">



        <div class="modal-content">
            <div class="widget-body">



            </div>
        </div>
    </div>

    <script type="text/javascript">
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>


</body>

</html>