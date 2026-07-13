<?php
session_start();

if(isset($_SESSION['user_id'])){
    header("Location: student_hub.php");
    exit();
}

$error = "";

if(isset($_GET['error'])){
    $error = "Invalid Email or Password";
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Campus Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="theme_matrix.css">

</head>

<body>

<div class="login-box">

<div class="card shadow-lg p-4">

<h2 class="text-center mb-4">Student Login</h2>

<?php
if($error!=""){
echo "<div class='alert alert-danger'>$error</div>";
}
?>

<form action="identity_check.php" method="POST">

<div class="mb-3">
<label>Email</label>
<input
type="email"
name="email"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Password</label>
<input
type="password"
name="password"
id="pass"
class="form-control"
required>
</div>

<div class="form-check mb-3">
<input
type="checkbox"
class="form-check-input"
onclick="togglePassword()">

<label class="form-check-label">
Show Password
</label>
</div>

<button class="btn btn-success w-100">
Login
</button>

</form>

<div class="text-center mt-3">
<a href="recover_view.php">
Forgot Password?
</a>
</div>

</div>

</div>

<script src="motion_script.js"></script>

</body>
</html>