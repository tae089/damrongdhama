<?php
header("Content-Type:application/vnd.adobe.pdf");
$m = new MongoClient();
$db = $m->selectDB('damrongdhama');
$collection = new MongoCollection($db, 'request1');
$year = $_GET['year'];
$year1 = $year;$year2 = $year-1;$year3 = $year-2;
$year1t = $year1+543;$year2t = $year2+543;$year3t = $year3+543;

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

$pagelayout = array(212, 145);
//$pagelayout = array(145, 212);
$pdf = new PDF($orientation = 'L', $unit = 'mm', $pagelayout, $unicode = true, $encoding = 'UTF-8', $diskcache = false, $pdfa = false);
$pdf->SetMargins(0, 0, 0,0);
$pdf->SetAutoPageBreak(true, 0);
$pdf->setFontSubsetting(false);
$id=$_GET['year'];

$pdf->SetFont('thsarabun', 'B', 18);
$sql="select s.*,t.title_name1 from student s,sys_title t where s.id=$id and s.title_id = t.title_id";$rs=$hr->run_sql_select($sql);
$fullname = $rs[0][title_name1].trim($rs[0][student_fname]).' '.$rs[0][student_lname];
$bdate = $rs[0][birth_date];
if($bdate=='0000-00-00')
{
$day = "";$month="";$year="";
}else{
$day = $hr->get_date($bdate,'d');
$month = $hr->get_date($bdate,'m');
$year = $hr->get_date($bdate,'y');
}
//================================================================
$sql="select * from sys_data";$rs=$hr->run_sql_select($sql);
$school_name = $rs[0][school_name];
$date1 = $rs[0][date1]; //วันที่
if($date1=='0000-00-00')
{
$day1 = "";$month1="";$year1="";
}else{
$day1 = $hr->get_date($date1,'d');
$month1 = $hr->get_date($date1,'m');
$year1 = $hr->get_date($date1,'y');
}
//================================================================
$pdf->AddPage();
$pdf->setVisibility('all');
$pdf->SetXY(0, 45);
$pdf->Cell(0, 0, $fullname, 0, 1, 'C', 0, '', 0);
$pdf->SetXY(67, 56);
$pdf->Write(0,$hr->thainum($day));
$pdf->SetXY(95, 56);
$pdf->Write(0,$month);
$pdf->SetXY(140, 56);
$pdf->Write(0,$hr->thainum($year));
$pdf->SetXY(68, 74);
$pdf->Write(0,$school_name);
$pdf->SetXY(75, 83);
$pdf->Write(0,"เมือง");
$pdf->SetXY(125, 83);
$pdf->Write(0,"อุดรธานี");
$pdf->SetXY(68, 92);
$pdf->Write(0,$hr->thainum($day1));
$pdf->SetXY(95, 92);
$pdf->Write(0,$month1);
$pdf->SetXY(140, 92);
$pdf->Write(0,$hr->thainum($year1));
//=================================================================
$pdf->Output('pp2.pdf', 'I');
?>