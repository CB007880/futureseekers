<?php
  require_once 'source/db_connect.php';
?>

<?php 

  // declare variables 

           $sender_id = "";
           $receiver_id = "";
          $note_title = "";
          $status = "";
          $content = "";
          $date = "";

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>test</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <div>
    <h2 align="center">Approval</h2>
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Username</th>
      <th scope="col">Registration Date</th>
      <th scope="col">Status</th>
      <th scope="col">Approve</th>
    </tr>
  </thead>

<?php
  try {
    $statement = $conn->prepare("SELECT * FROM users WHERE status = 0");
    $statement->execute();
    if ($statement->rowCount()>0):
      // output data of each row
      while($row = $statement->fetch()):
        if($row["status"]==0):
          $status="pending"; 
        endif;
      ?>

        <tr>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['username'];?></td>
            <td><?php echo $row['registration_date'];?></td>
            <td><?php echo $status;?></td>
            <td>
                <form action ="adminapproval.php" method ="POST">
                    <input type = "hidden" name  ="id" value = "<?php echo $row['id'];?>"/>
                    <input type = "submit" name  ="approve" value = "Approve"/>
                    <input type = "submit" name  ="deny" value = "Deny"/>
                </form>
            </td>
        </tr>
<?php
      endwhile;
      echo "</table>";
      if(isset($_POST['approve'])){

        $id = $_POST['id'];

        // For notification
          $sender_id = "1"; // replace with admin session id.
          $note_title = "Signup Approved";
          $status = "Unread";
          $content = "Your signup to Futureseekers was approved by the administration.";
          $date = date("Y-m-d H:i:s");

        $statement = $conn->prepare("UPDATE users SET status = '1' WHERE id = '$id'");
        $statement->execute();

        // send notification
        if($statement){
          $sql = $conn->prepare("INSERT INTO `notification_tbl` (`receiver_id`, `sender_id`, `note_title`, `status`, `content`, `post_date`) VALUES ('$id', '$sender_id', '$note_title', '$status', '$content', '$date')");
          $sql->execute();
        }

        echo '<script type = "text/javascript">';
        echo 'alert("User Approved!");';
        echo 'window.location.href = "adminapproval.php"';
        echo '</script>';
      }

      if(isset($_POST['deny'])){

        $id = $_POST['id'];

        // send notification
          $sender_id = "1"; // replace with admin session id.
          $note_title = "Signup Declined";
          $status = "Unread";
          $content = "Your signup to Futureseekers was declined by the administration.";
          $now = date("Y-m-d H:i:s");

        // $statement = $conn->prepare("DELETE FROM users WHERE id = '$id'");
        // $statement->execute();

          $statement = $conn->prepare("UPDATE users SET status = '0' WHERE id = '$id'");
          $statement->execute();

        // send notification
          if($statement){
          $sql = $conn->prepare("INSERT INTO `notification_tbl` (`receiver_id`, `sender_id`, `note_title`, `status`, `content`, `post_date`) VALUES ('$id', '$sender_id', '$note_title', '$status', '$content', '$now')");
          $sql->execute();
        }

        echo '<script type = "text/javascript">';
        echo 'alert("User Denied!");';
        echo 'window.location.href = "adminapproval.php"';
        echo '</script>';
}
    endif;
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
?>

</table>
</div>
</body>
</html>