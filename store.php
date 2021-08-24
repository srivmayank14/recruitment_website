<html>
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php
session_start();
$email=$_POST['t1'];
$username=$_POST['t2'];
$pass=$_POST['t3'];
$contact=$_POST['t4'];
$education=$_POST['t5'];
$_SESSION[$email]="t1";
$_SESSION[$username]="t2";
$_SESSION[$pass]="t3";
$_SESSION[$contact]="t4";
$_SESSION[$education]="t5";

$file = fopen("details.txt", "a+");
$s=fread($file, filesize("details.txt"));
$pos=strpos($s,$contact);
if(!$pos){
$f=fopen("jobappnum.txt","r");
$j_a_n=fread($f,filesize("jobappnum.txt"));
fclose($f);
$f=fopen("jobappnum.txt","w");
$text = $email."::".$username."::".$pass."::".$contact."::".$education."::".$j_a_n."::\r\n";
$j_a_n=$j_a_n+1;
fwrite($f,$j_a_n);
fwrite($file, $text);
fclose($file);
fclose($f);
echo "Your data has been submitted";
}
else
{ 
echo "You are already registered";
}
?>
</h2>
<br><br><a href="login.html"><button>Click Here to Login</button></a>
</body>
</html>