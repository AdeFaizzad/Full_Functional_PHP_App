<?php
    session_start();
    if(isset($_SESSION['auth'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

    <title>Aria Lowa State University</title>
</head>
<body>
    <div class="insert-banner">
        <div class="insert-content">
            <div class="insert-sub-content">
                <form class="form-control form-control-lg" action="Insert.php" method="post" enctype="multipart/form-data">
                    <h2 class="LD">Lecturer Details</h2>
                    <div class="mb-3">
                        <label for="FName" class="form-label form-control-lg">First Name</label>
                       
                        <input type="text" class="form-control form-control-lg" id="FName" placeholder="Ahmad" name="fname">
                        
                    </div>
                    
                    <div class="mb-3">
                        <label for="LName" class="form-label form-control-lg">Last Name</label>
                        <input type="text" class="form-control form-control-lg" id="LName" placeholder="Amranzadah" name="lname">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label form-control-lg">Phone Number</label>
                        <input type="text" class="form-control form-control-lg" id="phone" placeholder="+93700000000" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="emai" class="form-label form-control-lg">Email address</label>
                        <input type="email" class="form-control form-control-lg" id="email" placeholder="Ahmad@gmail.com" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label form-control-lg">Password</label>
                        <input type="password" class="form-control form-control-lg" id="exampleFormControlInput1" placeholder="Password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label form-control-lg">Photo</label>
                        <input type="file" class="form-control form-control-lg" id="file" name="lfile">
                    </div>
                   
                    <div class="mb-3">
                        <button type="submit" class="btn btn-info form-control form-control-lg btn-lg" name="sub">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
</body>
</html>

<?php

include("connection.php");

if(isset($_POST['sub'])){
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

                $sql = "INSERT INTO lecturers(First_Name,Last_Name,Phone,Email,Password,LFile)
                        VALUES ('$fName','$lName','$phone','$Email','$Password','$lFile')";
                        
                        mysqli_query($conn, $sql);
                        header("location:Dashboard.php");
            } else{
                echo"Sorry there is some problem with data insertion!";
            }
        }
}
    } else{
        header("Location:Home.php");
    }
?>