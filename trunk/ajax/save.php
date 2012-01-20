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
$xml = new ClsXML("save.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function html_load()
{
	global $event;
	$code = "
		function sendRequest(action)
		{
			var post = 'data='+action;
			var ds1 = $('ds1');
 			post += '&dsobjname=ds1';
			post += '&keyname=' + encodeURIComponent(ds1.p.DSkey);
			if (action!='new') 
			{
				post += '&keynamevalue=' + encodeURIComponent(ds1.DSresult[ds1.DSpos][ds1.p.DSkey]);
				post += '&field1=' + encodeURIComponent(ds1.DSresult[ds1.DSpos]['field1']);
				post += '&field2=' + encodeURIComponent(ds1.DSresult[ds1.DSpos]['field2']);
			}
			else
			{
				post += '&keynamevalue=-1';
				post += '&field1=field1';
				post += '&field2=field2';
			}
			AJAX.request('POST', 'save.php', post, true, true);
		}
	";
	$event->setCodeJs($code);
}

function print_request()
{
	global $event; 
	$event->setCodeJs("$('label1').innerHTML='".$_REQUEST['data']."';"); 
	$event->setCodeJs("$('label2').innerHTML='".$_REQUEST['dsobjname']."';");
	$event->setCodeJs("$('label3').innerHTML='".$_REQUEST['keyname']."';");  
	$event->setCodeJs("$('label4').innerHTML='".$_REQUEST['keynamevalue']."';");  
	$event->setCodeJs("$('label5').innerHTML='".$_REQUEST['field1']."';"); 
	$event->setCodeJs("$('label6').innerHTML='".$_REQUEST['field2']."';"); 
}

function data_new($ds) 
{
	print_request();
}

function data_update($ds)
{
	print_request();
}

function data_delete($ds)
{
	print_request();
}
?>