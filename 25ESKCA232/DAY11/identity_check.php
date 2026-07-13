<?php
session_start();

include("vault_connect.php");

$email = trim($_POST['email']);
$password = trim($_POST['password']);

$sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";

$result = mysqli_query($link,$sql);

if(mysqli_num_rows($result)==1){

    $user = mysqli_fetch_assoc($result);

    if($user['password']==$password){

        $_SESSION['user_id']=$user['id'];
        $_SESSION['user_name']=$user['name'];
        $_SESSION['user_email']=$user['email'];
        $_SESSION['profile_pic']=$user['profile_pic'];

        date_default_timezone_set("Asia/Kolkata");
        $time=date("Y-m-d H:i:s");

        mysqli_query($link,"UPDATE users SET last_login='$time' WHERE id=".$user['id']);

        header("Location: student_hub.php");
        exit();
    }
}

header("Location: campus_entry.php?error=1");
exit();

?>