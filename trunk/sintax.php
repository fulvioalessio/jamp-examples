<?php
function tab($num)
{
	for ($i=0; $i<$num; $i++) print "&nbsp;";
}

function xml_highlight_string($s, $notraslare=true)
{
	$s = htmlspecialchars($s);
	$s = preg_replace("#&lt;([/]*?)(.*)([\s]*?)&gt;#sU", 
		"<font color=\"#000000\">&lt;\\1\\2\\3&gt;</font>",$s);
	$s = preg_replace("#&lt;([\?])(.*)([\?])&gt;#sU",
		"<font color=\"#000000\">&lt;\\1\\2\\3&gt;</font>",$s);
	$s = preg_replace("#&lt;([^\s\?/=])(.*)([\[\s/]|&gt;)#iU",
		"&lt;<font color=\"#000000\">\\1\\2</font>\\3",$s);
	$s = preg_replace("#&lt;([/])([^\s]*?)([\s\]]*?)&gt;#iU",
		"&lt;\\1<font color=\"#000000\">\\2</font>\\3&gt;",$s);
	$s = preg_replace("#([^\s]*?)\=(&quot;|')(.*)(&quot;|')#isU",
		"<font color=\"#FF0000\">\\1</font>=<font color=\"#0000FF\">\\2\\3\\4</font>",$s);
	$s = preg_replace("#&lt;(.*)(\[)(.*)(\])&gt;#isU",
		"&lt;\\1<font color=\"#000000\">\\2\\3\\4</font>&gt;",$s);
	$s = nl2br(str_replace("\t","&nbsp;&nbsp;&nbsp;&nbsp;", $s));
	if ($notraslare) $s = '<span class="notranslate">'.$s.'</span>';
	return 	$s;
}

function xml_highlight($path)
{
	$file = file($path);
	$result = '';	
	foreach ($file as $s) $result .= xml_highlight_string($s, false);
	return $result;
}

function php_highlight($path)
{
	return highlight_file($path, true);
}

function php_highlight_string($s)
{
	return highlight_string('<?php'.$s.'?>', true);
}
?>
