<html>
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <link rel="stylesheet" href="./style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Question display</title>
</head>
<body>
<div class="topnav">
     <u>STATUS INFOTAINMENT</u>
     <a href="login.html"><u>LOGOUT</u></a>
  
</div>
<?php
session_start();
$email=$_POST['t1'];
$pass=$_POST['t3'];
$flag=0;
$s=array();
$file = fopen("details.txt", 'r');
while(!feof($file))
  {
  $s=fgets($file);
  $str_arr = array_pad(explode('::', $s),6,null);
  if ($str_arr[2]==$pass and $str_arr[0]==$email){
    $name=$str_arr[1];
    $jano=$str_arr[5];
    echo "<h3>Job Application No: $jano</h3>";
    $_SESSION["jan"]=$jano;
    echo "<h2>WELCOME $name!</h2>";
    $rem=$jano%20;
    $rem=$rem+1;
    ?>
    <center>
    <table bgcolor="#8BC34A" class="margin">
    <tr>
    <td><b>Your Question is:</b>    
    <textarea name="Questions" rows=5 cols=150 readonly>
    <?php 
    $f=fopen("./$rem.txt","r");

    echo fread($f, filesize("./$rem.txt"));
    ?>
    </textarea>
    </tr>
    </td>
    </tr>
    <form action="code.php" method="post">
    <table bgcolor="#8BC34A" class="margin">
    <tr>
    <td><b>Choose Your Programming Language:</b>
    <select name="ext" style="width: 150px;" class="box">  
    <option value=".java">Java</option>
    <option value=".py">Python</option>
    </td>
    </select>
    </tr>
    <tr>
    <td align="center" colspan=2><textarea name="data" rows=50 cols=200 placeholder="Write Your Code here" oninvalid="alert('You cannot submit empty Solution!');" required></textarea>
    <?php echo @$contents; ?>
    </tr>
    <tr>
    <td align=center><input type=reset value="RESET CODE" class="button1" style=border-radius:8px;>
    <td align=center><input type=submit value="SUBMIT CODE" class="button1" style=border-radius:8px;>
    </tr>
    </table></center>        
    <?php          
		$flag=1;
	  	break;
	}//end if 
  }//end while
if ($flag==0)
	echo "<h2>Please register before login<h2>";
fclose($file);
?>
</form>
</body>
</html>