function SourisOnTableau(obj)
{
	obj.style= "background-color:dodgerblue; color:white;";
}
	
function SourisOutTableau(obj)
{
	obj.style= "background-color:white; color:black;";
}
	
function ClickTableau(id1, id2, id3, id4, cible1, cible2, cible3, cible4)
{
	cible1.value = document.getElementById(id1).innerHTML;	
	cible2.value = document.getElementById(id2).innerHTML;
	cible3.value = document.getElementById(id3).innerHTML;
	if (id4 != 0)
	{
		cible4.value = document.getElementById(id4).innerHTML;		
	}
	
}
	
function ajout()
{
	var test;
	test = confirm("Voulez vous vraiment ajouter un exercice?");
	if (test== true)
	{
		document.getElementById("mode").value = "ajouter";	
		document.getElementById("recherche").submit(); 
	}
}

function modif()
{
	var test;
	test = confirm("Voulez vous vraiment modifier un exercice?");
	if (test== true)
	{
		document.getElementById("mode").value = "modifier";	
		document.getElementById("recherche").submit();
	}
	 
}

function suppr()
{
	var test;
	test = confirm("Voulez vous vraiment supprimer un exercice?");
	if (test== true)
	{
		document.getElementById("mode").value = "supprimer";	
		document.getElementById("recherche").submit(); 
	}
	
}
