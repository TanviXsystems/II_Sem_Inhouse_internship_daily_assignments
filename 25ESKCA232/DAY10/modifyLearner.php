<?php
include("connectVault.php");

$id = $_GET['id'];

$stmt = $link->prepare("SELECT * FROM learners WHERE learner_id=?");
$stmt->bind_param("i",$id);
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();

if(isset($_POST['update'])){

$name=$_POST['full_name'];
$email=$_POST['email'];
$branch=$_POST['branch'];
$cgpa=$_POST['cgpa'];
$status=$_POST['student_status'];

$photo=$row['photo'];

if($_FILES['photo']['error']==0){

if(!is_dir("media/uploads")){
mkdir("media/uploads",0777,true);
}

$photo=time()."_".$_FILES['photo']['name'];

move_uploaded_file(
$_FILES['photo']['tmp_name'],
"media/uploads/".$photo
);

}

$update=$link->prepare("
UPDATE learners
SET
full_name=?,
email=?,
branch=?,
cgpa=?,
student_status=?,
photo=?
WHERE learner_id=?
");

$update->bind_param(
"sssissi",
$name,
$email,
$branch,
$cgpa,
$status,
$photo,
$id
);

$update->execute();

header("Location: launchpad.php?updated=1");
exit;
}
?>

<!DOCTYPE html>
<html>
<head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="visualTheme.css">

</head>

<body>

<div class="container mt-5">

<div class="card p-4">

<h2>Edit Student</h2>

<form method="POST" enctype="multipart/form-data">

<input
class="form-control mb-3"
name="full_name"
value="<?= $row['full_name']; ?>"
required>

<input
class="form-control mb-3"
name="email"
value="<?= $row['email']; ?>"
required>

<input
class="form-control mb-3"
name="branch"
value="<?= $row['branch']; ?>"
required>

<input
class="form-control mb-3"
type="number"
step="0.01"
name="cgpa"
value="<?= $row['cgpa']; ?>"
required>

<select
name="student_status"
class="form-select mb-3">

<option <?=($row['student_status']=="Active")?"selected":"";?>>
Active
</option>

<option <?=($row['student_status']=="Inactive")?"selected":"";?>>
Inactive
</option>

</select>

<input
type="file"
name="photo"
class="form-control mb-3">

<button
name="update"
class="btn btn-primary">

Update Student

</button>

</form>

</div>

</div>

</body>
</html>