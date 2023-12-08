<?php
		$servername = "localhost";
		$username = "root"; //my sql username
		$password = "c0d1nG2538"; //my sql password

		$dbname = "incidentTrack";
		//create connection
		//my SQL is a object oriented language
		$conn = new mysqli($servername, $username, $password, $dbname);

		//testing the connection
		if ($conn->connect_error) {
			die("<p style='color:red'>" . "Connection failed: " . $conn->connect_error . "</p>");
		}//prints out on success
		echo "Mysql DB Connected successfully...<br>";

				//closes the connection
		//$conn->close();
		//echo "DB Disconnect."; 
		?>
	