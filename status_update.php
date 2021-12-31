<?php

    include('source/session.php');
    include('source/db_connect.php');


    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);

    if(isset($_POST['submit'])){
    $id=$_POST['applicationID'];


    $query = $conn->prepare("UPDATE `jobs_tbl` SET `jstatus`='$status' WHERE `id` = $id");
    $query->execute();
     ?>
        <script type="text/javascript">
            alert("Update Successfull.");
            window.location = "organization-dashboard.php";
        </script>
    <?php
        }              
?>


