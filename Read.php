<?php
    include("connection.php");
    $sql="SELECT L_ID,First_Name,Last_Name,Position,LFile FROM lecturers";
    $result=mysqli_query($conn,$sql) or die("Query Unsuccessful!");
    
?>