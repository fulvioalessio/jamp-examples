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
$xml = new ClsXML("text.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function html_load()
{
	global $event;
	$code = "
	function upload_posted(send)
	{
		if(send) alert('File Inviato: ' + TEXT.objposted.value);
	}
	SYSTEMEVENT.addAfterCustomFunction('TEXT', 'AfterPost', 'upload_posted');
	";
	$event->setCodeJs($code);
}

?>