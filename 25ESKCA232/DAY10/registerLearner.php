<?php
include("connectVault.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Student</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="visualTheme.css">

</head>
<body>

<div class="container mt-5">

<div class="card p-4">

<h2 class="mb-4">Register Student</h2>

<form action="saveLearner.php" method="POST" enctype="multipart/form-data">

<div class="mb-3">
<label>Name</label>
<input type="text" name="full_name" class="form-control" required>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label>Branch</label>
<select name="branch" class="form-select" required>
<option>CSE</option>
<option>CS-AI</option>
<option>IT</option>
<option>ECE</option>
<option>ME</option>
<option>CE</option>
</select>
</div>

<div class="mb-3">
<label>CGPA</label>
<input type="number" step="0.01" min="0" max="10" name="cgpa" class="form-control" required>
</div>

<div class="mb-3">
<label>Status</label>
<select name="student_status" class="form-select">
<option>Active</option>
<option>Inactive</option>
</select>
</div>

<div class="mb-3">
<label>Profile Photo</label>
<input type="file" name="photo" class="form-control" accept="image/*">
</div>

<button class="btn btn-success">
Save Student
</button>

<a href="launchpad.php" class="btn btn-secondary">
Back
</a>

</form>

</div>

</div>

</body>
</html>