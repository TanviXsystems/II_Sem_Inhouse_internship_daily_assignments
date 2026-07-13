<?php

include("connectVault.php");

include("uploadPortrait.php");

$name=$_POST['full_name'];

$email=$_POST['email'];

$branch=$_POST['branch'];

$cgpa=$_POST['cgpa'];

$status=$_POST['student_status'];

$query=$link->prepare("
INSERT INTO learners
(full_name,email,branch,cgpa,student_status,photo)
VALUES(?,?,?,?,?,?)
");

$query->bind_param(
"sssiss",
$name,
$email,
$branch,
$cgpa,
$status,
$photoName
);

$query->execute();

header("Location: launchpad.php?success=Student Added");

exit;

?>