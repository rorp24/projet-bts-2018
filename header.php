<?php 
	session_start();
	if (isset($_SESSION['Login']) && isset($_SESSION['Password'])) 
	{
		
	}
	else
	{
		header ('location: index.php');
	}
?>
<?xml version="1.0" encoding="utf-8"?>
	<html xmlns="http://www.w3.org/1999/xhtml" 
		xmlns:svg="http://www.w3.org/2000/svg">
	<head>
		<link href="ATH.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="<?php 
																if($_SERVER['PHP_SELF']== "/AjoutExercice.php")
																{
																	echo "AjoutExercice.js";
																} 
																else if($_SERVER['PHP_SELF']== "/LectureNotes.php")
																{
																	echo "LectureNotes.js";
																}
																else if($_SERVER['PHP_SELF']== "/AjoutEleve.php")
																{
																	echo "AjoutEleve.js";
																}
																else if($_SERVER['PHP_SELF']== "/Session.php")
																{
																	echo "Session.js";
																}?>"> </script>
		<title>DV Math</title>
	</head>
	<body>
	<?php include('loginMySQL.php');?>
		<div class="options">
			<button onclick="location.href='./LectureNotes.php'" id="NotesEleve"> Lecture des notes élève </button>
			<button onclick="location.href='./AjoutExercice.php'" id="AjoutExo"> Gestion des exercices </button>
			<button onclick="location.href='./AjoutEleve.php'" id="AjoutEleve"> Gestion des élèves </button>
			<button onclick="location.href='./Logout.php'" id="AjoutEleve"> Déconnexion </button>
		</div>

