<?php
    session_start();

    if(!isset($_SESSION['auth'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Aria Lowa State University</title>
</head>
<body>
    <div class="login-banner">
        <div class="login-content">
            <div class="log-sub-content">
                <form class="form-control form-control-lg" action="Login.php" method="post">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label form-control-lg">Email address</label>
                        <input type="email" class="form-control form-control-lg" id="exampleFormControlInput1" placeholder="name@example.com" name="aEmail">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label form-control-lg">Password</label>
                        <input type="password" class="form-control form-control-lg" id="exampleFormControlInput1" placeholder="Password" name="aPassword">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-info form-control form-control-lg btn-lg" name="sub-log">Login</button>
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

    if(isset($_POST['sub-log'])){
        $adminEmail = $_POST["aEmail"];
        $adminPassword = $_POST["aPassword"];
    
        $sql = "select * from users where U_Email='$adminEmail' and U_Password='$adminPassword'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
    
        if($count == 1){  
            $_SESSION['auth']="yes";
            header("Location:Dashboard.php");
        } else{  
                echo "<h1> Login failed. Invalid Email or Password.</h1>";  
            }  
    }
}
else{
    header("Location:Home.php");
}
?>