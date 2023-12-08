<?php
	//inclues php file that connects to the database
	include_once 'IncidentTracking.php';
?>
    <link href="style.css" rel="stylesheet" type="text/css">
<!DOCTYPE html>
<html>
<body>
<h1 class = "Title"> Update Incident State </h1>
	<div class = "container">
		<!-- assigns table class to be styled later -->
		<table class = "table">
			<tr>
				<th>Incident ID</th>
				<th>Incident Type</th>
				<th>Incident Date</th>
				<th>Incident State</th>
				<th>Comment ID</th>
				<th>Description</th>
			</tr>
<?php

		//sql statement that selects all of incident, plus commentid, and commentdesc with a left join 
		$sql = "SELECT incident.incidentid, incident.incidenttype, incident.incidentdate, incident.incidentstate, comments.commentid, comments.commentdesc FROM incident left join comments ON incident.incidentid = comments.incidentid";

		$result = $conn->query($sql);

		//prints out rows from sql with html tags inbetween
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				?><form method="POST" action="/updateincident.php"><?php
				echo "<tbody><tr><td>" . $row["incidentid"]. "</td><td>" . $row["incidenttype"]. "</td><td>" . $row["incidentdate"]. "</td><td>" . $row["incidentstate"]. "</td><td>" . $row["commentid"]. "</td><td>" . $row["commentdesc"]. "</td>";?>
				<?php
			}
		}else{
			echo "0 results";
		}

		?><br></tbody>
		</table>
		<!-- creates submit button with the name Edit and class button so that user knows that this button edits information -->
		<input type="submit" name = "edit" value="Edit" class = "button"><br>

		<form method="POST" action="/updateincident.php">
		<?php
		//when submit button named edit is pressed, add two user forums so user can input ID and incident state
		if (isset($_POST['edit'])){?>

			<label for="id">Incident ID: </label>
			<input type="text" name="id"> 

			<label for="istate">Incident State: </label>
			<input type="text" name="istate">

			<!-- second submit button named update takes user input -->
			<input type="submit" name = "update" value="Update" class = "button"><br>
		</form>

		<form method="POST" action="/updateincident.php">
		<?php }
		//when the submit button named update is pressed, assign variables to user input
		if (isset($_POST['update'])){

			$id = $_POST['id'];
			$istate = $_POST['istate'];

			//insert user input into the database
			$sql = "UPDATE incident SET incidentstate = '$istate' WHERE incidentid = '$id'";
				
				if (mysqli_query($conn, $sql)) {
	  				echo "Update Successful<br>";
				} else {
	  				echo "Error: ". mysqli_error();
				}
			}
		

	?>
	<!-- include home button for accessability-->
</form>
    <form action = "/incidentresponse.php">
        <button class = "button">Home</button>
    </form>		
</div>
</body>
</html>
