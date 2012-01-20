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
$xml = new ClsXML("comuni.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function html_load()
{
    global $event;
    $code = "
      function SelectRow(ds)
      {
	  var value =  ds.DSresult[ds.DSpos]['DENOMINAZIONE_COMUNE'];
	  var obj = window.parent.$('textcitta');
	  window.parent.TEXT.setDsValue(obj, value)
	  obj.focus();
	  window.parent.LIGHTBOX.end();
      }";
    $event->setCodeJs($code);
}
?>
