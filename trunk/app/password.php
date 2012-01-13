<?php
/**
* PHP Source File
* @name JApp
* @author Alyx-Software Innovation <info@alyx.it>
* @version 2.0.0
* @copyright	Alyx Association 2008-2010
* @license GNU Public License
*/

require_once("acl.php");

$DS_VALIDATE_RULE["ds1"]= "
		var dsObj = $('ds1');
		var user = $('user');
		var pwd1 = $('pwd1');
		var pwd2 = $('pwd2');
		var validate = true;
		if (pwd1.value=='')
		{ 
			validate = false;
			alert('Inserire la nuova password');
		}
		else if (pwd1.value!=pwd2.value)
		{
			validate = false;
			alert('Le password non coincidono');
		}
		if (validate == false) setTimeout(function(){\$('pwd1').focus();},1);
		return validate;
		";	

$xml 	= new ClsXML("password.xml");
$event = new ClsEvent($xml);
$event->managerRequest();


function data_after_changepasswd($status)
{
 	global $event;
	if($status) $event->setCodeJs("alert('Cambio Password Effettuato con Successo!')");
	else $event->setCodeJs("alert('Cambio Password Fallito!')");
}
?>
