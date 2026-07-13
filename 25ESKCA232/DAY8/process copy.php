<?php

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$branch = trim($_POST['branch']);
$phone = trim($_POST['phone']);
$gender = $_POST['gender'] ?? "";
$course = $_POST['course'] ?? "";
$address = trim($_POST['address']);

$errors = [];

// Name Validation
if (empty($name)) {
    $errors[] = "Name is required.";
}
elseif (!preg_match("/^[a-zA-Z ]+$/", $name)) {
    $errors[] = "Name should contain only letters.";
}

// Email Validation
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Please enter a valid email.";
}

// Phone Validation
if (!is_numeric($phone) || strlen($phone) != 10) {
    $errors[] = "Phone number must contain exactly 10 digits.";
}

// Gender Validation
if (empty($gender)) {
    $errors[] = "Please select gender.";
}

// Address Validation
if (strlen($address) < 10) {
    $errors[] = "Address should be at least 10 characters.";
}

?>

<!DOCTYPE html>

<html>

<head>

<title>Registration Result</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<?php

if(count($errors)>0){

echo '<div class="alert alert-danger">';
echo "<h4>Validation Errors</h4>";
echo "<ul>";

foreach($errors as $error){
    echo "<li>$error</li>";
}

echo "</ul>";
echo "</div>";

}

else{

?>

<div class="card shadow">

<div class="card-header bg-success text-white">
<h3>Registration Successful</h3>
</div>

<div class="card-body">

<h4>Welcome, <?php echo htmlspecialchars($name); ?>!</h4>

<table class="table table-bordered mt-3">

<tr>
<th>Name</th>
<td><?php echo htmlspecialchars($name); ?></td>
</tr>

<tr>
<th>Email</th>
<td><?php echo htmlspecialchars($email); ?></td>
</tr>

<tr>
<th>Branch</th>
<td><?php echo htmlspecialchars($branch); ?></td>
</tr>

<tr>
<th>Phone</th>
<td><?php echo htmlspecialchars($phone); ?></td>
</tr>

<tr>
<th>Gender</th>
<td><?php echo htmlspecialchars($gender); ?></td>
</tr>

<tr>
<th>Course</th>
<td><?php echo htmlspecialchars($course); ?></td>
</tr>

<tr>
<th>Address</th>
<td><?php echo htmlspecialchars($address); ?></td>
</tr>

<tr>
<th>Photo</th>
<td>Photo selected (UI only)</td>
</tr>

</table>

</div>

</div>

<?php
}
?>

</div>

</body>

</html>