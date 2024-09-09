<?php

session_start();
$con = mysqli_connect("local_host","root","","user");

$usertrim = trim($_post['username']);

$usertrip = stripcslashes($usertrim);
$finaluser = htmlspecialchars($usertrip);

$passtrim = trim($_post['password']);

$passtrip = stripcslashes($passtrim);
$finalpass = htmlspecialchars($passtrip);

$sql = "SELECT *FROM user_tbl where username = '$finaluser AND password = $finalpass'";

$result = mysqli_query($con, $sql);


if(mysqli_num_rows($result)>=1)
{
    $_SESSION["myuser"]= $finaluser;
    header("Location:newpage.html");
}
else
{
$_SESSION["error"]="you are not valid user";
header("Location:error.html");
}
?>