<?php

session_start();

if(isset($_SESSION["user_id"]))
{
    header("Location: student_hub.php");
    exit();
}

$message = "";

if(isset($_GET["error"]))
{
    switch($_GET["error"])
    {
        case "1":
            $message = "Invalid Email or Password!";
            break;

        case "sessionexpired":
            $message = "Your session expired. Please login again.";
            break;

        default:
            $message = "Unable to login.";
    }
}

if(isset($_GET["logout"]))
{
    $message = "Logged out successfully.";
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Campus Secure Portal</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<link rel="stylesheet" href="theme_matrix.css">

</head>

<body>

<div class="login-wrapper">

<div class="card shadow-lg login-card">

<div class="card-body p-5">

<div class="text-center mb-4">

<i class="fa-solid fa-user-shield fa-4x text-primary mb-3"></i>

<h2>Campus Secure Portal</h2>

<p class="text-muted">

Student Authentication System

</p>

</div>

<?php if($message!=""){ ?>

<div class="alert alert-danger">

<?php echo $message; ?>

</div>

<?php } ?>

<form
action="identity_check.php"
method="POST"
onsubmit="return validateLogin();">

<div class="mb-3">

<label class="form-label">

Email Address

</label>

<div class="input-group">

<span class="input-group-text">

<i class="fa-solid fa-envelope"></i>

</span>

<input
type="email"
name="email"
class="form-control"
placeholder="student@example.com"
required>

</div>

</div>

<div class="mb-4">

<label class="form-label">

Password

</label>

<div class="input-group">

<span class="input-group-text">

<i class="fa-solid fa-lock"></i>

</span>

<input
type="password"
id="loginPassword"
name="password"
class="form-control"
placeholder="Enter Password"
required>

<button
type="button"
class="btn btn-outline-secondary"
onclick="togglePassword();">

<i class="fa-solid fa-eye"></i>

</button>

</div>

</div>

<div class="d-grid">

<button
type="submit"
class="btn btn-primary btn-lg">

<i class="fa-solid fa-right-to-bracket"></i>

Login

</button>

</div>

</form>

<div class="text-center mt-4">

<a href="recover_view.php">

Forgot Password?

</a>

</div>

<hr>

<div class="demo-box">

<h6 class="mb-2">

Demo Credentials

</h6>

<p class="mb-1">

<strong>Email :</strong>

tanvi@gmail.com

</p>

<p class="mb-0">

<strong>Password :</strong>

123456

</p>

</div>

</div>

</div>

</div>

<script src="motion_script.js"></script>

</body>

</html>