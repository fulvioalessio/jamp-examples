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
$xml = new ClsXML("form.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function html_load()
{
	global $xml;
	$xml->pageObj->addEvent("page", "ds1Refresh", "if ($('ds1').autoinsert != true){ DS.dsnew(\"ds1\"); $('ds1').autoinsert = true; }");
}

function data_after_new($ds)
{
global $event;
if ($ds->getPropertyName("id")=="ds1") $event->setCodeJs("alert('ok');DS.refreshObj('ds2');");
}
?>
