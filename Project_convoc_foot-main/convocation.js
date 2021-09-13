function date1(str){
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
				var stats1 = JSON.parse(xmlhttp.responseText);
				document.getElementById("comp1").innerHTML=stats1.compet;
				document.getElementById("equ1").innerHTML=stats1.equadv;
				document.getElementById("site1").innerHTML=stats1.site;
				document.getElementById("terr1").innerHTML=stats1.terr;
				document.getElementById("heu1").innerHTML=stats1.heu;
			}
		}
		xmlhttp.open("GET","convocation1.php?q="+str,true);
		xmlhttp.send();
}

function date2(str){
	if (str==null)
	{
		document.getElementById("comp2").innerHTML="...";
		document.getElementById("equ2").innerHTML="...";
		document.getElementById("site2").innerHTML="...";
		document.getElementById("terr2").innerHTML="...";
		document.getElementById("heu2").innerHTML="...";
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
				var stats2 = JSON.parse(xmlhttp.responseText);
				document.getElementById("comp2").innerHTML=stats2.compet;
				document.getElementById("equ2").innerHTML=stats2.equadv;
				document.getElementById("site2").innerHTML=stats2.site;
				document.getElementById("terr2").innerHTML=stats2.terr;
				document.getElementById("heu2").innerHTML=stats2.heu;
			}
		}
		xmlhttp.open("GET","convocation2.php?q="+str,true);
		xmlhttp.send();
}

function date3(str){
	if (str==null)
	{
		document.getElementById("comp3").innerHTML="...";
		document.getElementById("equ3").innerHTML="...";
		document.getElementById("site3").innerHTML="...";
		document.getElementById("terr3").innerHTML="...";
		document.getElementById("heu3").innerHTML="...";
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
				var stats3 = JSON.parse(xmlhttp.responseText);
				document.getElementById("comp3").innerHTML=stats3.compet;
				document.getElementById("equ3").innerHTML=stats3.equadv;
				document.getElementById("site3").innerHTML=stats3.site;
				document.getElementById("terr3").innerHTML=stats3.terr;
				document.getElementById("heu3").innerHTML=stats3.heu;
			}
		}
		xmlhttp.open("GET","convocation3.php?q="+str,true);
		xmlhttp.send();
}
