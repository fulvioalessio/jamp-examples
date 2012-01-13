<?php
/**
* PHP Source File
* @name JApp
* @author Alyx-Software Innovation <info@alyx.it>
* @version 2.0.0
* @copyright	Alyx Association 2008-2010
* @license GNU Public License
*/

require_once("acl.php");

$xml 	 = new ClsXML("accountadmin.xml");
$event = new ClsEvent($xml);

$event->managerRequest();

function data_deleteall(){ return false;}

function html_load()
{
	global $event;
	$code = "
		function ResetPWD(row)
		{
			var ds1 = $('ds1');
			if (ds1.DSpos>0) 
			{
				var post = 'data=update&dsobjname=ds1&action=resetpwd';
				post += '&username=' + encodeURIComponent(ds1.DSresult[row]['key']);
				AJAX.request('POST', 'accountadmin.php', post, false, true);
			}
		}
	";
	$event->setCodeJs($code);
}

function data_new()
{
	$_POST['password'] = md5($_POST['username']);
	$_POST['group'] = 2;
}

function data_update($ds)
{
	global $xml;
	if(isset($_POST["action"]) && ($_POST["action"]== "resetpwd"))
	{
 		$ds->ds->dsConnect();
 		$query  = "UPDATE `es2_account` SET `password`=MD5(`username`) WHERE `key`='". $_POST["username"]."'";
 		$ds->ds->dsQueryUpdate($query);
		return false;
	}
}
?>