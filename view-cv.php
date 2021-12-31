
<?php include ('save_to_db.php'); 

   $position = "";
    $type = "";
    $status = "";
?>




<!DOCTYPE html>
<html>
<head>  
  <title>User Application</title>
  <!--custom CSS-->
  <link rel="stylesheet" type="text/css" href="assets/css/jobSeeker_Profile.css">
  <!--Bootstrap link-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- font awsome icons-->
  <link href="assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">

  

    <style type="text/css">
     /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 50%; /* Could be more or less, depending on screen size */
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

            <div class="col-md-12">

              <?php if(isset($_GET['cvID']) && !empty($_GET['cvID'])){ ?>
              <?php $id = $_GET['cvID']; ?>
               <?php $cv = mysqli_query($conn, "SELECT * FROM attachment_tbl WHERE attachment_id='$id' "); ?>
                          <?php while($row = mysqli_fetch_array($cv)){ 

                               $job_id = $row['job_id'];

                               $filePath = 'uploads/'.$row['cv_attachment']; 
                               $fileMime = mime_content_type($filePath); 

                               if (!empty($job_id)) {
                                    $query = "SELECT * FROM jobs_tbl WHERE job_id='$job_id' ";
                                    $result=mysqli_query($conn, $query);
                                    $count = mysqli_num_rows($result);
                                    if ($count > 0) {
                                        while ($data = mysqli_fetch_assoc($result)) {

                                            $position = $data['position'];
                                            $type = $data['type'];
                                            $status = $data['status'];
                                       }
                                }

                             }
                           }
                         }

                            ?>

              <div class="row gutters-sm">
                <div class="col-xs-12">
                  <div class="card h-100">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="widget-box transparent" id="widget-box-12">
                        <div class="widget-header">
                          <h4 class="widget-title lighter"><?php echo $position; ?></h4>

                          <div class="widget-toolbar no-border">
                        
                            <form  style="display: inline-block;">
                              <input type="text" name="note_id" value="<?php echo $id; ?>" style="display: none;" readonly>
                            <a href="organization-dashboard.php" style="border: none;height: 2px;background-color: white;">
                              <i class="ace-icon fa fa-times" title="Close Application"></i>
                            </a>
                          </form>

                          </div>
                        </div>

                        <div class="widget-body">
                          <div class="widget-main padding-6 no-padding-left no-padding-right">

                            <embed src="<?php echo $filePath; ?>" type="<?php echo $fileMime; ?>" width="1000px" height="800px" />

                          </div>
                        </div>
                      </div>
                        </div>
                      </div>    
                    </div>
                  </div>
                </div>
              </div>



                <!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  
  <div class="modal-content">
    Confirm Job Application Status 
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="widget-main">
        
          <hr>
          <fieldset>

          <div class="col-lg-4 col-md-6" style="display: inline-block;">
            <label class="col-sm-3 control-label no-padding-right"></label>
            <div class="col-xs-5">
              
              <input type="text" name="attachment_id" value="<?php echo $id; ?>" style="display: none;" readonly />
            </div>
          </div>

          
                 
                  <select  name="status">
                      <option value="Pending">Pending</option>
                      <option value="Accepted">Accepted</option>
                      <option value="Rejected">Rejected</option>
                  </select>
              

          </fieldset>   
        </div>
        <hr>
        <div class="widget-toolbox padding-8 clearfix">
          <button class="btn btn-xs btn-danger pull-left" data-dismiss="modal" style="float: left;">
            <span class="bigger-110">Cancel</span>
          </button>

          <button class="btn btn-xs btn-success pull-right" type="submit" name="submit_status" style="float: right;">
            <span class="bigger-110">Confirm</span>
          </button>
        </div>
        </form>
  </div>

</div>

            

            </div>
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