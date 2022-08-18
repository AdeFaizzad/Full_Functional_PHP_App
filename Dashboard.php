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
    <title>Aria Lowa State University</title>
</head>
<body>

    <?php
        include("Navbar.php");
        include("Read.php");
        
        if(mysqli_num_rows($result) > 0){
    ?>
    <h1 class="list-of-lecturers">List of All Lecturers</h1>
    <div class="the-card">
        
        <?php 
            while($row = mysqli_fetch_assoc($result)){
        ?>
        <div class="card" style="width: 18rem;">
            <img src="profile_pic/<?php echo $row['LFile']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['First_Name']; echo" "; echo $row['Last_Name']; ?></h5>
                <p class="card-text">
                   <?php echo $row['Position']; ?>
                </p>
            </div>
            <div class="card-body">
                <a href="Edit.php?id=<?php echo $row['L_ID'];?>" class="card-link"><button class="btn btn-info">Edit</button></a>
                <a href="Delete.php?id=<?php echo $row['L_ID'];?>" class="card-link"><button class="btn btn-danger">Delete</button></a>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
    <?php
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