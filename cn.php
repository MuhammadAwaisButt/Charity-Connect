<?php

$name=$_POST['name'];
$email=$_POST['email'];
$message= $_POST['message'];;
//db conn

$conn= new mysqli('localhost','root','','charity');
if($conn->connect_error)
{
    die('connnection failed :'.$conn->connect_error);
}
else{
    $stmt= $conn->prepare("insert into contact(name, email, message) values(?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();
    echo"Message delivered successfully!";
    $stmt->close();
    $conn->close();

}

?>