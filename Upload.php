<?php include('header.php')?>
<div id="divInteract">
	<form action="GestionDuTeleversement.php" method="post" enctype="multipart/form-data">
	    Insérez la base de données:
	    <input type="file" name="fileToUpload" id="fileToUpload">
	    <input type="submit" value="Téléversement" name="submit">
	</form>
	<!---<form action="TestTeleversement.php" method="post" enctype="multipart/form-data">
	    Insérez une image:
	    <input type="file" name="fileToUpload2" id="fileToUpload2">
	    <input type="submit" value="Téléversement" name="submit">
	</form>--->
</div>
<?php include('footer.php')?>
