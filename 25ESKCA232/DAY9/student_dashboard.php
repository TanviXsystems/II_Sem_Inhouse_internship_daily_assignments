<?php
include("database_bridge.php");

$query = "SELECT * FROM students ORDER BY id DESC";
$result = mysqli_query($connection, $query);
$totalStudents = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="portal_design.css">

</head>
<body>

<div class="container mt-5">

<div class="d-flex justify-content-between align-items-center mb-4">
<h2>Registered Students</h2>

<a href="launchpad.php" class="btn btn-primary">
Register New Student
</a>

</div>

<table class="table table-bordered table-hover table-striped">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Branch</th>
<th>CGPA</th>
<th>Phone</th>
<th>City</th>
<th>Course</th>
<th>Photo</th>
<th>Address</th>
<th>Date Registered</th>

</tr>

</thead>

<tbody>

<?php

while($row=mysqli_fetch_assoc($result))
{

$class="";

if($row['cgpa']>8)
{
$class="table-success";
}

echo "<tr class='$class'>";

echo "<td>".$row['id']."</td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['email']."</td>";
echo "<td>".$row['branch']."</td>";
echo "<td>".$row['cgpa']."</td>";
echo "<td>".$row['phone']."</td>";
echo "<td>".$row['city']."</td>";
echo "<td>".$row['course']."</td>";
echo "<td>".$row['photo']."</td>";
echo "<td>".$row['address']."</td>";
echo "<td>".$row['date_registered']."</td>";

echo "</tr>";

}

?>

</tbody>

</table>

<div class="alert alert-info">

<h5>Total Students : <?php echo $totalStudents; ?></h5>

</div>

</div>

</body>
</html>