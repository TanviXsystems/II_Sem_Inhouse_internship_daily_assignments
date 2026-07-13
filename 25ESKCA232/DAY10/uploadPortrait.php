<?php

$photoName="";

if(isset($_FILES['photo']) && $_FILES['photo']['error']==0){

$folder="media/uploads/";

if(!is_dir($folder)){
mkdir($folder,0777,true);
}

$photoName=time()."_".basename($_FILES['photo']['name']);

move_uploaded_file(
$_FILES['photo']['tmp_name'],
$folder.$photoName
);

}

?>