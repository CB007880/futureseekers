<?php
    include('source/session.php');
    include('source/db_connect.php');

    $id=$_SESSION['id'];
    $title = $_POST['Occupation'];
    $salary = $_POST['Salaries'];
    $edate = $_POST['Duration'];
    $experience = $_POST['Qualification'];
    $description = $_POST['Description'];

    $query = $conn->prepare("INSERT INTO `job_listings`(`user_id`,`title`,`salary`,`edate`,`experience`,`description`) VALUES ('$id','$title','$salary','$edate','$experience','$description')");
    $query->execute();
 
    header('location:job_listing.php');


?>