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
$xml = new ClsXML("xml_error.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function html_load()
{
	global $event;
	$code = "
	function xml_error(message)
	{
	  alert(message);
	  return false;
	}
	SYSTEMEVENT.addBeforeCustomFunction('SYSTEMEVENT','errorXML', 'xml_error');";
 	$event->setCodeJs($code);
}
?>