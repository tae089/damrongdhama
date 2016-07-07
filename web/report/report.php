<?php
header("Content-Type:application/vnd.adobe.pdf");
require_once('tcpdf.php');
require_once('tcpdf_barcodes_1d.php');
require_once('FPDI/fpdi.php');
$m = new MongoClient();
$db = $m->selectDB('damrongdhama');
$collection = new MongoCollection($db, 'request');
$id = $_GET['id'];

$arrmonth = [
        '01' => 'มกราคม',
        '02' => 'กุมภาพันธ์',
        '03' => 'มีนาคม',
        '04' => 'เมษายน',
        '05' => 'พฤษภาคม',
        '06' => 'มิถุนายน',
        '07' => 'กรกฏาคม',
        '08' => 'สิงหาคม',
        '09' => 'กันยายน',
        '10' => 'ตุลาคม',
        '11' => 'พฤศจิกายน',
        '12' => 'ธันวาคม',
    ];

class PDF extends FPDI {

    /**
     * "Remembers" the template id of the imported page
     */
    var $_tplIdx;

    /**
     * include a background template for every page
     */
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('1567.pdf');
            $this->_tplIdx = $this->importPage(1);
        }
        $this->useTemplate($this->_tplIdx);
    }

    function Footer() {
        
    }

}

//$pagelayout = array(212, 145);
//$pagelayout = array(145, 212);
$pdf = new PDF($orientation = 'P', $unit = 'mm', $format='A4', $unicode = true, $encoding = 'UTF-8', $diskcache = false, $pdfa = false);
$pdf->SetMargins(5, 10, 10, 10);
$pdf->SetAutoPageBreak(true, 10);
$pdf->setFontSubsetting(false);
//==================================================================
$rs = $collection->findOne(array('_id'=>new MongoId($id)));

//================================================================
$pdf->AddPage();

$pdf->Image('images/logo.png',40,70,150,'','','','',false,300);

$pdf->SetFont('thsarabun', '', 15);

//$req_date = date('d-m-Y',strtotime($rs['req_date']));

$req_date = date('d-m-Y', $rs['req_date']->sec);
$req_date1 = split('-',$req_date);
$year = $req_date1[2]+543;
$newdate = $req_date1[0].'-'.$req_date1[1].'-'.$year;

$pdf->SetXY(140,19);
$pdf->Write(0,$newdate);

$name = split(' ',$rs['req_name']);
$pdf->SetXY(32,41);
$pdf->Write(0,$name[0]);

$pdf->SetXY(106,41);
$pdf->Write(0,$name[1]);

$pdf->SetXY(186,41);
$pdf->Write(0,$rs['req_name_age']);

$pdf->SetXY(35,48);
$pdf->Write(0,$rs['req_name_add']);

$pdf->SetXY(87,55.5);
$pdf->Write(0,$rs['req_name_tel']);

$pdf->SetXY(48,63);
$pdf->Write(0,$rs['req_name_office']);

$pdf->SetXY(105,70);
$pdf->Write(0,$rs['req_name_office_tel']);

$name1 = split(' ',$rs['req_name1']);

if($rs['req_name1_type']=='บุคคล')
    {
        $pdf->SetXY(27.5,89.5);
        $pdf->Write(0,"/");

        $pdf->SetXY(41,89.5);
        $pdf->Write(0,$name1[0]);

        $pdf->SetXY(112,89.5);
        $pdf->Write(0,$name1[1]);

        $pdf->SetXY(186,89.5);
        $pdf->Write(0,$rs['req_name1_age']);
    }

if($rs['req_name1_type']=='หน่วยงาน')
    {
        $pdf->SetXY(27.5,97);
        $pdf->Write(0,"/");

        $pdf->SetXY(80,97);
        $pdf->Write(0,$rs['req_name1']);
    }

if($rs['req_name1_type']=='กลุ่มบุคคล')
    {
        $pdf->SetXY(27.5,104);
        $pdf->Write(0,"/");

        $pdf->SetXY(45,104);
        $pdf->Write(0,$rs['req_name1']);
    }

$pdf->SetXY(35,111.3);
$pdf->Write(0,$rs['req_name1_add']);

$pdf->SetXY(87,118.8);
$pdf->Write(0,$rs['req_name1_tel']);

$pdf->SetXY(48,126);
$pdf->Write(0,$rs['req_name1_office']);

$pdf->SetXY(105,133.5);
$pdf->Write(0,$rs['req_name1_office_tel']);

$pdf->SetXY(30,148);
$pdf->MultiCell(170, 5, '             '.$rs['req_topic'], 0, '', 0, 1, '', '', true);

if($rs['req_premise']!='')
    {
        $pdf->SetXY(27.5,232);
        $pdf->Write(0,"/");

        $pdf->SetXY(27.5,239);
        $pdf->Write(0,"/");

        $pdf->SetXY(81,239);
        $pdf->Write(0,$rs['req_premise']);
    }

//=================================================================

$pdf->Output('report.pdf', 'I');
?>