<?php	
/**
* @name 		Test File
* @author	Alyx Association <info@alyx.it>
* @version 2.0.0
* @package	Object
* @copyright	Alyx Association 2008-2010
* @license GNU Public License
* You can find documentation and source to the official website of JAMP
* http://jamp.alyx.it/
*/

require_once("../class/system.class.php");
require_once("sintax.php");

$system = new ClsSystem(true);
$xml   	= new ClsXML("./examples/index.xml");
$event 	= new ClsEvent($xml);
$event->managerRequest();

function Title($text, $img)
{
	return "\n\t<b><br><img src=\"./examples/$img\" alt=\"$img\" align=\"left\"><span style=\"font-weight:bold; font-size:2em; color:#127397;\">$text</span><br><br></b>";
}

function lang()
{
	if (LANGUAGE=='IT')
	{
		$LNG["title"] = "Esempi JAMP ver: ";
		$LNG["examples"] = "Esempi: ";
		$LNG["preview"] = "Anteprima";
	}
	else 
	{
		$LNG["title"] = "Examples JAMP ver: ";
		$LNG["examples"] = "Examples: ";
		$LNG["preview"] = "Preview";
	}
	return $LNG;
}

function php()
{
	global $event, $xml;
	$LNG = lang();
	$filesource = "./".$_POST["dir"].".php";
	$dir = dirname($filesource);
	$filename = substr(basename($filesource), 0, -4);
	$code = Title($LNG["examples"].str_replace("/", "->",$_POST["dir"]) , "examples.png");
	
	if ($_POST["preview"]=="true")
	{
		$code .= "<a href=\"".$_POST["dir"].".php\" target=\"preview\" style=\"text-decoration:none;font-size:15px;\"><img src=\"./examples/thumbnail.png\" alt=\"DIR\" border=\"0\" style=\"text-decoration:none;vertical-align:middle;\"> ".$LNG["preview"]."</a>";
	}
	$code .= " <a href=\"javascript:getPHP('".$_POST["dir"]."', '".$_POST["preview"]."');\" style=\"text-decoration:none;font-size:12px;\"><img src=\"./examples/php.png\" alt=\"PHP\" border=\"0\" style=\"text-decoration:none;vertical-align:middle;\"> PHP</a>";
	
	if (file_exists(realpath($_POST["dir"].".xml")))
	{
		$code .= " <a href=\"javascript:getXML('".$_POST["dir"]."','".$_POST["preview"]."');\" style=\"text-decoration:none;font-size:12px;\"><img src=\"./examples/xml.png\" alt=\"XML\" border=\"0\" style=\"text-decoration:none;vertical-align:middle;\"> XML</a><br><br>";
	}
	else $code .= "<br><br>";
	if (substr($filesource,0,5) != "./../") $code .= php_highlight($filesource);
	$event->returnRequest("", "\n$('div3').innerHTML = ".$xml->dataJSON($code).";");
}

function xml()
{
	global $event, $xml;
	$LNG = lang();
	$filesource = "./".$_POST["dir"].".xml";
	$dir = dirname($filesource);
	$filename = substr(basename($filesource), 0, -4);
	$code = Title($LNG["examples"].str_replace("/", "->",$_POST["dir"]) , "examples.png");
	if ($_POST["preview"]=="true")
	{
		$code .= "<a href=\"".$_POST["dir"].".php\" target=\"preview\" style=\"text-decoration:none;font-size:15px;\"><img src=\"./examples/thumbnail.png\" alt=\"DIR\" border=\"0\" style=\"text-decoration:none;vertical-align:middle;\"> ".$LNG["preview"]."</a>";
	}
	$code .= " <a href=\"javascript:getPHP('".$_POST["dir"]."', '".$_POST["preview"]."');\" style=\"text-decoration:none;font-size:12px;\"><img src=\"./examples/php.png\" alt=\"PHP\" border=\"0\" style=\"text-decoration:none;vertical-align:middle;\"> PHP</a>";
	$code .= " <a href=\"javascript:getXML('".$_POST["dir"]."', '".$_POST["preview"]."');\" style=\"text-decoration:none;font-size:12px;\"><img src=\"./examples/xml.png\" alt=\"XML\" border=\"0\" style=\"text-decoration:none;vertical-align:middle;\"> XML</a><br><br>";
	if (substr($filesource,0,5) != "./../") $code .= xml_highlight($filesource);
	$event->returnRequest("", "\n$('div3').innerHTML = ".$xml->dataJSON($code).";");
}

function show()
{
	global $event, $xml;
	$LNG = lang();
	$dirs = scandir("./".$_POST["dir"]);
	$code = "";
	unset($dirs[0]);
	unset($dirs[1]);
	$test1 = dirname("./index.php");
	$index = (file_exists("./".$_POST["dir"]."/index.php")) ? "false" : "true";
	foreach($dirs as $dir)
	{
		if ($test1 == dirname($dir))
		{
			$file = pathinfo($dir);
			if (isset($file['extension']) && ($file['extension'] == "php"))
			{
				$filename = substr($dir, 0, -4);
				$bool = ($filename=="index") ? "true" : $index;
				$code .= " <a href=\"javascript:getPHP('".$_POST["dir"]."/$filename', '$bool');\" style=\"text-decoration:none;font-size:12px;\"><img src=\"./examples/php.png\" alt=\"PHP\" border=\"0\" style=\"text-decoration:none;vertical-align:middle;\"> ".$filename."</a><br>";
			}
		}
	}
	$event->returnRequest("", "\n$('div2').innerHTML = ".$xml->dataJSON($code).";");
}

function html_load() 
{
	global $xml, $system, $event;
	$LNG = lang();

	$code = "";
	$dirs = scandir("./");
	unset($dirs[0]);
	unset($dirs[1]);
	foreach($dirs as $dir)
	{
		if ($dir != "examples" && $dir != "resource" && $dir != "index.php" && $dir != "sintax.php")	$code .= "<a href=\"javascript:getDIR('$dir');\" style=\"text-decoration:none;\"><img src=\"./examples/dir.png\" alt=\"DIR\" border=\"0\" style=\"text-decoration:none;\"> $dir</a><br>";
	}
	$title1 = $xml->getObjById("title1");
	$title1->setProperty("value", Title("Directory:", "dirs.png"));
	$title2 = $xml->getObjById("title2");
	$title2->setProperty("value", Title($LNG["examples"], "examples.png"));
	$div1 = $xml->getObjById("div1");
	$div1->setProperty("value", $code);

	$event->setCodeJS("
	function getDIR(dir)
	{
		AJAX.request('POST', 'index.php', 'data=show&dir=' + dir, false, false);
	}
	function getPHP(dir, preview)
	{
		AJAX.request('POST', 'index.php', 'data=php&dir=' + dir + '&preview='+preview, false, false);
	}
	function getXML(dir, preview)
	{
		AJAX.request('POST', 'index.php', 'data=xml&dir=' + dir + '&preview='+preview, false, false);
	}
	");
} 
?>
