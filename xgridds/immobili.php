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
$xml = new ClsXML("immobili.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function html_load()
{
	global $event;
	$code = "
		function Dialog(idlbox, keyCode, page, width, height)
		{
			 var lightbox = $(idlbox)
			 var AOBJ = document.createElement('a');
			 AOBJ.setAttribute('href', page);
			 AOBJ.setAttribute('rel', 'lightframe');
			 AOBJ.setAttribute('rev', 'width: ' + width + 'px; height: ' + height + 'px;');
			 LIGHTBOX.start(lightbox, AOBJ, false, true);
		}
	";
	$event->setCodeJS($code);
}

?>