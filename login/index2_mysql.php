<?php
/**
* PHP Source File
* @name JApp
* @author Alyx-Software Innovation <info@alyx.it>
* @version 2.0.0
* @copyright	Alyx Association 2008-2010
* @license GNU Public License
*/

require_once("./../../class/system.class.php");
$system = new ClsSystem(true);
$xml = new ClsXML("index2.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

if(!isset($_SESSION["auth"])) header("Location: index_mysql.php"); 
?>