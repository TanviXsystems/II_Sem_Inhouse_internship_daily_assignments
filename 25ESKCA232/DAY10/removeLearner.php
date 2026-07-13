<?php

include("connectVault.php");

$id=$_GET['id'];

$stmt=$link->prepare(
"DELETE FROM learners WHERE learner_id=?"
);

$stmt->bind_param("i",$id);

$stmt->execute();

header("Location: launchpad.php?deleted=1");

exit;

?>