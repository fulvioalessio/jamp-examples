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
$xml   = new ClsXML("dynamic_gantt.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function start_graph($xml_graphics)
{
	global $xml;
	$graphic = $xml_graphics->getObjById("graphic1");

	$ds = $xml->getObjById("ds1");
	$ds->ds->dsConnect();
	$ds->ds->dsQuery("SELECT * FROM `gantt`");
	$objtype = array(0=>"plot",1=>"title",2=>"scale");
	$i=3;
	while ($row = $ds->ds->dsGetRow())
	{
	    $objtype[$i] = "gantt";
	    $type[$i] 	 = $row->type;
	    $label[$i] 	 = $row->label;
	    $begin[$i] 	 = $row->begin;
	    $end[$i] 	 = $row->end;
	    $i++;
	}
	$graphic->setProperty("objtype", $objtype);
	$graphic->setProperty("type", $type);	
	$graphic->setProperty("label", $label);
 	$graphic->setProperty("start", $begin);
 	$graphic->setProperty("end", $end);
}
?>