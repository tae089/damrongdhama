<?php
header("Content-Type:application/vnd.adobe.pdf");
require_once('tcpdf.php');
require_once('tcpdf_barcodes_1d.php');
require_once('FPDI/fpdi.php');
$m = new MongoClient();
$db = $m->selectDB('damrongdhama');
$collection = new MongoCollection($db, 'request');

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

    }

    function Footer() {

    }

}

//$pagelayout = array(212, 145);
//$pagelayout = array(145, 212);
$pdf = new PDF($orientation = 'L', $unit = 'mm', $format='A4', $unicode = true, $encoding = 'UTF-8', $diskcache = false, $pdfa = false);
$pdf->SetMargins(5, 10, 10, 10);
$pdf->SetAutoPageBreak(true, 10);
$pdf->setFontSubsetting(false);




$dyears = $_GET['year'];
$dyear1s = $_GET['year1'];   
$year_all = range($dyears, $dyear1s);
$year = $_GET['year'];
$year1 = $_GET['year1'];
$dmonth = $_GET['dmonth'];
$dmonth1 = $_GET['dmonth1'];
$dday = $_GET['dday'];
$dday1 = $_GET['dday1'];
//==================================================================
$arrtype = ['อาวุธสงคราม','ยาเสพติด','ป่าไม้','ที่ทำกิน','ผู้มีอิทธิพล','หนี้สิน','การใช้อำนาจของเจ้าหน้าที่รัฐ','บ่อนการพนัน','อื่นๆ (ไฟฟ้า ประปา และขอความช่วยเหลือ)'];
//$arryear = [$year3,$year2,$year1];
$data = [];

$ddayx=$dday;
$dmonthx=$dmonth; 
$ddayx1=$dday1;
$dmonthx1=$dmonth1;

foreach ($arrtype as $type_x) {
    //foreach ($year_all as $year_x) {

        


        $type1 = $collection->count(['req_type'=>$type_x,'req_date'=>['$gte'=>new \MongoDate(strtotime($year_all[0].'-'.$dmonthx.'-'.$ddayx.' 00:00:00')),'$lte'=>new \MongoDate(strtotime(end($year_all).'-'.$dmonthx1.'-'.$ddayx1.' 00:00:00'))]]);


            $type1x = $collection->count(['req_type'=>$type_x,'req_status'=>'ยุติเรื่อง','req_date'=>['$gte'=>new \MongoDate(strtotime($year_all[0].'-'.$dmonthx.'-'.$ddayx.' 00:00:00')),'$lte'=>new \MongoDate(strtotime(end($year_all).'-'.$dmonthx1.'-'.$ddayx1.' 00:00:00'))]]);


            $typeall = $collection->count(['req_date'=>['$gte'=>new \MongoDate(strtotime($year_all[0].'-'.$dmonthx.'-'.$ddayx.' 00:00:00')),'$lte'=>new \MongoDate(strtotime(end($year_all).'-'.$dmonthx1.'-'.$ddayx1.' 00:00:00'))]]);
            //$type1 = count($type1);$type1x=count($type1x);$typeall=count($typeall);

            $type1z = $type1-$type1x;
            if($type1>0){$per = number_format(($type1x / $type1 * 100),2);}else{$per=0;}
            $type2 = $type1-$type1x;
            if($type2>0){$per2 = number_format(($type2 / $type1 * 100),2);}else{$per2=0;}
            array_push($data,[$type1,$type1x,$per,$type2,$per2]);
                            //print_r($data);
    
//}
}


$i=1;$a=0;


// $table= '<table border="1" align="center"><tr><td rowspan=2 align="center">ลำดับ</td><td rowspan=2 align="center">ประเภท</td><td colspan=2 align="center">ตั้งแต่วันที่&nbsp;&nbsp;<B>'.$dday."-".$dmonth."-".$year.'</B>&nbsp;&nbsp;ถึง&nbsp;&nbsp;<B>'.$dday1."-".$dmonth1."-".$year1.'</B></td></tr>';


