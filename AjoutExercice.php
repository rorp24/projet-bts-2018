<?php 
	include('header.php');
	$connect = mysqli_connect(hostname, username, password,dbname);
	if (! $connect)
	{
		die(mysqli_error());
	}
	
	$exo = htmlspecialchars($_POST['exercice']);
	$res = htmlspecialchars($_POST['resultat']);
	if (isset($_POST['niveau']))
	{
		$niv = htmlspecialchars($_POST['niveau']);
	}
	else
	{
		$niv = "à définir";
	}
	
	if (isset($_POST['idEx']))
	{
		$id = htmlspecialchars($_POST['idEx']);
	}
	else
	{
		$id = "à définir";
	}
	
	if (isset($_POST['mode']))
	{
		$mode = htmlspecialchars($_POST['mode']);
	}
	else
	{
		$mode = "ERREUR";
	}
	
	if ($exo != NULL AND $res != NULL)
	{
		if($mode=="ajouter")
		{

			$add = mysqli_query($connect, "INSERT INTO Exercices_modeAuto (Exercices_calcul, Exercice_resultat, Exercices_Niveau) VALUES ('$exo', '$res', '$niv');");
			mysqli_commit($connect);
			
		}
		else if ($mode=="modifier")
		{
			$modif = mysqli_query($connect, "UPDATE Exercices_modeAuto  SET Exercices_calcul = '$exo', Exercice_resultat = '$res', Exercices_Niveau = '$niv' WHERE idExercices =  $id;");
			mysqli_commit($connect);
			
		}
		else if ($mode=="supprimer")
		{
			$suppr = mysqli_query($connect, "DELETE FROM Exercices_modeAuto WHERE idExercices =  $id;");
			mysqli_commit($connect);
			
		}
		else
		{
			echo "<script>
					alert(\"erreur, aucun mode d'utilisation envoyer\");
					</script>";
		}
	}
	else
	{
			
	}
	
?>
	<div id="divInteract">
		<div id="remplissage" 
		style="width:50%; 
			margin-right:50%; 
			margin-top:0px; 
			position:absolute;
			background-color:white;">
			<form id="recherche" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<input type="text" name="exercice" id="exercice" placeholder="exercice" style="width:35%" required/>
				<input type="text" name="resultat" id="resultat" placeholder="resultat attendu" style="width:35%" required/>
				<input type="text" name="niveau" id="niveau" placeholder="niveau" style="width:10%" required/>
				<input type="hidden" name="idEx" id="idEx">
				<input type="hidden" name="mode" id="mode" value="ERREUR">
				<br/>
			</form>
			<button onclick="ajout()" id="ajout">Ajouter exercice</button>
			<button onclick="modif()" id="modifier">Modifier exercice</button>
			<button onclick="suppr()" id="suppr">Supprimer exercice</button>
			<button onclick="location.href='./Session.php'" id="creatSess"> Gestion session d'exercice</button>
			<table border=1 style="width:100%">
				<thead align="center">
					<th style="width:45%"> Exercice </th>
					<th style="width:45%"> Résultat attendu </th>
					<th style="width:10%"> niveau </th>
				</thead>
				<tbody align="center">
					<?php
					$results = mysqli_query($connect ,"SELECT * FROM Exercices_modeAuto;");
					$count = 0;
					while($row = mysqli_fetch_array($results)):?>
						<tr onmouseover="SourisOnTableau(this)" onmouseout="SourisOutTableau(this)" onclick="ClickTableau('exercice<?php echo $count?>', 'resultat<?php echo $count?>', 'niveau<?php echo $count?>', 'idEx<?php echo $count?>', exercice, resultat, niveau, idEx)">
							<td id= "exercice<?php echo $count?>"> <?php echo $row['Exercices_calcul'];?> </td>
							<td id= "resultat<?php echo $count?>"> <?php echo $row['Exercice_resultat'];?> </td>
							<td id= "niveau<?php echo $count?>"> <?php echo $row['Exercices_Niveau'];?> </td>
							<td id= "idEx<?php echo $count?>" hidden> <?php echo $row['idExercices'];?> </td>
						</tr>
					<?php 
					$count= $count+1;
					endwhile;
					?>

				</tbody>
			</table>
		</div>
		<div id="creationSession" 
		style="width:50%; 
			margin-left:50%; 
			margin-top:0px; 
			position:absolute;
			background-color:white;">
			<table border=1 style="width:100%">
				<thead align="center">
					<th style="width:15%"> Nom </th>
					<th style="width:75%"> Liste d'exo </th>
					<th style="width:10%"> niveau </th>
				</thead>
				<tbody>		
					<?php
					$connect = mysqli_connect(hostname, username, password,dbname);
					if (! $connect)
					{
						die(mysql_error());
					}
					$results = mysqli_query($connect, "SELECT * FROM Session;");
					$count = 0;
					while($row = mysqli_fetch_array($results)):?>
						<tr onmouseover="SourisOnTableau(this)" onmouseout="SourisOutTableau(this)" onclick="">
							<td id= "nom<?php echo $count?>"> <?php echo $row['Nom_Session'];?> </td>
							<td id= "exos<?php echo $count?>"> 
							<?php for($compteur=1; $compteur<=10; $compteur++)
												{
													$testeur=mysqli_query($connect,"SELECT * FROM Exercices_modeAuto as E, Session as S WHERE S.id_Session=".$row['id_Session']." AND E.idExercices= S.idExercices".$compteur." ;");
													$line= mysqli_fetch_array($testeur);
													echo $line['Exercices_calcul'];
													echo '|';
													echo $line['Exercice_resultat'];
													echo '<br/>';
												}?> 
							</td>
							<td id= "niveau<?php echo $count?>"> <?php echo $row['Niveau_Session'];?> </td>
							<td id= "idSes<?php echo $count?>" hidden> <?php echo $row['id_Session'];?> </td>
						</tr>
					<?php 
					$count= $count+1;
					endwhile;
					?>
				</tbody>
			</table>
		</div>
	</div>
<?php include('footer.php')?>
