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
$xml = new ClsXML("tabs.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function html_load()
{
    global $xml;
    $tabs1 = $xml->getObjById("tabs1");
	 for ($i=1; $i<4; $i++)
	 {
		  $xmltab = new ClsXML("tab$i.xml");
		  $xmltab->getElementsAllTag();
		  $tabs1->child["tab$i"] =  $xmltab->getObjById("tab$i");
	}
}
?>
