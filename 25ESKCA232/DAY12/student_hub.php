<?php

require_once "access_gate.php";
require_once "vault_connect.php";

$userId = $_SESSION["user_id"];

/* Logged-in user */

$userQuery = mysqli_prepare(
    $link,
    "SELECT * FROM users WHERE id=? LIMIT 1"
);

mysqli_stmt_bind_param(
    $userQuery,
    "i",
    $userId
);

mysqli_stmt_execute($userQuery);

$userResult = mysqli_stmt_get_result($userQuery);

$user = mysqli_fetch_assoc($userResult);

/* Dashboard Statistics */

$totalStudents = mysqli_fetch_assoc(
    mysqli_query(
        $link,
        "SELECT COUNT(*) AS total FROM students"
    )
);

$totalBranches = mysqli_fetch_assoc(
    mysqli_query(
        $link,
        "SELECT COUNT(DISTINCT branch) AS total FROM students"
    )
);

$totalCourses = mysqli_fetch_assoc(
    mysqli_query(
        $link,
        "SELECT COUNT(DISTINCT course) AS total FROM students"
    )
);

/* Search */

$search = "";

if(isset($_GET["search"]))
{
    $search = trim($_GET["search"]);
}

if($search!="")
{

    $safe = mysqli_real_escape_string(
        $link,
        $search
    );

    $studentSQL =
    "SELECT *
     FROM students
     WHERE
     student_id LIKE '%$safe%'
     OR
     name LIKE '%$safe%'
     OR
     branch LIKE '%$safe%'
     OR
     course LIKE '%$safe%'
     ORDER BY id DESC";

}
else
{

    $studentSQL =
    "SELECT *
     FROM students
     ORDER BY id DESC";

}

$students = mysqli_query(
    $link,
    $studentSQL
);

$resultCount = mysqli_num_rows($students);

function highlight($text,$search)
{

    if($search=="")
    {
        return htmlspecialchars($text);
    }

    return str_ireplace(
        $search,
        "<mark>".$search."</mark>",
        htmlspecialchars($text)
    );

}

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width,initial-scale=1">

<title>

Student Dashboard

</title>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<link
rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<link
rel="stylesheet"
href="theme_matrix.css">

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<div class="container">

<a
class="navbar-brand"
href="#">

Campus Secure Portal

</a>

<div class="d-flex align-items-center">

<img

src="<?php echo $user["profile_pic"]; ?>"

width="45"

height="45"

class="rounded-circle border border-light me-2">

<span class="text-white me-3">

<?php echo $_SESSION["user_name"]; ?>

</span>

<a
href="profile_space.php"
class="btn btn-outline-light btn-sm me-2">

Profile

</a>

<a
href="key_update.php"
class="btn btn-warning btn-sm me-2">

Password

</a>

<a
href="session_exit.php"
onclick="return confirmLogout();"
class="btn btn-danger btn-sm">

Logout

</a>

</div>

</div>

</nav>

<div class="container mt-4">
    <!-- Welcome Card -->

<div class="row mb-4">

<div class="col-lg-12">

<div class="card shadow">

<div class="card-body">

<h3>

Welcome,

<?php echo $_SESSION["user_name"]; ?>

👋

</h3>

<p class="text-muted mb-1">

Email :
<strong>

<?php echo $_SESSION["user_email"]; ?>

</strong>

</p>

<p class="mb-0">

Session Started :

<strong>

<?php echo $_SESSION["login_time"]; ?>

</strong>

</p>

</div>

</div>

</div>

</div>

<!-- Statistics -->

<div class="row mb-4">

<div class="col-md-4 mb-3">

<div class="card text-center shadow">

<div class="card-body">

<i class="fa-solid fa-users fa-2x text-primary mb-3"></i>

<h5>Total Students</h5>

<h2>

<?php echo $totalStudents["total"]; ?>

</h2>

</div>

</div>

</div>

<div class="col-md-4 mb-3">

<div class="card text-center shadow">

<div class="card-body">

<i class="fa-solid fa-building-columns fa-2x text-success mb-3"></i>

<h5>Total Branches</h5>

<h2>

<?php echo $totalBranches["total"]; ?>

</h2>

</div>

</div>

</div>

<div class="col-md-4 mb-3">

<div class="card text-center shadow">

<div class="card-body">

<i class="fa-solid fa-book fa-2x text-danger mb-3"></i>

<h5>Total Courses</h5>

<h2>

<?php echo $totalCourses["total"]; ?>

</h2>

</div>

</div>

</div>

</div>

<!-- Search -->

<div class="card shadow mb-4">

<div class="card-body">

<form method="GET">

<div class="row">

<div class="col-md-10">

<input

type="text"

name="search"

id="searchBox"

class="form-control search-box"

placeholder="Search by Student ID, Name, Branch or Course"

value="<?php echo htmlspecialchars($search); ?>">

</div>

<div class="col-md-2">

<button

class="btn btn-primary w-100">

Search

</button>

</div>

</div>

</form>

<div class="mt-3">

<strong>

Results Found :

<?php echo $resultCount; ?>

</strong>

</div>

</div>

</div>

<!-- Student Table -->

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h5 class="mb-0">

Student Records

</h5>

</div>

<div class="card-body">

<?php

if($resultCount==0)
{

?>

<div class="alert alert-warning">

No Students Found.

</div>

<?php

}
else
{

?>

<div class="table-responsive">

<table

class="table table-bordered table-hover"

id="studentTable">

<thead class="table-dark">

<tr>

<th>ID</th>

<th>Student ID</th>

<th>Name</th>

<th>Branch</th>

<th>Course</th>

<th>CGPA</th>

<th>Email</th>

</tr>

</thead>

<tbody>

<?php

while($row=mysqli_fetch_assoc($students))
{

?>

<tr>

<td>

<?php echo $row["id"]; ?>

</td>

<td>

<?php echo highlight($row["student_id"],$search); ?>

</td>

<td>

<?php echo highlight($row["name"],$search); ?>

</td>

<td>

<?php echo highlight($row["branch"],$search); ?>

</td>

<td>

<?php echo highlight($row["course"],$search); ?>

</td>

<td>

<?php echo $row["cgpa"]; ?>

</td>

<td>

<?php echo $row["email"]; ?>

</td>

</tr>

<?php

}

?>

</tbody>

</table>

</div>

<?php

}

?>

</div>

</div>

</div>

<script src="motion_script.js"></script>

</body>

</html>