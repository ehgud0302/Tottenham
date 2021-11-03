<?php

session_start();
include ("connect.php");

$id = $_POST['email'];
$pw = $_POST['password'];

$query = "select * from member where email='$id' and password='$pw'";

$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

if($id==$row['email'] && $pw==$row['password']) {
    $_SESSION['id'] = $row['email'];
    $_SESSION['pw'] = $row['password'];

    echo "<script> alert('Have A Good Day!'); </script>";
    echo("<script>location.replace('./team.html');</script>");


}else {

    echo"<script>window.alert('Try Again!');</script>";
    echo("<script>location.replace('./login.html');</script>");   
}
?>