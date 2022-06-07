<?php
session_start();

if (ini_get('register_globals') == '1') {
    echo 'Vous devriez mettre <b>register_globals</b> à <b>Off</b><br/>';
}

$_SESSION['login'] = 'toto';
$login = 'titi';

// Affiche :
// - 'titi' avec register_globals à On donc modification car dans CE cas
//   $_SESSION['login'] et $login représente la même variable
// - 'toto' avec register_globals à Off
echo $_SESSION['login'];
echo '<br/>';
echo 'si toto est afficher, votre <b>register_globals</b> est sur <b>Off</b>, si titi est affiché, il est sur <b>On</b> <br/> Mettez <b>register_globals</b> sur <b>Off</b> pour utiliser proprement les sessions<br/>';
echo session_save_path();
echo ' chemin de sauvegarde des sessions<br/>';
echo $_SERVER['PHP_SELF'];
echo ' requete serveur PHP_SELF<br/>';
echo $_SERVER['GATEWAY_INTERFACE'];
echo ' requete serveur GATEWAY_INTERFACE<br/>';
echo $_SERVER['SERVER_ADDR'];
echo ' requete serveur SERVER_ADDR<br/>';
echo $_SERVER['SERVER_NAME'];
echo ' requete serveur SERVER_NAME<br/>';
echo $_SERVER['SERVER_SOFTWARE'];
echo ' requete serveur SERVER_SOFTWARE<br/>';
echo $_SERVER['SERVER_PROTOCOL'];
echo ' requete serveur SERVER_PROTOCOL<br/>';
echo $_SERVER['REQUEST_METHOD'];
echo ' requete serveur REQUEST_METHOD<br/>';
echo $_SERVER['REQUEST_TIME'];
echo ' requete serveur REQUEST_TIME<br/>';
echo $_SERVER['QUERY_STRING'];
echo ' requete serveur QUERY_STRING<br/>';
echo $_SERVER['HTTP_ACCEPT'];
echo ' requete serveur HTTP_ACCEPT<br/>';
echo $_SERVER['HTTP_ACCEPT_CHARSET'];
echo ' requete serveur HTTP_ACCEPT_CHARSET<br/>';
echo $_SERVER['HTTP_HOST'];
echo ' requete serveur HTTP_HOST<br/>';
echo $_SERVER['HTTP_REFERER'];
echo ' requete serveur HTTP_REFERER<br/>';
echo $_SERVER['HTTPS'];
echo ' requete serveur HTTPS<br/>';
echo $_SERVER['REMOTE_ADDR'];
echo ' requete serveur REMOTE_ADDR<br/>';
echo $_SERVER['REMOTE_HOST'];
echo ' requete serveur REMOTE_HOST<br/>';
echo $_SERVER['REMOTE_PORT'];
echo ' requete serveur REMOTE_PORT<br/>';
echo $_SERVER['SCRIPT_FILENAME'];
echo ' requete serveur SCRIPT_FILENAME<br/>';
echo $_SERVER['SERVER_ADMIN'];
echo ' requete serveur SERVER_ADMIN<br/>';
echo $_SERVER['SERVER_PORT'];
echo ' requete serveur SERVER_PORT<br/>';
echo $_SERVER['SERVER_SIGNATURE'];
echo ' requete serveur SERVER_SIGNATURE<br/>';
echo $_SERVER['PATH_TRANSLATED'];
echo ' requete serveur PATH_TRANSLATED<br/>';
echo $_SERVER['SCRIPT_NAME'];
echo ' requete serveur SCRIPT_NAME<br/>';
echo $_SERVER['SCRIPT_URI'];
echo ' requete serveur SCRIPT_URI<br/>';
?>
