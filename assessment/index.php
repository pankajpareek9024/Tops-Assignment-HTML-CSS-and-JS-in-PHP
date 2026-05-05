<?php

include_once 'db.php';
$message = "";
if(isset($_POST['submit'])){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $vehicle = trim($_POST['vehicle']);
    $complaint = trim($_POST['complaint']);

    if (empty($name) || empty($email) || empty($phone) || empty($vehicle) || empty($complaint)) {
        header("Location: index.php?error=1");
        exit();
    }else{

        $query = "INSERT INTO customer (name,email,phone,vehicle,complaint)
                VALUES ('$name','$email','$phone','$vehicle','$complaint')";

        if(mysqli_query($connection,$query)) {
            header("Location: index.php?success=1");
            exit();
        }else{
            header("Location: index.php?error=2");
            exit();
        }
        
    }
    
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechEdge Motors</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    .valid {
        max-width: 40%;
        margin: auto;
        padding: 20px;
    }
    </style>
</head>

<body>

    <div class="valid">

       <?php
    if(isset($_GET['success'])){
        echo '<div class="alert alert-success text-center"> Complaint Registered Successfully</div>';
    }

    if(isset($_GET['error']) && $_GET['error'] == 1){
        echo '<div class="alert alert-danger text-center"> Please fill all fields</div>';
    }

    if(isset($_GET['error']) && $_GET['error'] == 2){
        echo '<div class="alert alert-danger text-center"> Database Error</div>';
    }
    ?>
        <form method="POST" action="" class="bg-primary p-5 text-white rounded">

            <h2 class="text-center mb-4">TechEdge Motors</h2>

            <div class="mb-3">
                <label>Name :</label>
                <input class="form-control" type="text" name="name" placeholder="Enter your name" required>
            </div>

            <div class="mb-3">
                <label>Email :</label>
                <input class="form-control" type="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="mb-3">
                <label>Phone :</label>
                <input class="form-control" type="tel" name="phone" pattern="[0-9]{10}" maxlength="10"
                    placeholder="Enter phone number" required>
            </div>

            <div class="mb-3">
                <label>Vehicle Number :</label>
                <input class="form-control" type="text" name="vehicle" placeholder="Enter vehicle number" required>
            </div>

            <div class="mb-3">
                <label>Complaint :</label>
                <textarea class="form-control" name="complaint" rows="3" placeholder="Enter your complaint"
                    required></textarea>
            </div>

            <div class="mb-3 mt-4">
                <button class="btn btn-danger w-100" type="submit" name="submit">Submit</button>
            </div>

            <div class="text-center">
                <a href="view.php" class="text-white">View Complaints</a>
            </div>

        </form>
    </div>

</body>

</html>
