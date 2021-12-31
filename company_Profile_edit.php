<?php

    include('source/session.php');
    include('source/db_connect.php');

    $query = $conn->prepare("SELECT * FROM `users` WHERE `id` = :id");
    $query->bindParam(":id", $_SESSION["id"], PDO::PARAM_INT);
    $query->execute();
    $row = $query->fetch();

?>

<!DOCTYPE html>
<html>
<head>
	<!--Bootstrap link-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="assets/css/jobSeeker_Profile_edit.css">

	<title></title>
</head>
<body>

	<div class="container">
<div class="row justify-content-center">
    <div class="col-12 col-lg-10 col-xl-8 mx-auto">
        <h2 class="h3 mb-4 pt-4 page-title">Settings</h2>
        <div class="my-4">
            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Profile</a>
                </li>
            </ul>
            <form method="POST">
                <div class="row mt-5 align-items-center">
                    <div class="col-md-5 text-center mb-5">
                        <div class="avatar avatar-xl">
                            <img src="images/cb.png" alt="Admin" width="350" height="70">
                        </div>
                    </div>

                    <div class="col">

                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4 class="mb-1"><?php echo $row['name']; ?></h4>
                                <p class="small mb-3"><span class="badge badge-dark"><?php echo $row['location']; ?></span></p>
                            </div>
                        </div>

                        <div class="row mb-6">
                            <div class="col-md-6">
                                <textarea rows="5" cols="50" name="about"><?php echo $row['about']; ?></textarea>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <hr class="my-4" />
                    <div class="form-group">
                        <label for="companyname">Company Name</label>
                        <input type="text" class="form-control"  name="cname" value="<?php echo $row['name']; ?>">
                    </div> 
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control"  name="email" value="<?php echo $row['email']; ?>">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control"  name="phone" value="<?php echo $row['phone']; ?>">
                </div>
                <div class="form-group">
                    <label for="phone-alt">Mobile</label>
                    <input type="text" class="form-control"  name="phone-alt" value="<?php echo $row['phone-alt']; ?>">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control"  name="address" value="<?php echo $row['address']; ?>">
                </div>

                 <div class="form-row">

                    <div class="form-group col-md-2">
                        <label for="website">Website</label>
                        <input type="text" class="form-control"  name="web" value="<?php echo $row['web']; ?>">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="github">GitHub</label>
                        <input type="text" class="form-control"  name="github" value="<?php echo $row['github']; ?>">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="twitter">Twitter</label>
                        <input type="text" class="form-control"  name="twitter" value="<?php echo $row['twitter']; ?>">
                    </div> 

                    <div class="form-group col-md-2">
                        <label for="instagram">Instagram</label>
                        <input type="text" class="form-control"  name="insta" value="<?php echo $row['insta']; ?>">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="facebook">Facebook</label>
                        <input type="text" class="form-control"  name="fb" value="<?php echo $row['fb']; ?>">
                    </div>

                    <button type="submit" name="submit" class="form-group btn btn-primary">Save Changes</button>

                </div>


                <hr class="my-4" />
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputPassword4">Old Password</label>
                            <input type="password" class="form-control"  />
                        </div>
                        <div class="form-group">
                            <label for="inputPassword5">New Password</label>
                            <input type="password" class="form-control"  />
                        </div>
                        <div class="form-group">
                            <label for="inputPassword6">Confirm Password</label>
                            <input type="password" class="form-control"  />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-2">Password requirements</p>
                        <p class="small text-muted mb-2">To create a new password, you have to meet all of the following requirements:</p>
                        <ul class="small text-muted pl-4 mb-0">
                            <li>Minimum 8 character</li>
                            <li>At least one special character</li>
                            <li>At least one number</li>
                            <li>Can’t be the same as a previous password</li>
                        </ul>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
</div>

</div>

</body>
</html>

<?php
    if(isset($_POST['submit'])){
    $id=$_SESSION['id'];
    $name=$_POST['cname'];
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


    $query = $conn->prepare("UPDATE `users` SET `about`='$about', `name`= '$name', `email`='$email', `phone`='$phone', `phone-alt`='$mobile', `address`='$address', `web`='$website', `github`='$github', `twitter`='$twitter', `insta`='$instagram', `fb`='$facebook' WHERE `id` = $id");
    $query->execute();
    ?>
    <script type="text/javascript">
    alert("Update Successfull.");
    window.location = "company_profile.php";
    </script>
        <?php
             }              
?>