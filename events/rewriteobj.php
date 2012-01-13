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
$xml = new ClsXML("rewriteobj.xml");
$event = new ClsEvent($xml);
$event->managerRequest();


function html_rewrite($dsselect)
{
 	$dsselect->setProperty("optiontext", array("new1", "new2", "new3"));
 	$dsselect->setProperty("optionvalue", array("newval1", "newval2", "newval3"));
}
?>