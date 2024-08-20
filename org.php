<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "charity";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use prepared statements to prevent SQL injection
    $query = $conn->prepare("SELECT * FROM organization WHERE username = ? AND password = ?");
    $query->bind_param("ss", $username, $password);

    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows == 1) {
        header("Location: index.html");
        exit();
    } else {
        echo "Login failed";
        exit();
    }

    $query->close();
    $conn->close();
}
?>
