<!DOCTYPE html>
<html lang="se">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial.scale=1.0">
	<title>Portalen</title>
	<style type="text/css">
		main{
			width: 80%;
			margin: 0px auto;
		}
	</style>
</head>
<body>
<main>
	<h1>Välkommen</h1>
	<form action="login.php" method="POST">
		<fieldset>
			<legend>Logga in</legend>
			<p>
				<label for="username">Användarnamn:</label>
				<input type="text" name="username" id="username">
			</p>
			<p>
				<label for="password">Lösenord:</label>
				<input type="password" name="password" id="password">
			</p>
			<p>
				<input type="submit" name="submit" id="submit" value="Logga in">
			</p>
		</fieldset>
	</form>
	<form action="create.php" method="POST">
		<fieldset>
			<legend>Skapa Användare</legend>
			<p>
				<label for="newUser" >Användarnamn:</label>
				<input type="text" name="username" id="username">
			</p>
			<p>
				<label for="newPass">Lösenord:</label>
				<input type="password" name="password" id="password">
			</p>
			<p>
				<label for="newEmail">Email:</label>
				<input type="text" name="email" id="email">
			</p>
			<p>
				<input type="submit" name="create" id="create" value="Skapa">
			</p>

		</fieldset>
	</form>	
</main>

</body>
</html>