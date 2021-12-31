<?php
    include('source/session.php');
    include('source/db_connect.php');
    $id=$_GET['id'];
    $query = $conn->prepare("DELETE FROM `job_listings` where id='$id'");
    $query->execute();
	header('location:job_listing.php');
?>