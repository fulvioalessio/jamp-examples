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
$xml = new ClsXML("example3.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function html_load()
{
	global $event;
	$event->setCodeJS("$('status').innerHTML=' Loading Data'");
}

function data_after()
{
	global $event;
	$event->setCodeJS("$('status').innerHTML=' Ready'");
}
?>