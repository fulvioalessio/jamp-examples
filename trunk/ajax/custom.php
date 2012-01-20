<?php
/**
* PHP Source File
* @author	Alyx Association <info@alyx.it>
* @version 2.0.0
* @copyright	Alyx Association 2008-2010
* @license GNU Public License
*/

require_once("../require.inc.php");
$system = new ClsSystem(true);
$xml = new ClsXML("custom.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function html_load()
{
	global $event;
	$code = "
		function sendRequest(type)
		{
			var post = 'data=operation&type='+type;
			post += '&number1='+$('number1').value;
			post += '&number2='+$('number2').value;
			AJAX.request('POST', 'custom.php', post, false, false);
		}
	";
	$event->setCodeJs($code);
}

function operation() 
{
 	global $event; 
	$code = "\n$('number1').value='".$_POST['number1']."';";
 	$code.= "\n$('number2').value='".$_POST['number2']."';";
 	switch ($_POST['type'])
 	{
 		case "addition":
				$result = $_POST['number1'] + $_POST['number2'];
	 		break;
 		case "subtraction":
				$result = $_POST['number1'] - $_POST['number2'];
 			break;
 		case "multiplication":
				$result = $_POST['number1'] * $_POST['number2'];
 			break;
 	}
	$code .= "\n$('result').innerHTML='".$result."';";
	$event->returnRequest("", $code);
}
?>