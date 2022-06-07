<?php 
	session_start();
	if (isset($_SESSION['Login']) && isset($_SESSION['Password'])) 
	{
		header ('location:LectureNotes.php');
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml" 
		xmlns:svg="http://www.w3.org/2000/svg">
	<head>
		<link href="ATH.css" rel="stylesheet" type="text/css"/>
		<title>DV Math</title>
	</head>
	<body>
		<div id="login"
			align="center"
			style="
				width:25%;
				border-style:solid;
				background-color:LightGrey;
				border-color:Grey;
				margin:auto;	
			"
		>
			<form method="POST" action="./Login.php">
				<input type="text" name="Login" placeholder="Login"/>
				<br/>
				<input type="password" name="Password" placeholder="mot de passe"/>
				<br/>
				<input type="submit" value="connexion"/>
			</form>
		</div>
	</body>
</html>
