<?php
	//includes php file that connects to the databse
	include_once 'incidentTracking.php';
?>
    <link href="style.css" rel="stylesheet" type="text/css">
<!DOCTYPE html>
<html>
<?php
	//when submit button named insert is clicked, do this
	if (isset($_POST['insert'])){
		//assign user input into variables
		$cid = $_POST['cid'];
		$id = $_POST['id'];
		$desc = $_POST['desc'];

		//sql statement that inserts user input into the database
		$sql = "INSERT INTO comments (commentid, incidentid, commentdesc) VALUES ('$cid', '$id', '$desc')";
			
			//if the query is run, tell the user
			if ($conn->query($sql) === TRUE) {
  				echo "New record created successfully<br>";
			} else {
  				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}

	?>
<body>
<form method="POST" action="/comments.php">
	<!-- assigns title class to h1 -->
	<h1 class = "Title"> Add Comments </h1>
	<!-- creates table with table class -->
	<table class = "table">
		<!-- assigns cid to the user input by using <input type="text"> -->
			<tbody><tr><td><label for="cid">Comment ID: </label></td>
			<td><input type="text" name="cid"> </td></tr>

			<tr><td><label for="id">Incident ID: </label></td>
			<td><input type="text" name="id"> </td></tr>

			<tr><td><label for="desc">Comment Description: </label></td>
			<td><input type="text" name="desc"> </td></tr></tbody>
		</table>
		<!-- includes submit button with class button to style later -->
			<input type="submit" name = "insert" value="Submit" class = "button">
</form>
	<!-- home button with the class button to style later -->
    <form action = "/incidentresponse.php">
        <button class = "button">Home</button>
    </form>
</body>
</html>
