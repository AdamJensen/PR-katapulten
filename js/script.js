function validate()
{
var chks = document.getElementsByName.form1('opgave[]');
var hasChecked = false;
for (var i = 0; i < chks.length; i++)
{
if (chks[i].checked)
{
document.getElementById("titel").style.visibility='visible';

hasChecked = true;
if (chks[0].checked)
{ 
	document.getElementById("hjemmesiden").style.visibility='visible';
	
	document.getElementById("vedhaeft").style.visibility='visible';
}
if (opg[1].checked)
{ 
alert("Green.");
}
if (opg[2].checked)
{ 
alert("Green.");
}
if (opg[3].checked)
{ 
alert("Green.");
}
if (opg[4].checked)
{ 
alert("Green.");
}
if (opg[5].checked)
{ 
alert("Green.");
}if (opg[6].checked)
{ 
alert("Green.");
}if (opg[7].checked)
{ 
alert("Green.");
}if (opg[8].checked)
{ 
alert("Green.");
}if (opg[9].checked)
{ 
alert("Green.");
break;
}

}
if (hasChecked == false)
{
alert("Du har ikke valgt noget endnu...");
return false;
}
return true;
}
break;
}

}
if (hasChecked == false)
{
alert("Please select at least one.");
return false;
}
return true;
}