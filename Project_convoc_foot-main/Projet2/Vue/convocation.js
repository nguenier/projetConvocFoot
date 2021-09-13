function change(str,str2){
	date(str,str2);
	exempt(str);
	absent(str);
	blesse(str);
	suspendu(str);
	nonlicence(str);
	recupjoueur();
}

function change2(str,str2){
	modifjoueur(str,str2);
	exempt(str);
}

function date(str,str2){
	if (str==null)
		{
			document.getElementById("comp1").innerHTML="...";
			document.getElementById("equ1").innerHTML="...";
			document.getElementById("site1").innerHTML="...";
			document.getElementById("terr1").innerHTML="...";
			document.getElementById("heu1").innerHTML="...";
			return;
		}
		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					if(str2=='SENIORS_A'){
						var stats1 = JSON.parse(xmlhttp.responseText);
						document.getElementById("comp1").innerHTML=stats1.compet;
						document.getElementById("equ1").innerHTML=stats1.equadv;
						document.getElementById("site1").innerHTML=stats1.site;
						document.getElementById("terr1").innerHTML=stats1.terr;
						document.getElementById("heu1").innerHTML=stats1.heu;
					}
					if(str2=='SENIORS_B'){
						var stats1 = JSON.parse(xmlhttp.responseText);
						document.getElementById("comp2").innerHTML=stats1.compet;
						document.getElementById("equ2").innerHTML=stats1.equadv;
						document.getElementById("site2").innerHTML=stats1.site;
						document.getElementById("terr2").innerHTML=stats1.terr;
						document.getElementById("heu2").innerHTML=stats1.heu;
					}
					if(str2=='SENIORS_C'){
						var stats1 = JSON.parse(xmlhttp.responseText);
						document.getElementById("comp3").innerHTML=stats1.compet;
						document.getElementById("equ3").innerHTML=stats1.equadv;
						document.getElementById("site3").innerHTML=stats1.site;
						document.getElementById("terr3").innerHTML=stats1.terr;
						document.getElementById("heu3").innerHTML=stats1.heu;
					}
				}
			}
			xmlhttp.open("GET","Controleur/controleur_convocation_affiche.php?q="+str+"&r="+str2,false);
			xmlhttp.send();

}

function exempt(str){
	if (str==null)
	{
		return;
	}
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("table1").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","Controleur/controleur_convocation_exempt.php?q="+str,false);
		xmlhttp.send();
}

function absent(str){
	if (str==null)
	{
		return;
	}
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("table2").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","Controleur/controleur_convocation_absent.php?q="+str,false);
		xmlhttp.send();
}

function blesse(str){
	if (str==null)
	{
		return;
	}
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("table3").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","Controleur/controleur_convocation_blesse.php?q="+str,false);
		xmlhttp.send();
}

function suspendu(str){
	if (str==null)
	{
		return;
	}
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("table4").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","Controleur/controleur_convocation_suspendu.php?q="+str,false);
		xmlhttp.send();
}

function nonlicence(str){
	if (str==null)
	{
		return;
	}
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("table5").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","Controleur/controleur_convocation_nonlic.php?q="+str,false);
		xmlhttp.send();
}
function recupjoueur(){
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				for (let i=1; i<=14; i++){
					let ident="ja"+i; 
					document.getElementById(ident).innerHTML= xmlhttp.responseText;
					ident="jb"+i; 
					document.getElementById(ident).innerHTML= xmlhttp.responseText;
					ident="jc"+i; 
					document.getElementById(ident).innerHTML= xmlhttp.responseText;
				}
			}
		}
		xmlhttp.open("GET","Controleur/controleur_exempt.php",true);
		xmlhttp.send();
}
function modifjoueur(val,ident){
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById(ident).innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","Controleur/controleur_exempt.php?q="+val+"&r="+ident,false);
		xmlhttp.send();
}

	
	/*var test= document.getElementById("table1");
	var test2=test.querySelectorAll("td");
	var test3=[];
	for (let element of Array.from(test2)) {
		test3.push(element.textContent);
	}
	let select=document.getElementById(str);
	//var option="";
	/*var length = select.options.length; 
	for (i = 0; i < length; i++) { 
		select.options[i] = null; 
	}
	//$("#ja1").empty();
	select.options[select.options.length] = new Option ("");
	for (let element2 of test3){
		//option+="<option>"+element2+"</option>";
		select.options[select.options.length] = new Option (element2);
	}
	//select.innerHTML=option;*/
//}
