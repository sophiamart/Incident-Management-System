<?php
	//include php file that connects to the database
	include_once 'incidenttracking.php';
?>
    <link href="style.css" rel="stylesheet" type="text/css">
<html>
<head>
	<!-- assigns a class to later be styled -->
	<h1 class = "Title"> Remove People </h1>
</head>
<body style="padding-top: 100px;">
<div class = "container">
	<?php

		if(isset($_POST['submitDelete'])){

			$key = $_POST['ToDelete'];

			$check =  "SELECT * from people WHERE peopleid = '$key' ";

			if(mysqli_query($conn, $check)){

				$querydelete = mysqli_query($conn, "DELETE from people where peopleid = '$key' ") or die("Not Deleted".mysqli_error());
	?>
				<div class="alert alert-success">
					<p> Record Deleted </p>
				</div>
				<?php 
			}

			else{
		?>
				<div class="alert alert-warning">
					<p> Record does not exist </p>
				</div>

			<?php
			}
		}
	?>

<form method="POST" action="/remove.php">
		<!--creates table class to be styled later -->
		<table class = "table">
			<tr>
				<th>People ID</th>
				<th>Last Name</th>
				<th>First Name</th>
				<th>Job Title</th>
				<th>Email Address</th>
				<th>Incident ID</th>
				<th>IP Address</th>
				<th>Remove</th>
				<th>Confirm</th>
			</tr>
			<!-- stores SQL query in $sql-->
			<?php
				$sql = "SELECT peopleid, lastname, firstname, jobtitle, emailaddress, incidentid, ipaddress from people";

				$result = $conn->query($sql);

				//prints out all the rows with html table tags such as <td> 
				if($result-> num_rows > 0){
					while($row = $result -> fetch_assoc()){
						echo"<tbody><tr><td>". $row['peopleid']. "</td><td>".$row['lastname']. "</td><td>". $row['firstname']. "</td><td>". $row['jobtitle']. "</td><td>". $row['emailaddress']. "</td><td>". $row['incidentid']. "</td><td>". $row['ipaddress']. "</td>";
						?>
						<td>
							<input type="checkbox" name="ToDelete" value ="<?php echo $row['peopleid'];?>">
						</td>
						<td>
							<input type = "submit" name = "submitDelete" class = "btn delete">
						</td>
						</tbody>
						<?php
					}
				}//print out 0 results peopleid can't be found
				else{
					echo "0 results";
				}
				?>
			</table>
</form>
</div>
	<!-- button to go back to home page -->
    <form action = "/incidentresponse.php">
        <button class = "button">Home</button>
    </form>	
</body>
</html>
