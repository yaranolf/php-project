<?php
 session_start(); 
 ob_start();

 include("../function/dbconnect.php");
 
?>


<?php
if(isset($_SESSION['VALID_USER'])){

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $s=mysql_query("UPDATE tbl_staffs SET username='$username', password='$password' WHERE username='".mysql_real_escape_string($_SESSION["VALID_USER"])."'");

    if ($s)
        { echo "great succes";
         } else
        { echo "no no"; }
}

$query1=mysql_query("SELECT * FROM tbl_staffs WHERE username='".mysql_real_escape_string($_SESSION["VALID_USER"])."'  AND user_levels = '".mysql_real_escape_string('1')."'");
$query2=mysql_fetch_array($query1); 

?>

<?php
//  close  while  loop
});
?>

<?php
//  close  connection;
mysql_close();
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Settings</title>
</head>
<body>
    
</body>
</html>