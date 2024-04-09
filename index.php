<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    //echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $location = $_POST['location'];
    $phone_number = $_POST['phone_number'];
    $other= $_POST['other'];
    $sql = "INSERT INTO `donor`.`person` (`Name`, `Age` , `Gender`, `Location`, `Phone Number`, `Other`) VALUES ('$name', '$age', '$gender', '$location', '$phone_number', '$other');";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to NourishhNinja</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to Our website NourishNinja </h3>
        <p>Enter your details here  </p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thank you for donation</p>";
        }
    ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="text" name="location" id="location" placeholder="Enter pickup location">
            <input type="phone" name="phone number" id="phone number" placeholder="Enter your phone number">
            <textarea name="other" id="other" cols="30" rows="10" placeholder="Any message you would like to give "></textarea>
            <button class="btn">Submit</button> 
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>
