<?php
      session_start();
      if(isset($_SESSION['auth'])){
        $LID = $_GET['id'];
        
        include("connection.php");
        $sql = "DELETE FROM lecturers WHERE L_ID = $LID";
        mysqli_query($conn,$sql) or die("Deletion was Unsuccessful!");
        header("location:Dashboard.php");

        mysqli_close($conn);
      }
      else{
        header("Location:Home.php");
    }
?>