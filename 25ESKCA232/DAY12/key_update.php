<?php

require_once "access_gate.php";

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Change Password</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="theme_matrix.css">

</head>

<body>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-lg-6">

<div class="card shadow">

<div class="card-body">

<h3 class="mb-4">

Change Password

</h3>

<form>

<div class="mb-3">

<label>

Current Password

</label>

<input
type="password"
class="form-control">

</div>

<div class="mb-3">

<label>

New Password

</label>

<input
type="password"
class="form-control">

</div>

<div class="mb-4">

<label>

Confirm Password

</label>

<input
type="password"
class="form-control">

</div>

<div class="d-grid">

<button
class="btn btn-success">

Update Password

</button>

</div>

</form>

<a
href="student_hub.php"
class="btn btn-secondary mt-3">

Back

</a>

</div>

</div>

</div>

</div>

</div>

</body>

</html>