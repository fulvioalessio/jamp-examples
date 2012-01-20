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
$xml 	 = new ClsXML("csv.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function data_import_before($dsFrom)
{
	 global $xml, $event;
	 $i=0;
	 while($row = $dsFrom->ds->dsGetRow()) // MOD RECORD
	 {
		  $dsFrom->ds->property["result"][$i++]['nome'] = "Sig. ".$row["nome"];
	 }
	 // ADD RECORD
	 $dsFrom->ds->property["result"][$i]['id'] = 13;
	 $dsFrom->ds->property["result"][$i]['nome'] = "Sig. Luca";
	 $dsFrom->ds->property["result"][$i]['cognome'] = "Verdi";
	 $dsFrom->ds->property["result"][$i]['data_nascita'] = "26/05/1977";
}
?>
