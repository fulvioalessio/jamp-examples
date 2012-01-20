<?php
/**
* File sorgente PHP
* @author	Alyx Association <info@alyx.it>
* @version 2.0.0
* @copyright	Alyx Association 2008-2010
* @license GNU Public License
*/

require_once("../require.inc.php");
$system = new ClsSystem(true);
$xml = new ClsXML("result.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function data_select_after($ds) 
{
	global $xml;
	$i=0;
	$result = array();
	while($ds->ds->dsGetRow())
	{
		$result[$i]['DENOMINAZIONE_COMUNE'] = "+++".$ds->ds->property["row"]->DENOMINAZIONE_COMUNE."+++";
		$result[$i++]['CAB'] = "---".$ds->ds->property["row"]->CAB."---";
	}
	$out = $xml->dataJSON($result);
	$ds->setProperty("xml", $out);
}
?>
