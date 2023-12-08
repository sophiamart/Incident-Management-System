<?php
    //includes php file that connects to the database
	include_once 'IncidentTracking.php';?>
    <link href="style.css" rel="stylesheet" type="text/css">

<!DOCTYPE html>
<html>
<head>
<h1> Incident Tracking </h1>
</head> 
<body> 
    <!-- assigns class dropdown -->
	<div class="dropdown"> 
        <!-- assigns dropdown-button class -->
		<button class="dropdown-button">People</button> 
        <!-- make a list out of <a> hyperlinks -->
		<div class="dropdown-list"> 
			<a href="/remove.php">Remove</a> 
			<a href="/addpeople.php">Add</a> 
		</div> 
	</div> 
    <!-- make buttons that are hypgerlinks to access other pages -->
    <form action = "/newincident.php">
        <button class = "button">New Incident</button>
    </form>
    <form action = "/updateincident.php">
        <button class = "button">Update Incident State</button>
    </form>
    <form action = "/comments.php">
        <button class = "button">Add Comments</button>
    </form>
    <form action = "/incidentview.php">
        <button class = "button">View Incident</button>
    </form>
</body> 
</html> 