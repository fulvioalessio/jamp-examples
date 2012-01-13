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
$xml   = new ClsXML("custom.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function before_plot($graph) 
{
	require_once($graph->path."jpgraph_canvas.php");
	require_once($graph->path."jpgraph_canvtools.php");
	$graph->graph = new CanvasGraph(400,200,'auto');
	$graph->graph->SetMargin(5,11,6,11);
	$graph->graph->SetShadow();
	$graph->graph->SetMarginColor("teal");
	$graph->graph->InitFrame();
	$scale = new CanvasScale($graph->graph);
	$scale->Set(0,20,0,20);
	$shape = new Shape($graph->graph,$scale);
	$shape->SetColor('black');
	$shape->SetColor('black');
	$shape->Line(0,0,20,20);
	$shape->Circle(5,14,2);
	$shape->SetColor('red');
	$shape->FilledCircle(11,8,3);
	$shape->SetColor('green');
	$shape->FilledRectangle(15,8,19,14);	
	$shape->SetColor('green');
	$shape->FilledRoundedRectangle(2,3,8,6);
	$shape->SetColor('darkgreen');
	$shape->RoundedRectangle(2,3,8,6);
} 
?>