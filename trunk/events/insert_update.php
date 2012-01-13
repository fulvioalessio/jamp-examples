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
$xml = new ClsXML("insert_update.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function data_new($ds)
{
  if ($ds->getPropertyName("id")=="ds1") 
  {
		$ds->ds->dsConnect();
		$qry = "INSERT INTO `CAB-COMUNE` (`DENOMINAZIONE_COMUNE`, `CAB`) VALUES ('NUOVO COMUNE', '000000');";
      $ds->ds->dsQuery($qry);
		return false;
  }
}

function data_update($ds)
{
  if ($ds->getPropertyName("id")=="ds1") 
  {
		$ds->ds->dsConnect();
		$qry = "UPDATE `CAB-COMUNE` SET `DENOMINAZIONE_COMUNE` = 'AGGIORNA COMUNE', `CAB`= '111111' WHERE `ID`='".$_POST["ID"]."'";
      $ds->ds->dsQuery($qry);
		return false;
  }
}
?>
