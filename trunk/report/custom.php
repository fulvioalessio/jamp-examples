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
$xml   = new ClsXML("custom.xml");
$event = new ClsEvent($xml);
$event->managerRequest();

function pdf_after_code($pdf)
{
	global $system;
	global $xml;

	$pdf->SetFont('Arial','',8);
	$pdf->Ln();
	$pdf->SetFillColor(107,107,107);
	$pdf->SetTextColor(255);
	$pdf->SetDrawColor(0,0,0);
	$pdf->SetLineWidth(.3);
	$pdf->SetFont('','B');

	$pdf->Cell(70,6,"Nazioni",1,0,'C',1);
	$pdf->Cell(50,6,"Popolazione",1,0,'C',1);
	$pdf->Cell(50,6,"Superficie",1,0,'C',1);
	$pdf->Cell(50,6,"PIL PPP (mld $)",1,0,'C',1);
	$pdf->Cell(50,6,"PIL PPP pro capite",1,0,'C',1);

	$pdf->SetTextColor(0);
	$pdf->SetFont('');
	$images = array();
	$images[] = array("Austria", "Austria.jpg", "8.253.000", "83.858 kmq", "298,683", "$ 36.189");
 	$images[] = array("Belgio", "Belgio.jpg", "10.420.000", "30.510 kmq", "353,326", "$ 33 908");
 	$images[] = array("Bulgaria", "Bulgaria.jpg", "7.611.000", "110.910 kmq", "82,533", "$ 10.844");
   	$images[] = array("Cipro", "Cipro.jpg", "841.000", "9.250 kmq", "19,692", "$ 23 419");
 	$images[] = array("Danimarca", "Danimarca.jpg", "5.441.000", "43 094 kmq", "203,502", "$ 37.399");
 	$images[] = array("Estonia", "Estonia.jpg", "1.341.000", "45.226 kmq", "25,796", "$ 19.243");
 	$images[] = array("Filandia", "Filandia.jpg", "5.244.000", "337.030 kmq", "179,141", "$ 34.162");
 	$images[] = array("Francia", "Francia.jpg", "63.363.000", "547.030 kmq", "1.988,171", "$ 31.377");
 	$images[] = array("Germania", "Germania.jpg", "82.570.000", "357.021 kmq", "2.698,694", "$ 32 684");
 	$images[] = array("Grecia", "Grecia.jpg", "11.098.000", "131.940 kmq", "274,493", "$ 24.733");
 	$images[] = array("Irlanda", "Irlanda.jpg", "4.247.000", "70.280 kmq", "191,694", "$ 45.135");
 	$images[] = array("Italia", "Italia.jpg", "58.948.000", "301.320 kmq", "1.791,006",	"$ 30 383");
 	$images[] = array("Lettonia", "Lettonia.jpg", "2.286.000", "64.589 kmq","34,426", "$ 15.061");
 	$images[] = array("Lituania", "Lituania.jpg", "3.401.000", "65 200 kmq", "56,985", "$ 16.756");
 	$images[] = array("Lussemburgo", "Lussemburgo.jpg","463.000", "2.586 kmq", "35,194", "$ 76.025");
 	$images[] = array("Malta", "Malta.jpg","401.000", "316 kmq", "8,447", "$ 21.081");
 	$images[] = array("Paesi bassi", "Paesi bassi.jpg","16.617.000", "41.526 kmq", "549,674", "$ 33.079");
 	$images[] = array("Polonia", "Polonia.jpg", "38.122.000", "312 685 kmq", "556,933", "$ 14.609");
 	$images[] = array("Portogallo", "Portogallo.jpg", "10.540.000", "92 931 kmq", "217,892", "$ 20.673");
 	$images[] = array("Regno Unito", "Regno Unito.jpg", "60.836.000", "244 820 kmq", "2 004,461", "$ 32.949");
 	$images[] = array("Repubblica ceca", "Repubblica ceca.jpg", "10.245.000", "78 866 kmq", "210,418", "$ 20.539");
 	$images[] = array("Romania", "Romania.jpg", "21.564.000", "238 391 kmq", "218,926", "$ 10.152");
 	$images[] = array("Slovacchia", "Slovacchia.jpg", "5.411.000", "48.845 kmq", "101,220", "$ 18.705");
 	$images[] = array("Slovenia", "Slovenia.jpg", "2.006.000", "20.253 kmq", "49,062", "$ 24.459");
 	$images[] = array("Spagna", "Spagna.jpg", "41.771.000", "504.782 kmq", "1.203,404", "$ 28.810");
 	$images[] = array("Svezia", "Svezia.jpg", "9.116.000", "449.964 kmq", "296,715", "$ 32.548");
 	$images[] = array("Ungheria",  "Ungheria.jpg", "10.059.000", "93.030 kmq", "190,343", "$ 18.922");
	for ($i=0; $i<27; $i++)
	{
		$voti = array();
		$pdf->Ln();
		$img = "../resource/flag/".$images[$i][1];
		$pdf->Image($img, $pdf->GetX()+5, $pdf->GetY(), 0, 8);
		$pdf->Cell(20,6.2,"",1,0,'C');
		$pdf->Cell(50,6.2,$images[$i][0],1,0,'C');
		$pdf->Cell(50,6.2,$images[$i][2],1,0,'C');
		$pdf->Cell(50,6.2,$images[$i][3],1,0,'C');
		$pdf->Cell(50,6.2,$images[$i][4],1,0,'C');
		$pdf->Cell(50,6.2,$images[$i][5],1,0,'C');
	}

	$pdf->SetFont('Arial','B',8);
	$pdf->Ln();
	$pdf->SetFillColor(107,107,107);
	$pdf->SetTextColor(255);

	$pdf->Cell(70,6,"",1,0,'C',1);
	$pdf->Cell(50,6,"492.215.000 ",1,0,'C',1);
	$pdf->Cell(50,6,"4.326.253 kmq",1,0,'C',1);
	$pdf->Cell(50,6,"13.840,831",1,0,'C',1);
	$pdf->Cell(50,6,"$ 28.119",1,0,'C',1);
}
?>