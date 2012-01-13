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
$xml = new ClsXML("browser.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function html_load() 
{
	global $event;
	$event->setCodeJS("
	$('label1').innerHTML = SYSTEMBROWSER.isIE();
	$('label2').innerHTML = SYSTEMBROWSER.isOpera();
	$('label3').innerHTML = SYSTEMBROWSER.isSafari();
	$('label4').innerHTML = SYSTEMBROWSER.isFirefox();
	$('label5').innerHTML = SYSTEMBROWSER.isChrome();
	$('label6').innerHTML = SYSTEMBROWSER.isKHTML()
	$('label7').innerHTML = SYSTEMBROWSER.isGecko()
	$('label8').innerHTML = SYSTEMBROWSER.getVersion();
	");
}
?>