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
$xml = new ClsXML("label.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function html_load() 
{
	global $event;   
	$code = "
		var prop1 = $('select1');
		var prop2 = $('select1_1');
		var alg = $('select2');
		var i1 = $('label1');
		var val1 = $('text1');
		var val2 = $('text1_1');
		var duration = $('text2');
		var fps = $('text3');

		prop1.options[prop1.options.length] = new Option('','');
		prop2.options[prop2.options.length] = new Option('','');
		for (s in i1.style)
		{
			prop1.options[prop1.options.length] = new Option(s,s);
			prop2.options[prop2.options.length] = new Option(s,s);
		}

		function getCSS1()
		{
			val1.value = ANIMATE.getProp($('obj1'), prop1.value);
		}

		function getCSS2()
		{
			val2.value = ANIMATE.getProp($('obj1'), prop2.value);
		}

		function startanimate()
		{
			if (prop1.value == '')
			{
				alert('Seleziona una proprietà!');
				return;
			}
			var txtcss = prop1.value+':'+val1.value;
			if (prop2.value != '') txtcss += ';'+prop2.value+':'+val2.value;
			ANIMATE.setfps(fps.value);
			ANIMATE.animate('obj1', txtcss, duration.value, '', alg.value);
			$('label1').innerHTML =  'ANIMATE.animate(\"obj1\", \"'+txtcss+'\", \"'+duration.value+'\", \"\", \"'+alg.value+'\");';
		}
	";
	$event->setCodeJs($code);
} 
?>
