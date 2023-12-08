<?php
	//includes php file that connects to the database
	include_once 'IncidentTracking.php';
?>
    <link href="style.css" rel="stylesheet" type="text/css">
<!DOCTYPE html>
<html>
<head>
<!-- creates Title class to style for later -->
<h1 class = "Title">View Incident</h1>
<form method="POST" action="/incidentview.php">
	<!-- creates user input form -->
	<label for="id">Incident ID: </label>
	<input type="text" name="id"> <br><br>
	
	<input type = "submit" name = "Submit" class = "button">
</form>
<?php 
//when submit button called 'Submit' is clicked, do this
if(isset($_POST['Submit'])){ 

?>
<!-- prints out table -->
	<table class = "table">
		<tr>
			<th>Incident ID</th>
			<th>Incident Type</th>
			<th>Incident Date</th>
			<th>Incident State</th>
		</tr>
	<?php
			$id = $_POST['id'];	
			//SQL statement that selects all the information from the database with the corresponding incidentid
			$sql = "SELECT incidentid, incidenttype, incidentdate, incidentstate FROM incident WHERE incidentid =". $_POST['id']. ";";

			$result = $conn->query($sql);

			//prints out rows from sql
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					echo "<tbody><tr><td>" . $row["incidentid"]. "</td><td>" . $row["incidenttype"]. " </td><td>" . $row["incidentdate"]. "</td><td>" . $row["incidentstate"]. "</td></tr></tbody</table><br>";
				}
			}else{
				echo "0 results";
			}?>
			<!-- prints out people table with people related to the same incidentid -->
		<table class = "table">
			<tr>
				<th>People ID</th>
				<th>Last Name</th>
				<th>First Name</th>
				<th>Job Title</th>
				<th>Email Address</th>
				<th>Incident ID</th>
				<th>IP Address</th>
			</tr>
		<?php

					//retrieves all the information related to the incident
			$sql2 = "SELECT peopleid, lastname, firstname, jobtitle, emailaddress, incidentid, ipaddress FROM people WHERE IncidentID =". $_POST['id']. ";";

			$result2 = $conn->query($sql2);

			//prints out rows from sql
			if($result2->num_rows > 0){
				while($row = $result2->fetch_assoc()){
					echo"<tr><td>". $row['peopleid']. "</td><td>".$row['lastname']. "</td><td>". $row['firstname']. "</td><td>". $row['jobtitle']. "</td><td>". $row['emailaddress']. "</td><td>". $row['incidentid']. "</td><td>". $row['ipaddress']. "</td>";
				}
			}else{
				echo "0 results";
			}?><br></table>
			<!-- prints out the comments table with the corresponding incidentid -->
	<table class = "table">
		<tr>
			<th>Comment ID</th>
			<th>Description</th>
		</tr>
			<?php

			$sql3 = "SELECT commentid, commentdesc FROM comments WHERE IncidentID = '$id' ORDER BY commentid";

			$result3 = $conn->query($sql3);

			//prints out rows from sql
			if($result3->num_rows > 0){
				while($row = $result3->fetch_assoc()){
					echo "<tr><td>" . $row["commentid"]. "</td><td>" . $row["commentdesc"]. "</td>";?>
					<?php
				}
			}else{
				echo "0 results";
			}?><br>
		</table>
			<?php
			}
	?>
	<!-- home button that allows accessability to other pages -->
    <form action = "/incidentresponse.php">
        <button class = "button">Home</button>
    </form>

<!-- set viewport of the email button -->
<meta charset="UTF-8">
<meta name= "viewport" content = "width=device-width, initial-scale=1.0">
<title>Test</title>
<script defer scr = "script.js"></script>
		<!-- creates button that will open an email forum -->
		<button data-modal-target="#email" class = "button">Email Incident</button>
		<!-- assigns email header to be styled later -->
		<div class= "email" id="email">
			<div class="email-header">
				<div class="title">Email</div>
				<!--&times is a multiplication symbol that resembles a webpage x, created into a button -->
				<button data-close-button class = "close-button">&times;</button>
			</div>
			<!-- creates different text boxes that would usually be used as an email -->
			<div class="email-body"> 
				Receiver: <input type="text" name="id"> <br>
				Subject: <input type="text" name="id"> <br>
				incident.sql<br>
				<!-- makes sent button like the close button, closes popout window -->
				<button data-close-button class = "close-button">Send</button>
			</div>
		</div>
		<!--javascript that allows function calls -->
		<script>
			const openEmailButtons = document.querySelectorAll('[data-modal-target]')
			const closeEmailButtons = document.querySelectorAll('[data-close-button]')


			openEmailButtons.forEach(button => {
				button.addEventListener('click', () =>{
					const email = document.querySelector(button.dataset.modalTarget)
					openEmail(email)
				})

			})
			closeEmailButtons.forEach(button => {
			button.addEventListener('click', () =>{
					const email = button.closest('.email')
					closeEmail(email)
				})

			})
			closeEmailButtons2.forEach(button => {
			button.addEventListener('click', () =>{
					const email = button.closest('.email')
					closeEmail(email)
				})

			})
			function openEmail(email){
				if(email == null)return
					email.classList.add('active')
				
			}
			function closeEmail(email){
				if(email == null)return
					email.classList.remove('active')
				
			}
		</script>
		<!-- styling for email popout window -->
		<style>
			*, *::after, *::before{
				box-sizing: border-box;
			}
			/* styles email class and assigns a scale of 0 so it's not initially seen */
			.email{
				position: fixed;
				top: 50%;
				left:50%;
				transform: translate(-50%, -50%) scale(0);
				border: 1px solid black;
				border-radius: 10px;
				z-index: 10;
				background-color: white;
				width: 500px;
				max-width:80%;
			}
			/* when function openEmail is called, .active is added to the email class to allow it to be seen */
			.email.active{
				transform: translate(-50%, -50%) scale(1);
			}
			/* styles header class. justify-content: space-between allows the email and &times to be on both ends */
			.email-header{
				padding: 10px 15px;
				display: flex;
				justify-content: space-between;
				align-items: center;
				border-bottom: 1px solid black;
				background-color: #0000b3; 
				color: white;
			}
			.email-header .title{
				font-size: 1.25rem;
				font-weight: bold;
			}
			.email-header .close-button{
				cursor: pointer;
				border: none;
				outline: none;
				background: none;
				font-size: 1.25rem;
				font-weight:bold;
				color: white;
			}
			.email-body{
				padding:10px 15px;
			}
		</style>
		
		 
</head>
</html>