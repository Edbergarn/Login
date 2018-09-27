<?php

include 'db.php';

$statement = $dbh->query("SELECT * FROM login");
$row = $statement->fetch(PDO::FETCH_ASSOC);

echo "<pre>" . print_r($row,1) . "</pre>";
/*
foreach ($dbh->query('SELECT * from login') as $row) {
	print_r($row);
}*/

?>