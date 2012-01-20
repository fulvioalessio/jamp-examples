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
$xml = new ClsXML("modal.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function html_load()
{
	global $event;
	$code = "
		function Dialog(e, idlbox, keyCode, page, width, height)
		{
			 var keynum = (window.event) ? e.keyCode : e.which;
			 if (keynum == keyCode) LIGHTBOX.Dialog('comuni_lbox', page, width, height);
		}
	";
	$event->setCodeJS($code);
}
?>
