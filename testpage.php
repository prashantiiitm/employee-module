<?php

$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{

$name = $_FILES['photoimg']['name'];
$size = $_FILES['photoimg']['size'];

if(strlen($name))
{
list($txt, $ext) = explode(".", $name);
if(in_array($ext,$valid_formats))
{
$actual_image_name = time().".".$ext;
$tmp = $_FILES['photoimg']['tmp_name'];
if(move_uploaded_file($tmp, $actual_image_name))
{}
else
echo "failed";
}
else
echo "Invalid file format..";
}
else
echo "Please select image..!";
}
?>