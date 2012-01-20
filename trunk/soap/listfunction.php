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
$xml = new ClsXML("listfunction.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function html_load()
{
	$client = new SoapClient("http://www.nws.noaa.gov/forecasts/xml/DWMLgen/wsdl/ndfdXML.wsdl");
	$function = $client->__getFunctions();
	$function = implode("<br>", $function);

	global $xml;
	$div1 = $xml->getObjById("div1");
	$div1->setProperty("value", "<h1>Funzioni METEO NOAA</h1>$function" , true); 
}
?>
