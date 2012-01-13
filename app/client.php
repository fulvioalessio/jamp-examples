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

$xml 	 = new ClsXML("client.xml");
$event = new ClsEvent($xml);

$event->managerRequest();

?>