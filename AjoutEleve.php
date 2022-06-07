<?php include('header.php');
	$connect = mysqli_connect(hostname, username, password,dbname);
	if (! $connect)
	{
		die(mysqli_error());
	}
	
	$Enom = htmlspecialchars($_POST['Enom']);
	$Eprenom = htmlspecialchars($_POST['Eprenom']);
	$classe = htmlspecialchars($_POST['classe']);	
	$nomRFID = htmlspecialchars($_POST['nomRFID']);
	
	if (isset($_POST['EidEleve']))
	{
		$id = htmlspecialchars($_POST['EidEleve']);
	}
	else if (isset($_POST['IIdEleve']))
	{
		$id = htmlspecialchars($_POST['IIdEleve']);
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
	
	if ($Enom != NULL AND $Eprenom != NULL AND $classe != NULL)
	{
		if($mode=="ajouter")
		{

			$add = mysqli_query($connect, "INSERT INTO Eleves (Nom_Eleve, Prenom_Eleve, Classe_Eleve) VALUES ('$Enom', '$Eprenom', '$classe');");
			mysqli_commit($connect);
			
		}
		else if ($mode=="modifier")
		{
			$modif = mysqli_query($connect, "UPDATE Eleves  SET Nom_Eleve = '$Enom', Prenom_Eleve = '$Eprenom', Classe_Eleve = '$classe' WHERE id_Eleve =  $id;");
			mysqli_commit($connect);
			
		}
		else if ($mode=="supprimer")
		{
			$suppr = mysqli_query($connect, "DELETE FROM Eleves WHERE id_Eleve =  $id;");
			mysqli_commit($connect);
			
		}
		else
		{
			echo "<script>
					alert(\"erreur, aucun mode d'utilisation envoyer\");
					</script>";
		}
	}
	else if($id != NULL AND $nomRFID != NULL)
	{
			$modif = mysqli_query($connect, "UPDATE Tag_Identification_Eleves  SET id_Identification_Eleves= '$id' WHERE Tag_Identification =  $nomRFID;");
			mysqli_commit($connect);
	}
	else
	{

	}
	
?>
	<div id="divInteract">
		<div id="eleve" 
		style="width:50%; 
			margin-right:50%; 
			margin-top:0px; 
			position:absolute;
			background-color:white;">
			<p class="entete"> Gestion d'élève </p>
			<form id="Feleve" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<input type="text" name="Enom" id="Enom" placeholder="nom de l'élève" required/>
				<input type="text" name="Eprenom" id="Eprenom" placeholder="prénom de l'élève" required/>
				<input type="text" name="classe" id="classe" size=5 placeholder="classe" required/>
				<input type="hidden" name="mode" id="mode" value="ERREUR">
				<input type=hidden name="EidEleve" id="EidEleve">
			</form>
			<button onclick="ajout()" id="ajouter">Ajouter élève</button>
			<button onclick="modif()" id="modifier">Modifier élève</button>
			<button onclick="suppr()" id="suppr">Supprimer élève</button>
			<table border=1 style="width:100%">
				<thead align="center">
					<th style="width:40%"> Nom </th>
					<th style="width:40%"> Prénom </th>
					<th style="width:10%"> Classe </th>
					<th style="width:10%"> identifiant </th>
				</thead>
				<tbody align="center">
					<?php
					$results = mysqli_query($connect,"SELECT * FROM Eleves;");
					$count = 0;
					while($row = mysqli_fetch_array($results)):?>
						<tr onmouseover="SourisOnTableau(this)" onmouseout="SourisOutTableau(this)" onclick="ClickTableau('Enom<?php echo $count?>', 'Eprenom<?php echo $count?>', 'classe<?php echo $count?>', 'id<?php echo $count?>', Enom, Eprenom, classe, EidEleve, IIdEleve)">
							<td id="Enom<?php echo $count?>"> <?php echo $row['Nom_Eleve'];?> </td>
							<td id="Eprenom<?php echo $count?>"> <?php echo $row['Prenom_Eleve'];?> </td>
							<td id="classe<?php echo $count?>"> <?php echo $row['Classe_Eleve'];?> </td>
							<td id="id<?php echo $count?>"> <?php echo $row['id_Eleve'];?> </td>
						</tr>
					<?php
					$count= $count+1;
					endwhile;
					?>
				</tbody>
			</table>
		</div>
		<div id="RFID" 
		style="width:50%; 
			margin-left:50%; 
			margin-top:0px; 
			position:absolute;
			background-color:white;">
			<p class="entete"> Associer Identifieur </p>
			<form id="Identifiant" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<input type="text" name="nomRFID" id="nomRFID" placeholder="nom de l'identifieur" required/>
				<input type="text" name="IIdEleve" id="IIdEleve" placeholder="identifiant de l'eleve" required/>
			</form>
			<button onclick="soumettre()" id="associer">Associer</button>

			<table border=1 style="width:100%">
				<thead align="center">
					<th style="width:20%"> Identifieur </th>
					<th style="width:40%"> Nom </th>
					<th style="width:40%"> Prénom </th>
				</thead>
				<tbody align="center">
					<?php
						$results = mysqli_query($connect,"SELECT * FROM Tag_Identification_Eleves LEFT JOIN Eleves ON Id_Eleve =id_Identification_Eleves;");
						$count = 0;
						while($row = mysqli_fetch_array($results)):?>
							<tr onmouseover="SourisOnTableau(this)" onmouseout="SourisOutTableau(this)" onclick="ClickID('identifieur<?php echo $count?>', nomRFID)"> 
								<td id="identifieur<?php echo $count?>"> <?php echo $row['Tag_Identification'];?> </td>
								<td id="Inom<?php echo $count?>"> <?php echo $row['Nom_Eleve'];?> </td>
								<td id="Iprenom<?php echo $count?>"> <?php echo $row['Prenom_Eleve'];?> </td>
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
