<?php
    include('source/session.php');
    include('source/db_connect.php');

    $id=$_GET['id'];
    $title=$_POST['Company_Name'];
    $salary=$_POST['Salaries'];
    $edate=$_POST['Duration'];
    $experience=$_POST['Qualification'];
    $description=$_POST['Description'];

    $query = $conn->prepare("UPDATE `job_listings` SET `title`='$title', `salary`='$salary', `edate`='$edate', `experience`='$experience', `description`='$description' WHERE `id` = :id");
    $query->bindParam(":id", $_GET["id"], PDO::PARAM_INT);
    $query->execute();
    header('location:job_listing.php');  
?>
