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
$xml = new ClsXML("index_mysql.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

if(!isset($_REQUEST["data"])) unset($_SESSION["auth"]);

function data_after_login()
{
 	global $event;
	if(isset($_SESSION["auth"])) $event->setCodeJs("window.location = 'index2_mysql.php'");
	else $event->setCodeJs("alert('Nome Utente o Password non valida!')");
}
?>