function absent(val,ident){
	var nom = document.getElementById('nompren'+ident).value;
	var date = document.getElementById('dateb'+ident).value;
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
				document.getElementById(ident).innerHTML='<option disabled selected>'+xmlhttp.responseText+'</option><option>...</option><option>A</option><option>N</option><option>B</option><option>S</option>';
			}
		}
		xmlhttp.open("GET","absences.php?q="+val+"&s="+nom+"&t="+date,true);
		xmlhttp.send();
}
