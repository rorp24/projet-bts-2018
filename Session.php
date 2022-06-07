<?php include('header.php');
	$connect = mysqli_connect(hostname, username, password,dbname);
	if (! $connect)
	{
		die(mysqli_error());
	}
	
	$exo1 = htmlspecialchars($_POST['ex1']);
	$exo2 = htmlspecialchars($_POST['ex2']);
	$exo3 = htmlspecialchars($_POST['ex3']);
	$exo4 = htmlspecialchars($_POST['ex4']);
	$exo5 = htmlspecialchars($_POST['ex5']);
	$exo6 = htmlspecialchars($_POST['ex6']);
	$exo7 = htmlspecialchars($_POST['ex7']);
	$exo8 = htmlspecialchars($_POST['ex8']);
	$exo9 = htmlspecialchars($_POST['ex9']);
	$exo10 = htmlspecialchars($_POST['ex10']);
	
	
	$nom =  htmlspecialchars($_POST['nom']);
	
	if (isset($_POST['niveau']))
	{
		$niv = htmlspecialchars($_POST['niveau']);
	}
	else
	{
		$niv = "à définir";
	}
	
	if (isset($_POST['idSes']))
	{
		$id = htmlspecialchars($_POST['idSes']);
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
	
	if ($exo1 != NULL AND $exo2 != NULL AND $nom != NULL)
	{
		if($mode=="ajouter")
		{

			$add = mysqli_query($connect, "INSERT INTO Session (Nom_Session, Niveau_Session, idExercices1, idExercices2, idExercices3, idExercices4,idExercices5, idExercices6, idExercices7, idExercices8, idExercices9, idExercices10) VALUES ('$nom', '$niv', $exo1, $exo2, $exo3, $exo4, $exo5, $exo6, $exo7, $exo8, $exo9, $exo10);");
			mysqli_commit($connect);
			
		}
		else if ($mode=="modifier")
		{
			$modif = mysqli_query($connect, "UPDATE Session  SET Nom_Session = '$nom', Niveau_Session = '$niv', idExercices1 = $exo1, idExercices2 = $exo2, idExercices3 = $exo3, idExercices4 = $exo4, idExercices5 = $exo5, idExercices6 = $exo6, idExercices7 = $exo7, idExercices8 = $exo8, idExercices9 = $exo9, idExercices10 = $exo10  WHERE id_Session =  $id;");
			mysqli_commit($connect);
			
		}
		else if ($mode=="supprimer")
		{
			$suppr = mysqli_query($connect, "DELETE FROM Session WHERE id_Session =  $id;");
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
				<input type="text" name="nom" id="nom" placeholder="Nom Session" style="width:25%" required/>
				<input type="text" name="niveau" id="niveau" placeholder="niveau" style="width:15%" required/>
				<br/>
				<input type="text" name="ex1" id="ex1" placeholder="Identifiant ex1" style="width:19%" required/>
				<input type="text" name="ex2" id="ex2" placeholder="Identifiant ex2" style="width:19%" required/>
				<input type="text" name="ex3" id="ex3" placeholder="Identifiant ex3" style="width:19%" />
				<input type="text" name="ex4" id="ex4" placeholder="Identifiant ex4" style="width:19%" />
				<input type="text" name="ex5" id="ex5" placeholder="Identifiant ex5" style="width:19%" />
				<input type="text" name="ex6" id="ex6" placeholder="Identifiant ex6" style="width:19%" />
				<input type="text" name="ex7" id="ex7" placeholder="Identifiant ex7" style="width:19%" />
				<input type="text" name="ex8" id="ex8" placeholder="Identifiant ex8" style="width:19%" />
				<input type="text" name="ex9" id="ex9" placeholder="Identifiant ex9" style="width:19%" />
				<input type="text" name="ex10" id="ex10" placeholder="Identifiant ex10" style="width:19%" />
				
				<input type="hidden" name="idSes" id="idSes">
				<input type="hidden" name="mode" id="mode" value="ERREUR">
				<br/>
			</form>
			<button onclick="ajout()" id="ajout">Ajouter Session</button>
			<button onclick="modif()" id="modifier">Modifier Session</button>
			<button onclick="suppr()" id="suppr">Supprimer Session</button>
			<table border=1 style="width:100%">
				<thead align="center">
					<th style="width:9%"> Identifiant </th>
					<th style="width:41%"> Exercice </th>
					<th style="width:41%"> Résultat attendu </th>
					<th style="width:9%"> niveau </th>
				</thead>
				<tbody align="center">
					<?php
					$results = mysqli_query($connect ,"SELECT * FROM Exercices_modeAuto;");
					$count = 0;
					while($row = mysqli_fetch_array($results)):?>
						<tr onmouseover="SourisOnTableau(this)" onmouseout="SourisOutTableau(this)">
							<td id= "idEx<?php echo $count?>" > <?php echo $row['idExercices'];?> </td>
							<td id= "exercice<?php echo $count?>"> <?php echo $row['Exercices_calcul'];?> </td>
							<td id= "resultat<?php echo $count?>"> <?php echo $row['Exercice_resultat'];?> </td>
							<td id= "niveau<?php echo $count?>"> <?php echo $row['Exercices_Niveau'];?> </td>
							
						</tr>
					<?php 
					$count= $count+1;
					endwhile;
					?>

				</tbody>
			</table>
		</div>
		<div id="tableauSession" 
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
						<tr onmouseover="SourisOnTableau(this)" onmouseout="SourisOutTableau(this)" onclick="ClickTableau('nom<?php echo $count?>', 'niveauSes<?php echo $count?>', 'idEx1-<?php echo $count?>', 'idEx2-<?php echo $count?>', 'idEx3-<?php echo $count?>', 'idEx4-<?php echo $count?>', 'idEx5-<?php echo $count?>', 'idEx6-<?php echo $count?>', 'idEx7-<?php echo $count?>', 'idEx8-<?php echo $count?>', 'idEx9-<?php echo $count?>', 'idEx10-<?php echo $count?>', 'idSes<?php echo $count?>', nom, niveau, ex1, ex2, ex3, ex4, ex5, ex6, ex7, ex8, ex9, ex10, idSes)">
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
							<td id= "niveauSes<?php echo $count?>"> <?php echo $row['Niveau_Session'];?> </td>
							<td id= "idSes<?php echo $count?>" hidden> <?php echo $row['id_Session'];?> </td>
							<td id= "idEx1-<?php echo $count?>" hidden> <?php echo $row['idExercices1'];?> </td>
							<td id= "idEx2-<?php echo $count?>" hidden> <?php echo $row['idExercices2'];?> </td>
							<td id= "idEx3-<?php echo $count?>" hidden> <?php echo $row['idExercices3'];?> </td>
							<td id= "idEx4-<?php echo $count?>" hidden> <?php echo $row['idExercices4'];?> </td>
							<td id= "idEx5-<?php echo $count?>" hidden> <?php echo $row['idExercices5'];?> </td>
							<td id= "idEx6-<?php echo $count?>" hidden> <?php echo $row['idExercices6'];?> </td>
							<td id= "idEx7-<?php echo $count?>" hidden> <?php echo $row['idExercices7'];?> </td>
							<td id= "idEx8-<?php echo $count?>" hidden> <?php echo $row['idExercices8'];?> </td>
							<td id= "idEx9-<?php echo $count?>" hidden> <?php echo $row['idExercices9'];?> </td>
							<td id= "idEx10-<?php echo $count?>" hidden> <?php echo $row['idExercices10'];?> </td>
						</tr>
					<?php 
					$count= $count+1;
					endwhile;
					?>
				</tbody>
			</table>
		</div>
<?php include('footer.php');?>
