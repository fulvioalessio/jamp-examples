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

$xml 	 = new ClsXML("index2.xml");
$event = new ClsEvent($xml);

$_POST['$$LOGO$$']= $_SESSION["japp"]["auth"]["info"]["logo"];
$_POST['$$CLIENT$$'] = $_SESSION["japp"]["auth"]["info"]["name"];
if (empty($_POST['$$CLIENT$$']))
{
	$_POST['$$LOGO$$'] = "./img/setting.png";
	$_POST['$$CLIENT$$'] = "Amministrazione del Sistema";
}

$event->managerRequest();

?>
