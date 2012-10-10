<?php
/**
* PHP Source File
* @author	Alyx Association <info@alyx.it>
* @version 2.0.0
* @copyright	Alyx Association 2008-2010
* @license GNU Public License
*/

require_once(dirname(__FILE__).'/../../jamp/plugin/FirePHPCore/FirePHP.class.php');
ob_start();
$firephp = FirePHP::getInstance(true);


require_once("../require.inc.php");
$system = new ClsSystem(true);

$firephp->log($system);


$xml = new ClsXML("debug_php.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

?>