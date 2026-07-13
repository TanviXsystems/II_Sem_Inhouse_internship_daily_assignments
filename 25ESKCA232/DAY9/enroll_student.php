<?php
include("database_bridge.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($connection, $_POST["name"]);
    $email = mysqli_real_escape_string($connection, $_POST["email"]);
    $branch = mysqli_real_escape_string($connection, $_POST["branch"]);
    $cgpa = $_POST["cgpa"];
    $phone = mysqli_real_escape_string($connection, $_POST["phone"]);
    $city = mysqli_real_escape_string($connection, $_POST["city"]);
    $course = mysqli_real_escape_string($connection, $_POST["course"]);
    $photo = mysqli_real_escape_string($connection, $_POST["photo"]);
    $address = mysqli_real_escape_string($connection, $_POST["address"]);

    // Duplicate Email Check
    $check = "SELECT * FROM students WHERE email='$email'";
    $result = mysqli_query($connection, $check);

    if (mysqli_num_rows($result) > 0) {

        echo "<div style='padding:20px;font-family:Arial;'>
                <h2 style='color:red;'>Email already exists!</h2>
                <a href='launchpad.php'>Go Back</a>
              </div>";

    } else {

        $insert = "INSERT INTO students
        (name,email,branch,cgpa,phone,city,photo,address,course)
        VALUES
        ('$name','$email','$branch','$cgpa','$phone','$city','$photo','$address','$course')";

        if(mysqli_query($connection,$insert)){

            $countQuery = mysqli_query($connection,"SELECT COUNT(*) AS total FROM students");
            $count = mysqli_fetch_assoc($countQuery);

            echo "<div style='padding:20px;font-family:Arial;'>
                    <h2 style='color:green;'>Student Registered Successfully!</h2>
                    <h3>You are Student #".$count['total']." in our system.</h3>
                    <br>
                    <a href='launchpad.php'>Register Another Student</a>
                    <br><br>
                    <a href='student_dashboard.php'>View All Students</a>
                  </div>";

        }
        else{
            echo "Error : ".mysqli_error($connection);
        }
    }
}
?>