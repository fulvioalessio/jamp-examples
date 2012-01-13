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
$xml = new ClsXML("meteonoaa.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function html_load()
{
	global $xml, $event;
	$client = new SoapClient("http://www.nws.noaa.gov/forecasts/xml/DWMLgen/wsdl/ndfdXML.wsdl");
	$soapXML = new ClsXML($client->LatLonListCityNames(1), "string");
	$node = $soapXML->xmlpage->xpath("cityNameList");
	$city = explode("|",$node[0]);
	$node = $soapXML->xmlpage->xpath("latLonList");
	$latlon = explode(" ",$node[0]);
	$select1 = $xml->getObjById("city");
	$select1->setProperty("optiontext", $city); 
	$select1->setProperty("optionvalue", $latlon); 
	$event->setCodeJS("$('city').selectedIndex = -1;");
}

function F2C($f)
{
	return intVal(($f-32) / 1.8);
}

function getMeteo()
{
	global $event;
	$client = new SoapClient("http://www.nws.noaa.gov/forecasts/xml/DWMLgen/wsdl/ndfdXML.wsdl");
	$latlon = explode(",", $_REQUEST["latlon"]);
	$soapXML = new ClsXML($client->NDFDgenByDay($latlon[0], $latlon[1], date("Y-m-d"), "1","24 hourly"), "string");
	$node = $soapXML->xmlpage->xpath("data/parameters/temperature");
	$xmlsrc = addslashes($soapXML->xmlpage->asXML());
	$xmlsrc = str_replace("\n", "<br>", htmlspecialchars($xmlsrc));
	$code = "
	$('day').innerHTML='".date("d-m-Y")." ';
	$('max').innerHTML='MAX ".F2C($node[0]->value)."°C ';
	$('min').innerHTML='MIN ".F2C($node[1]->value)."°C ';
	$('div1').innerHTML = '<b>CODICE XML:</b><br>".$xmlsrc."';
	";
	$event->setCodeJS($code);
}
?>
