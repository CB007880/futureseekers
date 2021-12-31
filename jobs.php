<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<!--Bootstrap link-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    
    <link rel="stylesheet" type="text/css" href="jobsHTML.css">

     <!-- Custom  Css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />

    <!-- font awsome icons-->
    <link href="assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">


</head>
<body>
	<!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div>
    <!-- Loader -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="index.php" >FutureSeekers</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link pl-4" href="jobs.php">Jobs <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown" >
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Company
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">About Us</a>
          <a class="dropdown-item" href="#">Pricing Plans</a>
          <a class="dropdown-item" href="#">FAQ's</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact Us</a>
      </li>
    </ul>
  </div>
<form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>
	<div class="container">
	<?php
	include('source/db_connect.php');
	include('source/session.php');

	$query = $conn->prepare("SELECT * FROM `job_listings`");
    $query->execute();
    if ($query->rowCount()>0):
      // output data of each row
    	while($row = $query->fetch()):?>
		<div class="row">
    		<div class="col-lg-12">
        		<div class="card card-margin">
            		<div class="card-header no-border">
                		<h5 class="card-title"></h5>
            		</div>
            		<div class="card-body pt-0">
                		<div class="widget-49">
                    		<div class="widget-49-title-wrapper">
                        		<div class="widget-49-date-primary">
                            		<img src="images/abcd.jpg" class="img-fluid">
                        		</div>
                        		<div class="widget-49-meeting-info">
                            		<span class="widget-49-pro-title"><?php echo $row['title']; ?></span>
                            		<span class="widget-49-meeting-time">Posted on: <?php echo $row['pdate']; ?></span>
                        		</div>
                    		</div>
                    		<ul class="widget-49-meeting-points mt-4">
                        		<li class="widget-49-meeting-item"><span>Estimated Salary: <?php echo $row['salary']; ?></span></li>
                        		<li class="widget-49-meeting-item"><span>Hiring Until: <?php echo $row['edate']; ?></span></li>
                        		<li class="widget-49-meeting-item"><span>Required Experience: <?php echo $row['experience']; ?></span></li>
                        		<li class="widget-49-meeting-item"><span>Job Description: <?php echo $row['description']; ?></span></li>
                    		</ul>
                    		<div class="widget-49-meeting-action">
                        		<div class="btn btn-sm btn-flash-border-primary" onclick="openfile('<?php echo "application-".$row['id'];?>')">Apply now</div>

                            <form action="application.php" method="post" enctype="multipart/form-data" id="<?php echo "form-".$row['id']; ?>">
                              <input type="hidden" name="job_id" value="<?php echo $row['id'];?>"> 
                              <input type="hidden" name="comp_id" value="<?php echo $row['user_id'];?>">
                              <input type="file" name="application" class="d-none" id="<?php echo "application-".$row['id']; ?>" onChange="submitform('<?php echo "form-".$row['id'];?>')">
                            </form>
                    		</div>
                		</div>
            		</div>
        		</div>
    		</div>
		</div>
		<?php
        endwhile;
   	endif;
    ?>
	</div>


        <!-- javascript -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/app.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
  function openfile(id){
    $("#"+id).trigger('click');
  }

  function submitform(id){
    $("#"+id).submit();
  }

</script>
</body>
</html>

