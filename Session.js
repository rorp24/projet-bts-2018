function SourisOnTableau(obj)
{
	obj.style= "background-color:dodgerblue; color:white;";
}
	
function SourisOutTableau(obj)
{
	obj.style= "background-color:white; color:black;";
}
	
function ClickTableau(id1, id2, id3, id4, id5, id6, id7, id8, id9, id10, id11, id12, id13, cible1, cible2, cible3, cible4, cible5, cible6, cible7, cible8, cible9, cible10, cible11, cible12, cible13)
{
	cible1.value = document.getElementById(id1).innerHTML;	
	cible2.value = document.getElementById(id2).innerHTML;	
	cible3.value = document.getElementById(id3).innerHTML;
	cible4.value = document.getElementById(id4).innerHTML;
	cible5.value = document.getElementById(id5).innerHTML;
	cible6.value = document.getElementById(id6).innerHTML;
	cible7.value = document.getElementById(id7).innerHTML;
	cible8.value = document.getElementById(id8).innerHTML;
	cible9.value = document.getElementById(id9).innerHTML;
	cible10.value = document.getElementById(id10).innerHTML;
	cible11.value = document.getElementById(id11).innerHTML;
	cible12.value = document.getElementById(id12).innerHTML;
	cible13.value = document.getElementById(id13).innerHTML;

}
	
function ajout()
{
	var test;
	test = confirm("Voulez vous vraiment ajouter une session d'exercice?");
	if (test== true)
	{
		document.getElementById("mode").value = "ajouter";	
		document.getElementById("recherche").submit(); 
	}
}

function modif()
{
	var test;
	test = confirm("Voulez vous vraiment modifier une session d'exercice?");
	if (test== true)
	{
		document.getElementById("mode").value = "modifier";	
		document.getElementById("recherche").submit();
	}
	 
}

function suppr()
{
	var test;
	test = confirm("Voulez vous vraiment supprimer une session d'exercice?");
	if (test== true)
	{
		document.getElementById("mode").value = "supprimer";	
		document.getElementById("recherche").submit(); 
	}
	
}
