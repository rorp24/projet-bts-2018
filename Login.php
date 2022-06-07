    <?php
    $login_valide = "prof";
    $pwd_valide = "dvmath";
    if (isset($_POST['Login']) && isset($_POST['Password'])) {
    	if ($login_valide == htmlspecialchars($_POST['Login']) && $pwd_valide == htmlspecialchars($_POST['Password'])) {
    		session_start ();
    		$_SESSION['Login'] = htmlspecialchars($_POST['Login']);
    		$_SESSION['Password'] = htmlspecialchars($_POST['Password']);
    		header ('location:LectureNotes.php');
    	}
    	else {
    		echo '<body onLoad="alert(\'Membre non reconnu...\')">';
    		echo '<meta http-equiv="refresh" content="0;URL=index.php">';
    	}
    }
    else {
    	echo '<body onLoad="alert(\'Vous n\'avez pas le droit de vous connecter de cette façon\')">';
    	echo '<meta http-equiv="refresh" content="0;URL=index.php">';
    }
    ?>
