<?php

include("access_gate.php");
include("vault_connect.php");

$id=$_SESSION['user_id'];

$data=mysqli_query($link,"SELECT * FROM users WHERE id=$id");
$user=mysqli_fetch_assoc($data);

?>

<!DOCTYPE html>

<html>

<head>

<title>Student Hub</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="theme_matrix.css">

</head>

<body>

<nav class="navbar navbar-dark bg-dark">

<div class="container">

<span class="navbar-brand">

Student Management Portal

</span>

<div>

<img src="<?php echo $user['profile_pic']; ?>" width="45" height="45" class="rounded-circle">

<span class="text-white ms-2">

<?php echo $_SESSION['user_name']; ?>

</span>

<a href="session_exit.php" class="btn btn-danger btn-sm ms-3">

Logout

</a>

</div>

</div>

</nav>

<div class="container mt-5">

<div class="card shadow p-4">

<h2>

Welcome,

<?php echo $_SESSION['user_name']; ?>

🎉

</h2>

<hr>

<p>

<strong>Email :</strong>

<?php echo $_SESSION['user_email']; ?>

</p>

<p>

<strong>Last Login :</strong>

<?php echo $user['last_login']; ?>

</p>

<a href="profile_space.php" class="btn btn-primary">

View Profile

</a>

<a href="key_update.php" class="btn btn-warning">

Change Password

</a>

</div>

</div>

</body>

</html>