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
$xml = new ClsXML("advancedgridds.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function html_load()
{
	global $event;
	$code = '
		function setFilter(dscombo)
		{
			var ds3 = $(\'ds3\');
			dscombo.p.dsSearch = "`articolo` LIKE \'$$VALUE$$%\' and `idfornitore` = \'" + ds3.DSresult[dscombo.row]["idfornitore"] + "\'";
		}

		SYSTEMEVENT.addBeforeCustomFunction("DSCOMBO","searchDsValue", "setFilter"); 
	';
	$event->setCodeJs($code);
}
?>