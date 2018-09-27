<?php
session_start();
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">  
	<title>Den hemliga sidan</title>
</head>
<body>
<?php
include 'db.php';
$servername = "localhost";
$dbname = "te16";
if(isset($_SESSION['id']))
{
	echo "Du är inloggad";
	echo "<h1>Welcome to my red room " . $_SESSION['username'] . ".</h1>";
	echo '	
		<form action="" method="POST">
			<fieldset>
				<legend>Ta bort min användare tack</legend>
				<p>
					<label for="password">Lösenord:</label>
					<input type="password" name="password" id="password">
				</p>
				<p>
					<input type="submit" name="delete" id="delete" value="Ta bort">
				</p>
			</fieldset>
		</form>';
	if (isset($_POST['delete'])) {
		$statement = $dbh->prepare("DELETE FROM login WHERE id = :id");
		$statement->bindParam(':id', $_SESSION['id']);
		$statement->execute();
		
		
	}
//	DELETE FROM login WHERE id = $_SESSION['id'];

}
elseif(isset($_POST['submit'])) // if($_POST['submit'] == "Logga in")
{
	if(isset($_POST['username']) && isset($_POST['password']))
	{
		$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
		$password = $_POST['password'];
		$statement = $dbh->prepare("SELECT * FROM login WHERE login . username = :username");
		$statement->bindParam(':username', $username);
		$statement->execute();
		$row = $statement->fetch(PDO::FETCH_ASSOC);
		//echo "<pre>" . print_r($row,1) . "</pre>";
		if($username == $row['username']
			&& password_verify($password, $row['password']))
		{
			$_SESSION['id'] = $row['id'];
			$_SESSION['username'] = $row['username'];
			echo "<h1>Welcome to my red room " . $_SESSION['username'] . ".</h1>";
			echo '	
	<form action="" method="POST">
		<fieldset>
			<legend>Ta bort min användare tack</legend>
			<p>
				<label for="password">Lösenord:</label>
				<input type="password" name="password" id="password">
			</p>
			<p>
				<input type="submit" name="delete" id="delete" value="Ta bort">
			</p>
		</fieldset>
	</form>';
	}	
		else
		{
			echo "<h1>Du har gjort väldigt fel!</h1>";
			echo '	
	<form action="login.php" method="POST">
		<fieldset>
			<legend>Försök igen</legend>
			<p>
				<label for="username">Användarnamn:</label>
				<input type="text" name="username" id="username">
			</p>
			<p>
				<label for="password">Lösenord:</label>
				<input type="password" name="password" id="password">
			</p>
			<p>
				<input type="submit" name="submit" id="submit" value="Ta bort">
			</p>
		</fieldset>
	</form>';

		}
	}
	// echo "<pre>" . print_r($_POST,1) . "</pre>";
}
else 
{
	echo "<h1>Vad fan gör du här?</h1>";
}

?>
</body>
</html>