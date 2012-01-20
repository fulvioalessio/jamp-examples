<?php
/**
* PHP Source File
* @name JAmp
* @author Alyx-Software Innovation <info@alyx.it>
* @version 2.0.0
* @copyright	Alyx Association 2008-2010
* @license GNU Public License
*/

require_once("../require.inc.php");
$system = new ClsSystem(true);
if(!isset($_SESSION["japp"]["auth"])) Block("UTENTE NON LOGGATO!");

if(!isset($_REQUEST["data"])){
	$ds = $system->newObj("ds", "ds");
	$ds->setProperty("conn", "conn6");
	$ds->ds->dsConnect();
	$qry = "SELECT * FROM `es2_menu` WHERE ".$_SESSION["store"]['jappmenu']['dswhere']." and `url` = '".basename($_SERVER['REQUEST_URI'])."';";
	$ds->ds->dsQuerySelect($qry);
	$row = $ds->ds->dsGetRow();
	if (!$row) Block("UTENTE NON ABILITATO!");
	$_POST['$$TITOLO$$'] = $row->text;
	if ($_SESSION['japp']['auth']['info']['group'] == 1) $_POST['$$GROUP$$'] = "Amministratore di Sistema";
	if ($_SESSION['japp']['auth']['info']['group'] == 2) $_POST['$$GROUP$$'] = "Amministratore";
	if ($_SESSION['japp']['auth']['info']['group'] == 3) $_POST['$$GROUP$$'] = "Utente";
}

function Block($titolo)
{
	$xml 	 = new ClsXML("block.xml");
	$event = new ClsEvent($xml);
	$xml->getElementsAllTag();
	$xml->pageObj->printOUT();
	die();
}
?>