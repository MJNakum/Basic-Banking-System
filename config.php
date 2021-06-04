<?php

	$servername = "localhost";
        $username = "root";
        $password = "";
        $database = "basic_bankingsystem";
        $conn = mysqli_connect($servername, $username, $password, $database);

	if(!$conn){
		die("Unable to connect to the database due to an error : ".mysqli_connect_error());
	}

?>
