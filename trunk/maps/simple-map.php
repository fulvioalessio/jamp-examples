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
$xml = new ClsXML("simple-map.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function html_load()
{
	global $event;
	$code="           
		JMAP.after_drawmap =
		function()
		{	  
			 google.maps.event.addListener(JMAP.Map, 'click', function(event) {
				  var pos = event.latLng;
				  $('lat').value = pos.lat();
				  $('lng').value = pos.lng();
			});		
		}
	";
	$event->setCodeJs($code);
}
?>
