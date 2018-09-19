<?php
session_start();
if (isset($_POST['submit'])) 
{
	$loginCredentials = [
		"username" => "emil",
		"password" => "secure"
	];

	if (isset($_POST['username']) && isset($_POST['password'])) 
	{
		$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

		$hash = $password;

		if ($username == $loginCredentials['username']
			&& $password == password_verify($loginCredentials['password'], $hash)) 
		{
			echo "<h1>Välkommen in till den hemliga sidan</h1>";
		}
		elseif ($username != $loginCredentials['username']
			|| $password != password_verify($loginCredentials['password'], $hash)) {
			echo "<h1>Du har angivit fel användarnamn eller lösenord.</h1>";
		}
		else
			echo "<h1>Du har gjort väldigt fel</h1>";
	}


//	echo "<pre>" . print_r($_POST,1) . "</pre>";

}
else
{
	echo "<h1>Vad gör du här?</h1>";
}



?>