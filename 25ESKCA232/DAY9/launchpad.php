<?php
include("database_bridge.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Portal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="portal_design.css">
</head>
<body>

<div class="container mt-5">

    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h2>Student Registration Portal</h2>
        </div>

        <div class="card-body">

            <form action="enroll_student.php" method="POST">

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Branch</label>
                        <input type="text" class="form-control" name="branch" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>CGPA</label>
                        <input type="number" step="0.01" class="form-control" name="cgpa" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>City</label>
                        <input type="text" class="form-control" name="city">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Course</label>
                        <input type="text" class="form-control" name="course">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Photo Filename</label>
                        <input type="text" class="form-control" name="photo" placeholder="photo.jpg">
                    </div>

                    <div class="col-12 mb-3">
                        <label>Address</label>
                        <textarea class="form-control" name="address" rows="3"></textarea>
                    </div>

                </div>

                <button class="btn btn-success" type="submit">
                    Register Student
                </button>

                <a href="student_dashboard.php" class="btn btn-primary">
                    View Students
                </a>

            </form>

        </div>
    </div>

</div>

</body>
</html>