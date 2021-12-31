<?php 
require_once 'source/db_connect.php'; 
?>

<?php 

//start sessions
//session_start();

$_SESSION['success'] = "";
$_SESSION['empty'] = "";
$_SESSION['error'] = "";
$_SESSION['none'] = "";
$errors = array();

//create database connection
$conn = new mysqli ('localhost','root','','futureseekers');

?>

<?php 

// SAVE CV ATTACHMENT
// ==============================================
if(isset($_POST['submit_cv'])){ 


    $target = 'uploads/';
    $user_id = $_POST['user_id'];
    $job_id = $_POST['job_id'];
    $status = "Pending";

    // send notification
          $sender_id = "1"; // replace with admin session id.
          $note_title = "Application Received";
          $status = "Unread";
          $content = "We have received your CV for accreditation. You will be contancted if you application is successful";

    $cv = $_FILES['cv_attachment']['name'];
    $file = $target.$cv;

    $extension = pathinfo($cv, PATHINFO_EXTENSION);
   

    if (empty($cv)) {
      $_SESSION['empty'] = "Add at least attach one Document!";
    }
    
   elseif (!in_array($extension, ['pdf'])) {
    	$_SESSION['error'] = "Your Document Must be  .pdf";
    }
    else{
    
    //insert file information into db table
    
    $mysql_insert = "INSERT INTO attachment_tbl (user_id,job_id,cv_attachment,date_added,status) VALUES('$user_id','$job_id','$cv','".date("y-m-d H:i:s")."', '$status')";
    mysqli_query($conn, $mysql_insert);

    if(move_uploaded_file($_FILES['cv_attachment']['tmp_name'],$file)){

        $sql = "INSERT INTO notification_tbl (receiver_id, sender_id, note_title, status, content, post_date) VALUES ('$user_id', '$sender_id', '$note_title', '$status', '$content', '".date("y-m-d H:i:s")."')";
        mysqli_query($conn, $sql);
      
    }  
    }

}


?>

