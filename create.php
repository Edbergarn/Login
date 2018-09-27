<?php
session_start();
require 'db.php';
$servername = "localhost";
$dbname = "te16";
$dbuser = "root";
$dbpassword = "";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbuser, $dbpassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("INSERT INTO login (username, password, email)
    VALUES (:username, :password, :email)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email', $email);

    // insert one row
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $stmt->execute();
    // use exec() because no results are returned
  //  $conn->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
 //   echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create</title>
</head>
<body>

</body>
</html>