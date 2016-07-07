<?php
header("Content-Type:application/vnd.adobe.pdf");
require_once("cls.php");
require_once("hrclass.php");
require_once('tcpdf.php');
require_once('tcpdf_barcodes_1d.php');
require_once('FPDI/fpdi.php');
$con = new connect_base;
$con->connect();
$hr = new hrclass;



class PDF extends FPDI {

    /**
     * "Remembers" the template id of the imported page
     */
    var $_tplIdx;

    /**
     * include a background template for every page
     */
    function Header() {

    }

    function Footer() {
        
    }

}

// initiate PDF
//Add a custom size  

$pagelayout = array(86, 55);
$pdf = new PDF($orientation = 'L', $unit = 'mm', $pagelayout, $unicode = true, $encoding = 'UTF-8', $diskcache = false, $pdfa = false);
$pdf->SetMargins(0, 0, 0,0);
$pdf->SetAutoPageBreak(true, 0);
$pdf->setFontSubsetting(false);

$class = $_GET['class'];
$room = $_GET['room'];
$sql="select * from student where class='$class' and room='$room'";
$rs = $hr->run_sql_select($sql);
foreach ($rs as $rs1) {
$pdf->AddPage();
$title = $rs1[title_id];
$sql="select title_name1 from sys_title where title_id=$title";
$tname = $hr->run_sql_select($sql);
$fullname = $tname[0][0].$rs1[student_fname].' '.$rs1[student_lname];

$pdf->SetFont('thsarabun', 'B', 18);
$style = array(
    'position' => '',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => '',
    'border' => true,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 8,
    'stretchtext' => 4
);
$pdf->SetXY(0, 5);

$img_file = 'background1.jpg';


$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
$pdf->Image($img_file, 0, 0, 86, 55, '', '', '', false, 300, '', false, false, 0);
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();
$html = '<br><table width="100%"><tr style="background-color:orange;color:white;"><td align="center">โรงเรียนเทศบาล 6</td></tr></table>';
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Image('../'.$rs1[img], 56, 15, 25, 30, '', '', '', false, 300, '', false, false, 0);
$pdf->SetFont('thsarabun', 'B', 16);
$pdf->SetXY(5, 35);
$pdf->Write(0, $fullname);
$pdf->SetXY(5, 42);
$pdf->Write(0, 'รหัส '.$rs1[student_id]);

$pdf->SetXY(5, 15);
$pdf->write1DBarcode($rs1[student_id], 'EAN13', '', '', '', 18, 0.4, $style, 'N');
}

$pdf->Output('card.pdf', 'I');
?>