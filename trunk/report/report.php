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
$xml   = new ClsXML("report.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function html_before_load()
{
	 $_POST['$$PAGE_HEADER$$'] 	= "PAGE HEADER"; 
	 $_POST['$$REPORT_HEADER$$'] 	= "REPORT HEADER"; 
	 $_POST['$$REPORT_FOOTER$$'] 	= "REPORT FOOTER"; 
	 $_POST['$$PAGE_FOOTER$$'] 	= "PAGE FOOTER"; 
}

function html_load()
{
	 global $xml;

	 /* ADD NEW LABEL TO HEADER */
	 $header = $xml->getObjById("header");
	 $label = $header->addChild("sub_header", "label");  
	 $label->setProperty("label", "PAGE SUBTITLE"); 
	 $label->setProperty("style", "top: 20px;font-family: Arial; font-size: 12; font-weight: bold; width: 0;");
	 $label->setProperty("align", "center");

	 /* ADD NEW LABEL TO FOOTER */
	 $footer = $xml->getObjById("footer");
	 $label = $footer->addChild("sub_footer", "label");  
	 $label->setProperty("label", "PAGE SUBFOOTER"); 
	 $label->setProperty("style", "top:-20px;font-family: Arial; font-size: 12; font-weight: bold; width: 0;");
	 $label->setProperty("align", "center");
}

function pdf_after_addpage($pdf)
{
  $pdf->setXY(10,179);
  $pdf->Cell(0,10,'Pagina '. $pdf->PageNo().'/{nb}',0,0,'C');
  $pdf->setXY(10,30);
}
?>