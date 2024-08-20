<?php

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
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
    $stmt= $conn->prepare("insert into registration(firstname, lastname, email, username, password) values(?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $firstname, $lastname, $email, $username, $password);
    $stmt->execute();
    echo"register successful";
    $stmt->close();
    $conn->close();

}

?>