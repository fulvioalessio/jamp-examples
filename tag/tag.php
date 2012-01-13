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
$xml = new ClsXML("tag.xml");
$event = new ClsEvent($xml);

if(!isset($_POST["data"]))
{
	$_POST['$$TITOLO$$'] = "Test";
	$_POST['$$IP$$'] = $_SERVER["REMOTE_ADDR"];
}

$event->managerRequest();
?>