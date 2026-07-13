<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h3>Student Registration Form</h3>
        </div>

        <div class="card-body">

            <form action="process.php" method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Branch</label>
                    <input type="text" name="branch" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Gender</label><br>

                    <input type="radio" name="gender" value="Male"> Male

                    <input type="radio" name="gender" value="Female"> Female

                    <input type="radio" name="gender" value="Other"> Other
                </div>

                <div class="mb-3">
                    <label>Course</label>

                    <select name="course" class="form-select">

                        <option value="">Select Course</option>

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
                    <label>Profile Photo</label>

                    <input type="file" name="photo" class="form-control">

                    <small class="text-muted">
                        (Only UI. Backend upload not required.)
                    </small>
                </div>

                <button class="btn btn-success">
                    Register
                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>