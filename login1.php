<?php
session_start();
include 'dbcon.php';
$_SESSION['empid'] = $_POST['uname'];
$empid             = $_SESSION['empid'];
$password          = $_POST['psw'];
//prevent mysql injection
$empid    = stripcslashes($empid);
$password = stripcslashes($password);

$empid    = mysqli_real_escape_string($db, $empid);
$password = mysqli_real_escape_string($db, $password);

$result = mysqli_query($db, "SELECT * FROM employee WHERE empid = '$empid' and password = '$password'")
or die('SQL Error: ' . mysqli_error($db));
$row = mysqli_fetch_array($result);

if (($row['empid'] == $empid) && ($row['password'] == $password)) {
    header("location: tabs10.php");
} else {
    echo "Your Username or Password is invalid";
}
mysqli_close($db);
?>