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
$xml = new ClsXML("join_save.xml");

$DS_ALIAS_ITEM["giornate,partite"]["*"] =  "giornate.id,data_giornata,giornate.descrizione";
$DS_ALIAS_ITEM["giornate,partite"]["partite"] = "partite.descrizione";

$event = new ClsEvent($xml);
$event->managerRequest();
?>