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
$xml = new ClsXML("database.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function html_load()
{
	global $event;
	$code = '
		function execute()
		{
			var dsGrid = $("dsGrid");
			delete(dsGrid.DSresult);
			var sql = encodeURIComponent(textSQL_cp.getCode());
			if (sql == "") return;
			AJAX.rewriteObj("gridds2", "database.php?sql=" + sql);
			AJAX.request("POST", "database.php", "data=load&dsobjname=dsGrid&sql=" + sql, true, true);
		}
	';
	$event->setCodeJS($code);
}

function data_select_before($ds) 
{
	global $xml;
	$i = 1;
	$result = array();
	switch ($ds->getPropertyName("id")) 
	{
		case "dsGrid":
			if (isset($_POST["sql"])) $_SESSION["sql"] = $_POST["sql"];
			if (isset($_SESSION["sql"]))
			{
				$query = $ds->ds->dsQueryParsing($_SESSION["sql"]);
				foreach ($query as $qry)
				{
					if(preg_match("/^SELECT /i", $qry)) $queryselect = $qry;
					else $ds->ds->dsQuery($qry);
				}
				if (isset($queryselect))
				{
					if (isset($_REQUEST["dsorder"]))
					{
						$pos = stripos($qry, " ORDER BY ");
						if ($pos !== false) $qry = substr($qry, 0, $pos);
						$order = explode(" ", $_REQUEST["dsorder"]);
						if (count($order)==1) $qry .= " ORDER BY `".$order[0]."`";
						else $qry .= " ORDER BY `".$order[0]."` ".$order[1]; 
                    }
					$ds->ds->dsQuerySelect($qry);
					$out = $ds->ds->dsShowColumnsResult();
					$i = 1;
					while($row = $ds->ds->dsGetRow())
					{
						$k=0;
						foreach($row as $key => $val)
						{
							if ($out[$k++]->blob) $val = "BLOB ".number_format(count($val)/1024,2)." KB";
							$result[$i][$key] = $val;
						}
						$i++;
					}
					$ds->ds->setQryCount($qry);
				}
				else return false;
			}
		break;
	}
	if (count($result)>0) 
	{
		$ds->setProperty("xml", $xml->dataJSON($result));
 		return false;
	}
}

function html_rewrite($gridds)
{
	global $xml, $event;
	$ds = $xml->getObjById("dsGrid");
	$ds->ds->dsConnect();
	$grid["grid_table"] = array("objtype","dsitem", "maxlenght", "minlenght", "format");
	$query = $ds->ds->dsQueryParsing($_GET["sql"]);
	foreach ($query as $qry) if (preg_match("/^SELECT /i", $qry)) $queryselect = $qry;
	if(isset($queryselect))
	{
		$rows = $ds->ds->dsShowColumnsResult($queryselect);
		foreach($rows as $row) 
		{
			if ($row->blob)
			{
				$grid["grid_table"]["format"][] = null;
				$grid["grid_table"]["objtype"][] = "label";
			}
			else
			switch($row->type)
			{
				case "DATE";
					$grid["grid_table"]["format"][] = "date|EN|yyyy-mmm-dd|IT|dd/mmm/yyyy";
					$grid["grid_table"]["objtype"][] = "text";
				break;
				default:
					$grid["grid_table"]["format"][] = null;
					$grid["grid_table"]["objtype"][] = "text";
			}
			$grid["grid_table"]["dsitem"][] = $row->name;
			$grid["grid_table"]["maxlenght"][] = $row->max_length;
			$grid["grid_table"]["minlenght"][] = ($row->not_null == true) ? "1" : null;
			if($row->primary_key == true) $grid["key"] = $row->name;
		}
		$gridds->setProperty("objtype", $grid["grid_table"]["objtype"]);
		$gridds->setProperty("dsitem", $grid["grid_table"]["dsitem"]);
		$gridds->setProperty("itemlabel", $grid["grid_table"]["dsitem"]);
		$gridds->setProperty("maxlenght", $grid["grid_table"]["maxlenght"]);
		$gridds->setProperty("minlenght", $grid["grid_table"]["minlenght"]);
		$gridds->setProperty("format", $grid["grid_table"]["format"]);
		if (isset($grid["key"])) $event->setCodeJS("$('dsGrid').p.DSkey = '".$grid["key"]."';");
	}
}
