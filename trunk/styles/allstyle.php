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
$xml   = new ClsXML("allstyle.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function html_rewrite($obj)
{
	switch (get_class($obj))
	{
		case "ClsObj_checkbox":
			  	$obj->setProperty("template", "macstyle1");
			break;
		case "ClsObj_radio":
			  	$obj->setProperty("template", "macstyle1");
			break;
		case "ClsObj_dscombo":
			  	$obj->setProperty("template", "black");
			break;
		case "ClsObj_dsnav":
			  	$obj->setProperty("template", "black");
			break;
		case "ClsObj_dock":
				$obj->setProperty("template", "black");
			break;
		case "ClsObj_gridds":
			  	$obj->setProperty("template", "black");
			break;
		case "ClsObj_jmenu":
			  	$obj->setProperty("template", "black");
			break;
	}
}
?>