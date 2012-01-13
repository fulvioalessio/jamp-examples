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
$xml = new ClsXML("index_ldap_db.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

if(!isset($_REQUEST["data"])) unset($_SESSION["auth"]);

function data_after_login()
{
        global $event, $xml;
        if(isset($_SESSION["auth"])) 
        {
              unset($_SESSION["auth"]);
              $dsmysql = $xml->getObjById("dsmysql");
              $dsmysql->ds->dsConnect();
              $dsmysql->ds->login($_POST, false);
        }
        if (isset($_SESSION["auth"]))  $event->setCodeJs("window.location = 'index2_ldap_db.php'");
        else $event->setCodeJs("alert('Nome Utente o Password non valida!')");
} 
?>