<?php
/**
* PHP Source File
* @name JApp
* @author Alyx-Software Innovation <info@alyx.it>
* @version 2.0.0
* @copyright	Alyx Association 2008-2010
* @license GNU Public License
*/

require_once("../require.inc.php");
$system = new ClsSystem(true);

$xml 	 = new ClsXML("index.xml");
$event = new ClsEvent($xml);

$event->managerRequest();

if (isset($_REQUEST["logout"])) logout();

function logout()
{
	unset($_SESSION["japp"]);
	unset($_SESSION["auth"]);
	unset($_SESSION["store"]['jappmenu']);
}

function data_after_login()
{
 	global $event;
	if(isset($_SESSION["auth"]))
	{
		$_SESSION["japp"]["auth"] = $_SESSION["auth"];
		$_SESSION["store"]['jappmenu']['dswhere'] = "FIND_IN_SET('".$_SESSION['auth']['info']['group']."', `group`) > 0";
		$event->setCodeJs("window.location = 'index2.php'");
	}
	else 
	{
		$event->setCodeJs("
 		ANIMATE.scroll('login');
		SYSTEMEVENT.showMessageGhost('Nome utente o password non valida!');
		");
		logout();
	}
}
?>
