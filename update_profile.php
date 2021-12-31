<?php
    include('source/session.php');
    include('source/db_connect.php');


    if(isset($_POST['submit'])){
    $id=$_GET['id'];
    $about=$_POST['about'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $mobile=$_POST['phone-alt'];
    $address=$_POST['address'];
    $website=$_POST['web'];
    $github=$_POST['github'];
    $twitter=$_POST['twitter'];
    $instagram=$_POST['insta'];
    $facebook=$_POST['fb'];


    $query = $conn->prepare("UPDATE `users` SET `about`='$about', `email`='$email', `phone`='$phone', `phone-alt`='$mobile', `address`='$address', `web`='$website', `github`='$github', `twitter`='$twitter', `insta`='$instagram', `fb`='$facebook', WHERE `id` = :id");
    $query->bindParam(":id", $_GET["id"], PDO::PARAM_INT);
    $query->execute();
     ?>
                     <script type="text/javascript">
            alert("Update Successfull.");
            window.location = "company_profile.php";
        </script>
        <?php
             }              
?>