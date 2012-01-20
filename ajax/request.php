<?php
/**
* PHP Source File
* @author       Alyx-Software Innovation <info@alyx.it>
* @version 2.0.0
* @copyright	Alyx Association 2008-2010
* @license GNU Public License
*/

require_once("../require.inc.php");
$system = new ClsSystem(true);
$xml = new ClsXML("request.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function html_load()
{
	global $event;
	$code = "
		function sendRequest()
		{
			var data = RADIO.getCheckedObj('request').value;
			var sync = RADIO.getCheckedObj('sync').value;
			var returnxml = RADIO.getCheckedObj('xml').value;
			var dsobjname = RADIO.getCheckedObj('datasource').value;
			var post = 'data='+data;
			if (dsobjname!='' && dsobjname!='allds')
			{
 				post += '&dsobjname='+dsobjname;
			}
			$('text').value = '';
			sync = (sync=='true') ? true : false;
			returnxml = (returnxml=='true') ? true : false;
			$('ajax').innerHTML = 'AJAX.request(\'POST\', \'request.php\', '+post+', '+sync+', '+returnxml+');';
			AJAX.request('POST', 'request.php', post, sync, returnxml);
		}
		function response(conn)
		{
			$('text').value = conn.responseText.replace(/&lt;\/?[^&gt;]+&gt;/gi, '');
		}
		SYSTEMEVENT.addBeforeCustomFunction('AJAX', 'setDsXML', 'response');

		function clickObj(e)
		{
			var oTarget = (e.target) ? e.target : e.srcElement;
			$('div').style.display = (oTarget.id=='type2') ? 'block' : 'none';
		}
		SYSTEMEVENT.addEventListener($('type1'), 'click', clickObj);
		SYSTEMEVENT.addEventListener($('type2'), 'click', clickObj);
		SYSTEMEVENT.addEventListener($('type3'), 'click', clickObj);
	";
	$event->setCodeJs($code);
}

function data_loadall()
{
	global $event;
	$data = $_POST['data'];
	$dsobjname = (isset($_POST['dsobjname'])) ? $_POST['dsobjname'] : "";
	$code  = "\n$('txtdata').innerHTML = '<b>$data<\/b>';";
	$code .= "\n$('txtdsobjname').innerHTML = '<b>$dsobjname<\/b>';";
	$event->setCodeJs($code);
}

function data_load()
{
	global $event;
	$data = $_POST['data'];
	$dsobjname = (isset($_POST['dsobjname'])) ? $_POST['dsobjname'] : "";
	$code  = "\n$('txtdata').innerHTML = '<b>$data<\/b>';";
	$code .= "\n$('txtdsobjname').innerHTML = '<b>$dsobjname<\/b>';";
	$event->setCodeJs($code);
}

function custom()
{
	global $event;
	$data = $_POST['data'];
	$dsobjname = (isset($_POST['dsobjname'])) ? $_POST['dsobjname'] : "";
	$code  = "\n$('txtdata').innerHTML = '<b>$data<\/b>';";
	$code .= "\n$('txtdsobjname').innerHTML = '<b>$dsobjname<\/b>';";
	$event->setCodeJs($code);
}
?>