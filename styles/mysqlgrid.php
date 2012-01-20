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
$xml = new ClsXML("mysqlgrid.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function html_load()
{
	global $event;
	$code = "
 		function changeRow(obj, row)
 		{
			var color = 'red';
 			var newRow = obj.bodyObj.rows[row];
			var length = newRow.childNodes.length;
			for (var i = 0; i < length; i++)
			{
				if (newRow.childNodes[i].nodeType == 1) 
				{ 
					newRow.childNodes[i].style.backgroundColor = color;
					var length1 = newRow.childNodes[i].childNodes.length;
					for (var ii = 0; ii < length1; ii++) //OBJ
					{
						if (newRow.childNodes[i].childNodes[ii].nodeType == 1) newRow.childNodes[i].childNodes[ii].style.backgroundColor = color;
					}	
				}	
			}
 		}
 		SYSTEMEVENT.addAfterCustomFunction('GRIDDS','addROW', 'changeRow'); 
	";
	$event->setCodeJs($code);
}
?>