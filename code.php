<?php
session_start();

  

$ext = $_POST['ext'];

$data = $_POST['data'];
$jan=$_SESSION['jan'];
$filename="JOB".$jan.$ext;

$fo = fopen($filename, "w");

fwrite($fo, $data);
fclose($fo);


echo "<br><br><br><h2><center>Your Data Has Been Saved Successfully!</center><h2>";
?>