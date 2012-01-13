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
$xml = new ClsXML("ds_load.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function html_load()
{
	global $event;
	$code = "
		function sendRequest()
		{
			AJAX.request('POST', 'ds_load.php', 'data=load&dsobjname=ds1', false, true);
		}
	";
	$event->setCodeJs($code);
}
?>