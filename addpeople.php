<?php
	//include php file that connects to the database
	include_once 'incidenttracking.php';
?>
	<link href="style.css" rel="stylesheet" type="text/css">
<!DOCTYPE html>
<form method="POST" action="/addpeople.php">
<body style="padding-top: 100px;">
<div class = "container">
</form>
	<!-- assigns title class to style h1 for later -->
	<h1 class = "Title"> Add People </h1>

<form method="POST" action="/addpeople.php">
	<table class ="table">
			<!-- creates table class to style later -->
			<!-- takes in user input -->

			<tbody><tr><td><label for="pid">People ID: </label></td>
			<td><input type="text" name="pid"> </td></tr>

			<tr><td><label for="lname">Last Name: </label></td>
			<td><input type="text" name="lname"> </td></tr>

			<tr><td><label for="fname">First Name: </label></td>
			<td><input type="text" name="fname"> </td></tr>

			<tr><td><label for="jtitle">Job Title: </label></td>
			<td><input type="text" name="jtitle"> </td></tr>

			<tr><td><label for="eaddress">Email Address: </label></td>
			<td><input type="text" name="eaddress"> </td></tr>

			<tr><td><label for="id">Incident ID: </label></td>
			<td><input type="text" name="id"> </td></tr>

			<tr><td><label for="ipadd">IP Address: </label></td>
			<td><input type="text" name="ipadd"> </td></tr></tbody>
		</table>
			<!-- submit button with the class 'button' to style later -->
			<input type="submit" name = "insert" value="Submit" class = "button">
</form>
</div>
</body>
<?php
	//when submit button named 'insert' is clicked, do this
	if (isset($_POST['insert'])){
		//assigns user input variables 
		$pid = $_POST['pid'];
		$lname = $_POST['lname'];
		$fname = $_POST['fname'];
		$jtitle = $_POST['jtitle'];
		$eaddress = $_POST['eaddress'];
		$id = $_POST['id'];
		$ipadd = $_POST['ipadd'];

		//sql statements that inserts user input into database
		$sql = "INSERT INTO people(peopleid, lastname, firstname, jobtitle, emailaddress, incidentid, ipaddress) VALUES ('$pid', '$lname', '$fname', '$jtitle', '$eaddress', '$id', '$ipadd')";
			//print this on success and error when unsuccessful
			if ($conn->query($sql) === TRUE) {
  				echo "New record created successfully<br>";
			} else {
  				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
	?>
	</div>
	<!-- home button for accessability -->
	<form action = "/incidentresponse.php">
        <button class = "button">Home</button>
    </form>	
</head>
</html>