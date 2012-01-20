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
$xml = new ClsXML("dynamic_content.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function html_load()
{
  global $xml;
  $xgridds = $xml->getObjById("xgridds1");

  $xgrid = array("objtype","dsitem", "format");
  $xgrid["format"][] = "date|EN|yyyy-mm-dd|IT|dd/mm/yyyy";
  $xgrid["objtype"][] = "text";
  $xgrid["dsitem"][] = "data_giornata";

  $xgrid["format"][] = null;
  $xgrid["objtype"][] = "text";
  $xgrid["dsitem"][] = "descrizione";

  $xgridds->setProperty("objtype", $xgrid["objtype"]);
  $xgridds->setProperty("dsitem", $xgrid["dsitem"]);
  $xgridds->setProperty("itemlabel", $xgrid["dsitem"]);
  $xgridds->setProperty("format", $xgrid["format"]);

  $xgridds->BuildObj();
}
?>