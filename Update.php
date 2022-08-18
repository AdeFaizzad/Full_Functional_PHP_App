<?php

include("connection.php");

if(isset($_POST['update'])){
    $LID = $_POST["ID"];
    $fName = $_POST["fname"];
    $lName = $_POST["lname"];
    $phone = $_POST["phone"];
    $Email = $_POST["email"];
    $Password = $_POST["password"];
    

        if(isset($_FILES['lfile']['name'])){
            $lFile = $_FILES["lfile"]["name"];
            $ext = explode(".",$lFile);
            $cn = count($ext);

            if($ext[$cn-1]=='jpg' || $ext[$cn-1]=='png' || $ext[$cn-1]=='jpeg'){
                $tm = $_FILES["lfile"]["tmp_name"];
                move_uploaded_file($tm,"profile_pic/".$lFile);

                $sql = "UPDATE lecturers SET First_Name='$fName',Last_Name='$lName',Phone='$phone',Email='$Email',Password='$Password',LFile='$lFile' WHERE L_ID=$LID";
                       
                        
                        mysqli_query($conn, $sql);
                        header("location:Dashboard.php");
            } else{
                
                echo"Sorry there is some problem with data Updation!";
                
            }
        }
} else{
    header("Location:Home.php");
}
?>