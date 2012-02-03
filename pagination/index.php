<?php
/**
* PHP Source File
* @author	Alyx Association <info@alyx.it>
* @version	Factory
* @copyright	Alyx Association 2008-2010
* @license GNU Public License
*/

require_once("../require.inc.php");
$system = new ClsSystem(true);
$xml = new ClsXML("index.xml");
$event = new ClsEvent($xml);
$event->managerRequest();
?>