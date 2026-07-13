<?php

session_start();

require_once "vault_connect.php";

if($_SERVER["REQUEST_METHOD"]!="POST")
{
    header("Location: campus_entry.php");
    exit();
}

$email=trim($_POST["email"]);
$password=trim($_POST["password"]);

if(empty($email) || empty($password))
{
    header("Location: campus_entry.php?error=1");
    exit();
}

$sql="SELECT id,name,email,password,profile_pic
      FROM users
      WHERE email=?
      LIMIT 1";

$stmt=mysqli_prepare($link,$sql);

mysqli_stmt_bind_param($stmt,"s",$email);

mysqli_stmt_execute($stmt);

$result=mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result)==1)
{

    $user=mysqli_fetch_assoc($result);

    if($password==$user["password"])
    {

        $_SESSION["user_id"]=$user["id"];
        $_SESSION["user_name"]=$user["name"];
        $_SESSION["user_email"]=$user["email"];
        $_SESSION["profile_pic"]=$user["profile_pic"];
        $_SESSION["login_time"]=date("d M Y h:i A");

        $update="UPDATE users
                 SET last_login=NOW()
                 WHERE id=?";

        $updateStmt=mysqli_prepare($link,$update);

        mysqli_stmt_bind_param(
            $updateStmt,
            "i",
            $user["id"]
        );

        mysqli_stmt_execute($updateStmt);

        mysqli_stmt_close($updateStmt);

        header("Location: student_hub.php");

        exit();

    }

}

mysqli_stmt_close($stmt);

header("Location: campus_entry.php?error=1");

exit();

?>