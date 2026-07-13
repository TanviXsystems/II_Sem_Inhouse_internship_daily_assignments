<?php

session_start();

$_SESSION=array();

session_destroy();

header("Location: campus_entry.php");

exit();

?>