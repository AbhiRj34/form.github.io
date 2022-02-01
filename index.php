<?php
   $insert = false;
   if(isset($_POST['name'])){
   $server = "localhost";
   $username = "root";
   $password = "";

   $con = mysqli_connect($server, $username ,$password);

if(!$con){
    die("connection to this database failed due to" .mysqli_connect_error());
}
// echo "Success connecting to the db";

$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$massage = $_POST['massage'];
$sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$massage', current_timestamp());";
//echo $sql;

if($con->query($sql) == true) {
    //echo "Successfully insreted";
    $insert = true;
}
else {
    echo "ERROR : $sql <br> $con->error";
}

$con->close();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <img src="image/c1.jpeg" alt="" class="bg">
        <h1>Welcome to R.P.G.C Dausa jaipur Trip form</h1>
        <p>Enter your details to confirm your participation in this trip and submit this form</p>
        
         <?php
         if($insert == true){
          echo "<p id='bm'>Thank for coming wiht us on this trip . Your data will collected.</p>";
        }
         ?>
        
        <form action="index.php" method="POST">
            <input type="text" name="name" id="name" placeholder="Enter your name" required>
            <input type="text" name="age" id="age" placeholder="Enter your age" required>
            <input type="text" name="gender" id="gender" placeholder="Enter your gender" required>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone" required>
            <textarea name="massage" id="massage" cols="30" rows="10" placeholder="Enter any other information here" required></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>