<?php

require_once "access_gate.php";

require_once "vault_connect.php";

$id=$_SESSION["user_id"];

$stmt=mysqli_prepare(
$link,
"SELECT * FROM users WHERE id=?"
);

mysqli_stmt_bind_param(
$stmt,
"i",
$id
);

mysqli_stmt_execute($stmt);

$result=mysqli_stmt_get_result($stmt);

$user=mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>My Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="theme_matrix.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-lg-5">

<div class="card shadow text-center">

<div class="card-body">

<img

src="<?php echo $user["profile_pic"]; ?>"

class="rounded-circle mb-3"

width="140"

height="140">

<h3>

<?php echo $user["name"]; ?>

</h3>

<hr>

<p>

<strong>Email</strong>

<br>

<?php echo $user["email"]; ?>

</p>

<p>

<strong>Last Login</strong>

<br>

<?php echo $user["last_login"]; ?>

</p>

<p>

<strong>Session Started</strong>

<br>

<?php echo $_SESSION["login_time"]; ?>

</p>

<a
href="student_hub.php"
class="btn btn-primary">

Dashboard

</a>

</div>

</div>

</div>

</div>

</div>

</body>

</html>