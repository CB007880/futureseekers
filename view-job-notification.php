
<?php include ('save_to_db.php'); ?>

<?php

  if (isset($_POST['close_note'])) {

  $note_id = $_POST['note_id'];

  $status = 'read';
  
  $query_note = "UPDATE notification_tbl SET status='$status' WHERE note_id ='$note_id' ";

  mysqli_query($conn, $query_note);
    
    header("location: job-notification.php");
  }

?>
 ?>

<!DOCTYPE html>
<html>
<head>  
  <title>view notification</title>
  <!--custom CSS-->
  <link rel="stylesheet" type="text/css" href="assets/css/jobSeeker_Profile.css">
  <!--Bootstrap link-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- font awsome icons-->
  <link href="assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="extra/css/bootstrap.min.css" />
    <link rel="stylesheet" href="extra/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="extra/css/fonts.googleapis.com.css" />
    <link rel="stylesheet" href="extra/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
    <link rel="stylesheet" href="extra/css/ace-skins.min.css" />
    <link rel="stylesheet" href="extra/css/ace-rtl.min.css" />
    <script src="extra/js/ace-extra.min.js"></script>

</head>
<body>

<div class="container">
    <div class="main-body">   
          <div class="row gutters-sm">

            <div class="col-md-12">

              <?php if(isset($_GET['noteID']) && !empty($_GET['noteID'])): ?>
              <?php $id = $_GET['noteID']; ?>
               <?php $notification = mysqli_query($conn, "SELECT * FROM notification_tbl WHERE note_id='$id' "); ?>
                          <?php while($row = mysqli_fetch_array($notification)){ ?>

              <div class="row gutters-sm">
                <div class="col-xs-12">
                  <div class="card h-100">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="widget-box transparent" id="widget-box-12">
                        <div class="widget-header">
                          <h4 class="widget-title lighter"><?php echo $row['note_title']; ?></h4>

                          <div class="widget-toolbar no-border">
                            <form method="POST" style="display: inline-block;">
                             <button type="submit" style="border: none;height: 2px;background-color: white;">
                              <i class="ace-icon fa fa-trash"></i>
                            </a>
                          </form>

                            <form method="POST" style="display: inline-block;">
                             <button type="submit" style="border: none;height: 2px;background-color: white;">
                              <i class="ace-icon fa fa-refresh"></i>
                            </a>
                          </form>

                            <form method="POST" style="display: inline-block;">
                              <input type="text" name="note_id" value="<?php echo $id; ?>" style="display: none;" readonly>
                            <button type="submit" name="close_note" style="border: none;height: 2px;background-color: white;">
                              <i class="ace-icon fa fa-times"></i>
                            </button>
                          </form>

                          </div>
                        </div>

                        <div class="widget-body">
                          <div class="widget-main padding-6 no-padding-left no-padding-right">
                            <?php echo $row['content']; ?>
                          </div>
                        </div>
                      </div>
                        </div>
                      </div>    
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          <?php endif ?>

            </div>
          </div>
        </div>
    </div>
</body>
</html>