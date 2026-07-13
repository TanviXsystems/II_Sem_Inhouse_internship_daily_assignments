<?php

include 'functions.php';
include 'header.php';

if(
empty($_POST['name']) ||
empty($_POST['email']) ||
empty($_POST['cgpa']) ||
empty($_POST['branch']) ||
empty($_POST['college'])
){
echo "<div class='alert alert-danger'>Please fill all required fields.</div>";
include 'footer.php';
exit;
}

$name=$_POST['name'];
$email=$_POST['email'];
$cgpa=$_POST['cgpa'];
$branch=$_POST['branch'];
$college=$_POST['college'];
$gender=$_POST['gender'];
$course=$_POST['course'];
$address=$_POST['address'];

list($grade,$color)=calculateGrade($cgpa);

?>

<div class="card confirm-card">

<div class="gradient-header text-center">

<h2><?php echo greeting(); ?></h2>

</div>

<div class="card-body text-center">

<img src="https://via.placeholder.com/120"
class="profile mb-3">

<h3><?php echo $name; ?></h3>

<p><?php echo date("l, d F Y"); ?></p>

<hr>

<p><strong>Email :</strong> <?php echo $email; ?></p>

<p><strong>Branch :</strong> <?php echo $branch; ?></p>

<p><strong>College :</strong> <?php echo $college; ?></p>

<p><strong>Gender :</strong> <?php echo $gender; ?></p>

<p><strong>Course :</strong> <?php echo $course; ?></p>

<p><strong>Address :</strong> <?php echo $address; ?></p>

<div class="alert alert-<?php echo $color; ?>">

CGPA :
<?php echo $cgpa; ?>

<br>

Performance :
<b><?php echo $grade; ?></b>

</div>

<a href="index.php" class="btn btn-success">
Register Another Student
</a>

</div>

</div>

<?php include 'footer.php'; ?>