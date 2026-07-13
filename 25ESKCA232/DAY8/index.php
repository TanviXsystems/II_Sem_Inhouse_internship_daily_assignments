<?php include 'header.php'; ?>

<div class="card form-card">

<div class="gradient-header text-center">
<h2><i class="fa-solid fa-user-graduate"></i> Student Registration Form</h2>
</div>

<div class="card-body">

<form action="process.php" method="POST">

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label>CGPA</label>
<input type="number" step="0.01" name="cgpa" class="form-control" required>
</div>

<div class="mb-3">
<label>Branch</label>
<input type="text" name="branch" class="form-control" required>
</div>

<div class="mb-3">
<label>College</label>
<input type="text" name="college" class="form-control" required>
</div>

<div class="mb-3">
<label>Gender</label><br>

<input type="radio" name="gender" value="Male" required> Male
<input type="radio" name="gender" value="Female"> Female
<input type="radio" name="gender" value="Other"> Other

</div>

<div class="mb-3">

<label>Course</label>

<select name="course" class="form-select">

<option>B.Tech</option>
<option>BCA</option>
<option>MCA</option>
<option>M.Tech</option>

</select>

</div>

<div class="mb-3">

<label>Address</label>

<textarea name="address" class="form-control"></textarea>

</div>

<div class="mb-3">

<label>Student Photo</label>

<input type="file" class="form-control">

</div>

<button class="btn btn-primary w-100">
Submit Registration
</button>

</form>

</div>
</div>

<?php include 'footer.php'; ?>