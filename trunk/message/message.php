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
$xml = new ClsXML("message.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function html_load()
{
	global $event;
	$code = "
		function Message1()
		{
			SYSTEMEVENT.show(\"<h1>messaggio html</h1><h2>si possono usare i tag html</h2>Testo messaggio<br><input type='button' onclick='SYSTEMEVENT.Close();' value='chiudi'/>\");
		}

		function Message2(){ SYSTEMEVENT.showMessageGhost('Messaggio Ghost');}
		function Message3(){ SYSTEMEVENT.showMessageGhost('Messaggio Ghost','Descrizione del messaggio di errore libera. E\' multiriga!');}
		function Message4(){ SYSTEMEVENT.showMessageGhost('','', '<p style=\"width:350px;margin-left:50px\"><font size=\"20px\">Testo 20px</font></p>');}
		function Message5(){ SYSTEMEVENT.errorJAVASCRIPT('Messaggio errore JS','paginajs.js','2');}
		function Message6(){ SYSTEMEVENT.errorXML('Messaggio errore XML');}
		function Message7(){ SYSTEMEVENT.errorHTML('Messaggio errore HTML');}
	";
	$event->setCodeJs($code);
}

?>
