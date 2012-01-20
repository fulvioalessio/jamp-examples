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
$xml = new ClsXML("send.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function html_load()
{
	global $event;
	$code = "
	msglabel = $('label1');
	function count(txt, event)
	{
		if (!event) event = window.event;
		var keynum = (window.event) ? event.keyCode : event.which;
		var tot = 160 - txt.value.length;
		if (tot <= 0) 
		{
			switch (keynum) 
			{
				case 0:
				case 36: //First
				case 35: //Last
				case 33: //Page Up
				case 34: //Page Down
				case 38: //Up
				case 40: //Down
				break;
				default:
				SYSTEMEVENT.preventDefault(event);
			}
		}
		msglabel.innerHTML = '<br>Caratteri rimasti: ' + tot +'MAX';
	}

	function smsMSG(dsObjName)
	{
		if(dsObjName == 'ds1') LANG.package['JDS003'] = 'Vuoi inviare l\'SMS?';
		else LANG.package['JDS003'] = 'Vuoi salvare le modifiche?';
	}

	SYSTEMEVENT.addBeforeCustomFunction('DS','dssave', 'smsMSG');

	";
	$event->setCodeJs($code);
}
?>
