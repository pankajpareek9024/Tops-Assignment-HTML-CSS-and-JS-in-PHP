<?php
session_start();

$message = "";

// Hardcoded user (simple assignment ke liye)
$valid_user = "admin";
$valid_pass = "1234";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == $valid_user && $password == $valid_pass){
        $_SESSION['user'] = $username;

        header("Location: dashboard.php");
        exit();
    } else {
        $message = "❌ Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5" style="max-width:400px;">

    <h3 class="text-center mb-4">AutoFix HelpDesk Login</h3>

    <?php if($message != ""){ ?>
        <div class="alert alert-danger text-center"><?php echo $message; ?></div>
    <?php } ?>

    <form method="POST">
        <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
        <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
        <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
    </form>

</div>

</body>
</html>