// $table.='<tr><td align="center">จำนวน</td><td align="center">ยุติเรื่อง</td><td align="center">ร้อยละ</td><td align="center">คงค้าง</td><td align="center">ร้อยละ</td>
// </tr>';

$table= '<table width="965" align="center" border="1">

    <tr>
    <td rowspan="2" align="center" width="30"><b>ลำดับ</b></td>
    <td rowspan="2" align="center" width="95"><b>ประเภท</b></td>
    <td colspan="5" align="center">ตั้งแต่วันที่&nbsp;&nbsp;<B>'.$dday."-".$dmonth."-".($year+543).'</B>&nbsp;&nbsp;ถึง&nbsp;&nbsp;<B>'.$dday1."-".$dmonth1."-".($year1+543).'</B></td>
    </tr>';



$table.= '<tr>
         <td align="center">จำนวน</td>
         <td align="center"><b>ยุติเรื่อง</b></td>
         <td align="center"><b>ร้อยละ</b></td>
         <td align="center"><b>คงค้าง</b></td>
         <td align="center"><b>ร้อยละ</b></td>
         </tr>';


foreach ($arrtype as $type_x) {

    if($type_x=='การใช้อำนาจของเจ้าหน้าที่รัฐ'){$type_x='การใช้อำนาจของ<br> เจ้าหน้าที่รัฐ';}
    if($type_x=='อื่นๆ (ไฟฟ้า ประปา และขอความช่วยเหลือ)'){$type_x='อื่นๆ (ไฟฟ้า ประปา<br> และขอความช่วยเหลือ)';}

    $table.= '<tr>
        <td align="center">'.$i.'</td>
        <td align="left"> '.$type_x.' </td>
        <td align="center">'.$data[$a][0].'</td><td align="center">'.$data[$a][1].'</td>
        <td align="center">'.$data[$a][2].'</td><td align="center">'.$data[$a][3].'</td>
        <td align="center">'.$data[$a][4].'</td></tr>';

    $sum1 = $sum1 + $data[$a][0];  
    $sum2 = $sum2 + $data[$a][1]; 
    $sum4 = $sum4 + $data[$a][3]; 


    $i++;$a++;

}
if($sum1>0){$sum_all1_1 = $sum2/$sum1*100;}else{$sum_all1_1=0;}
if($sum1>0){$sum5 = $sum4/$sum1*100;}else{$sum5=0;}

$all1=number_format($sum1);
$all2=number_format($sum2);
$all3=number_format($sum_all1_1,2);
$all4=number_format($sum4);
$all5=number_format($sum5,2);

$table.= '<tr>
<td align="center"></td>
<td align="center"><b>รวม</b></td>
<td align="center"><b>'.$all1.'</b></td>
<td align="center"><b>'.$all2.'</b></td>
<td align="center"><b>'.$all3.'</b></td>
<td align="center"><b>'.$all4.'</b></td>
<td align="center"><b>'.$all5.'</b></td>
</tr>';

$table.= '</table>';
//================================================================
$pdf->AddPage();
//$pdf->setVisibility('all');
$pdf->SetFont('thsarabun', 'B', 22);
$pdf->SetXY(0, 10);
$pdf->Cell(0, 0, "ศูนย์ดำรงธรรมจังหวัดอุดรธานี", 0, 1, 'C', 0, '', 0);
$pdf->writeHTML("<br>", true, false, true, false, '');
$pdf->SetFont('thsarabun', 'B', 20);
$pdf->writeHTML('<div align="center">ตั้งแต่วันที่ '.$dday." ".$arrmonth[$dmonth]." ".($year+543).' จนถึงวันที่ '.$dday1." ".$arrmonth[$dmonth1]." ".($year1+543).' </div><br>', true, false, true, false, '');
$pdf->SetFont('thsarabun', '', 14);
$pdf->writeHTML($table, true, false, true, false, '');
//=================================================================
$pdf->Output('report_date.pdf', 'I');
?>