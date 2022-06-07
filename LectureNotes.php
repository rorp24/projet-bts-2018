<?php 
	include ('header.php');
	if (isset($_POST['nom']) and ! empty($_POST['nom']) ) 
	{
		$nom = $_POST['nom'];
	}
	else
	{
		$nom ='' ;
	}
	if (isset($_POST['prenom']) and ! empty($_POST['prenom'])) 
	{
		$prenom = $_POST['prenom'];
	}
	else
	{
		$prenom ='' ;
	}
	if (isset($_POST['classe']) and ! empty($_POST['classe'])) 
	{
		$classe = $_POST['classe'] ;
	}
	else
	{
		$classe ='' ;
	}
	if (isset($_POST['debRech']) and ! empty($_POST['debRech'])) 
	{
		$debRech = $_POST['debRech'];
	}
	else
	{
		$debRech ='2000-01-01' ;
	}
	if (isset($_POST['finRech']) and ! empty($_POST['finRech'])) 
	{
		$finRech = $_POST['finRech'];
	}
	else
	{
		$finRech = date("Y-m-d");
	}
		
?>

	<div id="divInteract">
		<p class="entete">Recherche</p>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<input type="text" name="nom" placeholder="nom de l'élève"/>
			<input type="text" name="prenom" placeholder="prénom de l'élève"/>
			<input type="text" name="classe" size=5 placeholder="classe"/>
			rechercher du <input type="date" name="debRech" placeholder="jour" value="" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"/>
			au <input type="date" name="finRech" placeholder="jour" value=<?php
			echo $finRech;
			?> required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"/>
			<br/>
			<input type="submit" value="Rechercher"/>
			<input type="reset" value="remise à zéro formulaire de recherche"/>
		</form>
		<br/>
	</div>
	<table border=1 style="width:100%">
		<thead align="center">
			<th style="width:5%"> Classe </th>
			<th style="width:15%"> Nom </th>
			<th style="width:15%"> Prénom </th>
			<th style="width:10%"> date </th>
			<th style="width:50%"> session </th>
			<th style="width:5%"> Note </th>
		</thead>
		<tbody align="center">
			<?php
			$connect = mysqli_connect(hostname, username, password,dbname);
			if (! $connect)
			{
				die(mysqli_error());
			}
			$results = mysqli_query($connect,"SELECT * FROM Session, Session_Fini, Eleves WHERE Session.id_Session = Session_Fini.id_Session AND (id_Identification_Eleves OR id_Identification_Eleves2) = id_Eleve AND Nom_Eleve LIKE '$nom%' AND Prenom_Eleve LIKE '$prenom%' AND Classe_Eleve LIKE '$classe%' AND SessionFini_Date BETWEEN DATE('$debRech') AND DATE('$finRech') ;");
			while($row = mysqli_fetch_array($results)):?>
				<tr onmouseover="SourisOnTableau(this)" onmouseout="SourisOutTableau(this)">
					<td> <?php echo $row['Classe_Eleve'];?> </td>
					<td> <?php echo $row['Nom_Eleve'];?> </td>
					<td> <?php echo $row['Prenom_Eleve'];?> </td>
					<td> <?php echo $row['SessionFini_Date'];?> </td>
					<td> <?php echo $row['Nom_Session'];?> </td>
					<td> <?php echo $row['SessionFini_Note'];?>/20 </td>
				</tr>
			<?php 
			endwhile;
			?>
		</tbody>
	</table>
<?php 
	include('footer.php');
?>
