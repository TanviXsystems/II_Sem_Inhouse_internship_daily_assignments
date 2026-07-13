<?php
include("connectVault.php");

$search = "";
$branch = "";

if(isset($_GET['search'])){
    $search = trim($_GET['search']);
}

if(isset($_GET['branch'])){
    $branch = trim($_GET['branch']);
}

$sql = "SELECT * FROM learners WHERE 1=1";
$params = [];
$types = "";

if($search != ""){
    $sql .= " AND (full_name LIKE ? OR email LIKE ? OR branch LIKE ?)";
    $keyword = "%".$search."%";
    $params[] = $keyword;
    $params[] = $keyword;
    $params[] = $keyword;
    $types .= "sss";
}

if($branch != ""){
    $sql .= " AND branch=?";
    $params[] = $branch;
    $types .= "s";
}

$sql .= " ORDER BY learner_id DESC";

$stmt = $link->prepare($sql);

if(count($params)>0){
    $stmt->bind_param($types,...$params);
}

$stmt->execute();
$result = $stmt->get_result();

$totalStudents = mysqli_fetch_assoc(mysqli_query($link,"SELECT COUNT(*) total FROM learners"));
$averageCgpa = mysqli_fetch_assoc(mysqli_query($link,"SELECT ROUND(AVG(cgpa),2) avgcgpa FROM learners"));
$activeStudents = mysqli_fetch_assoc(mysqli_query($link,"SELECT COUNT(*) total FROM learners WHERE student_status='Active'"));
?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Student Management Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="visualTheme.css">

</head>

<body>

<div class="container py-4">

<h2 class="mb-4 text-center">
Student Management Dashboard
</h2>

<?php

if(isset($_GET['success'])){
echo "<div class='alert alert-success'>Student Added Successfully</div>";
}

if(isset($_GET['updated'])){
echo "<div class='alert alert-success'>Student Updated Successfully</div>";
}

if(isset($_GET['deleted'])){
echo "<div class='alert alert-danger'>Student Deleted Successfully</div>";
}

?>

<div class="row mb-4">

<div class="col-md-4">
<div class="stats-box blue">
Total Students<br>
<?= $totalStudents['total']; ?>
</div>
</div>

<div class="col-md-4">
<div class="stats-box green">
Average CGPA<br>
<?= $averageCgpa['avgcgpa']; ?>
</div>
</div>

<div class="col-md-4">
<div class="stats-box orange">
Active Students<br>
<?= $activeStudents['total']; ?>
</div>
</div>

</div>

<div class="card p-4 mb-4">

<form method="GET">

<div class="row">

<div class="col-md-5">

<input
type="text"
name="search"
class="form-control"
placeholder="Search Name, Email or Branch"
value="<?= htmlspecialchars($search); ?>">

</div>

<div class="col-md-4">

<select
name="branch"
class="form-select">

<option value="">All Branches</option>

<?php

$branches=["CSE","CS-AI","IT","ECE","ME","CE"];

foreach($branches as $item){

$selected="";

if($branch==$item){
$selected="selected";
}

echo "<option $selected>$item</option>";

}

?>

</select>

</div>

<div class="col-md-3 d-grid">

<button class="btn btn-primary">

Search

</button>

</div>

</div>

</form>

</div>

<div class="mb-3">

<a
href="registerLearner.php"
class="btn btn-success">

Add Student

</a>

</div>

<div class="table-responsive">

<table class="table table-bordered table-hover table-striped align-middle">

<thead class="table-dark">

<tr>

<th>Photo</th>

<th>Name</th>

<th>Email</th>

<th>Branch</th>

<th>CGPA</th>

<th>Status</th>

<th>Last Updated</th>

<th width="180">Actions</th>

</tr>

</thead>

<tbody>

<?php

if(mysqli_num_rows($result)==0){

echo "<tr>
<td colspan='8' class='text-center'>
No Students Found
</td>
</tr>";

}else{

while($student=mysqli_fetch_assoc($result)){

?>

<tr>

<td>

<?php

if($student['photo']!=""){

?>

<img
src="media/uploads/<?= $student['photo'];?>"
width="65"
height="65"
style="border-radius:50%;object-fit:cover;">

<?php

}else{

echo "No Image";

}

?>

</td>

<td><?= htmlspecialchars($student['full_name']); ?></td>

<td><?= htmlspecialchars($student['email']); ?></td>

<td><?= htmlspecialchars($student['branch']); ?></td>

<td><?= $student['cgpa']; ?></td>

<td>

<?php

if($student['student_status']=="Active"){

echo "<span class='badge bg-success'>Active</span>";

}else{

echo "<span class='badge bg-secondary'>Inactive</span>";

}

?>

</td>

<td>

<?= $student['updated_at']; ?>

</td>

<td>
    <a
href="modifyLearner.php?id=<?= $student['learner_id']; ?>"
class="btn btn-warning btn-sm action-btn">

Edit

</a>

<a
href="removeLearner.php?id=<?= $student['learner_id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirmDelete();">

Delete

</a>

</td>

</tr>

<?php

}

}

?>

</tbody>

</table>

</div>

</div>

<script src="motionScript.js"></script>

</body>

</html>