<?php

if(session_status()===PHP_SESSION_NONE)
{
    session_start();
}

if(!isset($_SESSION["user_id"]))
{
    header("Location: campus_entry.php");
    exit();
}

// Session timeout (15 minutes)

$inactiveTime = 900;

if(isset($_SESSION["LAST_ACTIVITY"]))
{
    if(time()-$_SESSION["LAST_ACTIVITY"]>$inactiveTime)
    {
        session_unset();
        session_destroy();

        header("Location: campus_entry.php?error=sessionexpired");
        exit();
    }
}

$_SESSION["LAST_ACTIVITY"]=time();

?>