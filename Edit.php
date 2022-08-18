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
    <?php 
        include("connection.php");
        $LID = $_GET['id'];
        $sql="SELECT L_ID,First_Name,Last_Name,Phone,Email,Password,LFile FROM lecturers WHERE L_ID = {$LID}";
        $result=mysqli_query($conn,$sql) or die("Query Unsuccessful!");

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
    ?>
    <div class="insert-banner">
        <div class="insert-content">
            <div class="insert-sub-content">
                <form class="form-control form-control-lg" action="Update.php" method="post" enctype="multipart/form-data">
                    <h2 class="LD">Edit Lecturer Details</h2>
                    <div class="mb-3">
                        <label for="FName" class="form-label form-control-lg">First Name</label>
                        <input type="hidden" class="form-control form-control-lg" id="" placeholder="" name="ID" value="<?php echo $row['L_ID']; ?>">
                        <input type="text" class="form-control form-control-lg" id="FName" placeholder="Ahmad" name="fname" value="<?php echo $row['First_Name']; ?>">
                        
                    </div>
                    
                    <div class="mb-3">
                        <label for="LName" class="form-label form-control-lg">Last Name</label>
                        <input type="text" class="form-control form-control-lg" id="LName" placeholder="Amranzadah" name="lname" value="<?php echo $row['Last_Name']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label form-control-lg">Phone Number</label>
                        <input type="text" class="form-control form-control-lg" id="phone" placeholder="+93700000000" name="phone" value="<?php echo $row['Phone']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="emai" class="form-label form-control-lg">Email address</label>
                        <input type="email" class="form-control form-control-lg" id="email" placeholder="Ahmad@gmail.com" name="email" value="<?php echo $row['Email']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label form-control-lg">Password</label>
                        <input type="password" class="form-control form-control-lg" id="exampleFormControlInput1" placeholder="Password" name="password" value="<?php echo $row['Password']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label form-control-lg">Photo</label>
                        <input type="file" class="form-control form-control-lg" id="file" name="lfile" value="<?php echo $row['LFile']; ?>">
                    </div>
                   
                    <div class="mb-3">
                        <button type="submit" class="btn btn-info form-control form-control-lg btn-lg" name="update">UPDATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
        }
    }
    ?>
    <script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
</body>
</html>
<?php
    }
    else{
        header("Location:Home.php");
    }
?>