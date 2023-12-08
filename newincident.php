<?php
	//includes php file that connects to the database
	include_once 'incidenttracking.php';
?>
	<link href="style.css" rel="stylesheet" type="text/css">
<!DOCTYPE html>
<html>
<head>
<form method="POST" action="/newincident.php">
<body style="padding-top: 100px;">
<div class = "container">
</form>
	<h1 class = "Title"> New Incident </h1>
		<form method="POST" action="/newincident.php">
			<table class = "table">
				<!-- allows user input using <input type="text" -->
				<tbody><tr><td><label for="id">Incident ID: </label></td>
				<td><input type="text" name="id"></td></tr>

				<tr><td><label for="it">Incident Type: </label></td>
				<td><input type="text" name="it"> </td></tr>

				<tr><td><label for="idate">Incident Date: </label></td>
				<td><input type="text" name="idate"> </td></tr>

				<tr><td><label for="is">Incident State: </label></td>
				<td><input type="text" name="is"> </td></tr><tbody>

			</table>
			<!-- creates submit button with class "button" -->
			<input type="submit" name = "insert" value="Submit" class = "button">

		</form>
	<?php
		//when submit button named 'insert' is clicked
		if (isset($_POST['insert'])){
			//assign user input variables
			$id = $_POST['id'];
			$it = $_POST['it'];
			$idate = $_POST['idate'];
			$is = $_POST['is'];

			//sql statement to insert user input
			$sql = "INSERT INTO incident (incidentid, incidenttype, incidentdate, incidentstate) VALUES ('$id', '$it', '$idate', '$is')";
			
			//upon success, type this out otherwise run error
			if ($conn->query($sql) === TRUE) {
  				echo "New record created successfully<br>";
			} else {
  				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}

	?>

	<!--includes home button -->
	<form action = "/incidentresponse.php">
        <button class = "button">Home</button>
    </form>	
		</div>
	</body>
</form>
</head>
</html>