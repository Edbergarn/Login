<?php
session_start();
// syftet med db.php var att dölja databasuppgifter från GIT
// behöver ni båda?
require 'db.php';
// bra med try catch
if (isset($_POST['create'])) {
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['checkPassword']) && isset($_POST['email'])) {
        if ($_POST['password'] == $_POST['checkPassword']) {
            
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbuser, $dbpassword);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("INSERT INTO login (username, password, email)
                VALUES (:username, :password, :email)");
                $stmt->bindParam(':username', $filteredUsername);
                $stmt->bindParam(':password', $password);
                $stmt->bindParam(':email', $email);
                // insert one row
                // FILTRERA och döp då variabler till filtered_username/email
                $filteredUsername = $_POST['username'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $email = $_POST['email'];
                $stmt->execute();
                // use exec() because no results are returned
              //  $conn->exec($sql);
                echo "New record created successfully";
            } // indrag
            catch(PDOException $e)
            {
                // skriv ut felmeddelande
                echo  $e->getMessage();
            }
        }
    }
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