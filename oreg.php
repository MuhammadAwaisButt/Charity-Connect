<?php

$oname=$_POST['oname'];
$email=$_POST['email'];
$username= $_POST['username'];
$password=$_POST['password'];
//db conn

$conn= new mysqli('localhost','root','','charity');
if($conn->connect_error)
{
    die('connnection failed :'.$conn->connect_error);
}
else{
    $stmt= $conn->prepare("insert into organization(oname, email, username, password) values(?, ?, ?, ?)");
    $stmt->bind_param("ssss", $oname, $email, $username, $password);
    $stmt->execute();
    echo"register successful";
    $stmt->close();
    $conn->close();

}

?>