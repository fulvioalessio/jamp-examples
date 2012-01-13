<?php
/**
* PHP Source File
* @author	Alyx Association <info@alyx.it>
* @version 2.0.0
* @copyright	Alyx Association 2008-2010
* @license GNU Public License
*/

require_once("./../../class/system.class.php");
$system = new ClsSystem(true);
$xml = new ClsXML("dsselect_link.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function html_load()
{
	global $event;
	$code = "
		function scheda()
		{
			var iframe = $('iframe');
			var ds3 = $('ds3');
			if (ds3.DSpos == 0) alert('Selezionare un pezzo');
			else iframe.src = ds3.DSresult[ds3.DSpos]['descrizione'];
		}
		";
	$event->setCodeJs($code);
}

?>