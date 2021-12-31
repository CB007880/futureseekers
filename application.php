<?php
    include('source/session.php');
    include('source/db_connect.php');

    $applicant_id=$_SESSION['id'];
    $job_id = $_POST['job_id'];
    $comp_id = $_POST['comp_id'];
    $query = $conn->prepare("INSERT INTO `jobs_tbl`(`job_id`, `comp_id`, `applicant_id`) VALUES ('$job_id','$comp_id',   '$applicant_id')");
    $query->execute();



$target_dir = "uploads/cv/";
$target_file = $target_dir . basename($_FILES["application"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["application"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["application"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["application"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}


    echo '<script type = "text/javascript">';
    echo 'alert("Application Received");';
    echo 'window.location.href = "jobSeeker-dashboard.php"';
    echo '</script>';
?>
