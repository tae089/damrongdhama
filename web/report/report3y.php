<?php
header("Content-Type:application/vnd.adobe.pdf");
require_once('tcpdf.php');
require_once('tcpdf_barcodes_1d.php');
require_once('FPDI/fpdi.php');
$m = new MongoClient();
$db = $m->selectDB('damrongdhama');
$collection = new MongoCollection($db, 'request');
$year = $_GET['year'];
$dday = $_GET['dday'];
$dmonth = $_GET['dmonth'];
$dday1 = $_GET['dday1'];
$dmonth1 = $_GET['dmonth1'];
$year1 = $year;$year2 = $year-1;$year3 = $year-2;
$year1t = $year1+543;$year2t = $year2+543;$year3t = $year3+543;
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
//==================================================================
$arrtype = ['อาวุธสงคราม','ยาเสพติด','ป่าไม้','ที่ทำกิน','ผู้มีอิทธิพล','หนี้สิน','การใช้อำนาจของเจ้าหน้าที่รัฐ','บ่อนการพนัน','อื่นๆ (ไฟฟ้า ประปา และขอความช่วยเหลือ)'];
$arryear = [$year3,$year2,$year1];
$data = [];

foreach ($arrtype as $type_x) {
    foreach ($arryear as $year_x) {
        if($year_x==$year3){$ddayx=$dday;$dmonthx=$dmonth;}else{$ddayx='01';$dmonthx='01';}
        if($year_x==$year1){$ddayx1=$dday1;$dmonthx1=$dmonth1;}else{$ddayx1='31';$dmonthx1='12';}
            $type1 = $collection->count(['req_type'=>$type_x,'req_date'=>['$gte'=>new \MongoDate(strtotime($year_x.'-'.$dmonthx.'-'.$ddayx.' 00:00:00')),'$lte'=>new \MongoDate(strtotime($year_x.'-'.$dmonthx1.'-'.$ddayx1.' 00:00:00'))]]);
            $type1x = $collection->count(['req_type'=>$type_x,'req_status'=>'ยุติเรื่อง','req_date'=>['$gte'=>new \MongoDate(strtotime($year_x.'-'.$dmonthx.'-'.$ddayx.' 00:00:00')),'$lte'=>new \MongoDate(strtotime($year_x.'-'.$dmonthx1.'-'.$ddayx1.' 00:00:00'))]]);
            $typeall = $collection->count(['req_date'=>['$gte'=>new \MongoDate(strtotime($year_x.'-'.$dmonthx.'-'.$ddayx.' 00:00:00')),'$lte'=>new \MongoDate(strtotime($year_x.'-'.$dmonthx1.'-'.$ddayx1.' 00:00:00'))]]);
            //$type1 = count($type1);$type1x=count($type1x);$typeall=count($typeall);
            $type1z = $type1-$type1x;
            if($type1>0){$per = number_format(($type1x / $type1 * 100),2);}else{$per=0;}
            $type2 = $type1-$type1x;
            if($type2>0){$per2 = number_format(($type2 / $type1 * 100),2);}else{$per2=0;}
            array_push($data,[$type1,$type1x,$per,$type2,$per2]);
    }
}


$i=1;$a=0;
$table= '<table width="785" align="center" border="1"><tr ><td rowspan="2" align="center" width="30"><b>ลำดับ</b></td><td rowspan="2" align="center" width="95"><b>ประเภท</b></td><td colspan="5" align="center"><b>ปี '.$year3t.'</b></td><td colspan="5" align="center"><b>ปี '.$year2t.'</b></td><td colspan="5" align="center"><b>ปี '.$year1t.'</b></td></tr>';
$table.= '<tr><td align="center">จำนวน</td><td align="center"><b>ยุติเรื่อง</b></td><td align="center"><b>ร้อยละ</b></td><td align="center"><b>คงค้าง</b></td><td align="center"><b>ร้อยละ</b></td><td align="center"><b>จำนวน</b></td><td align="center"><b>ยุติเรื่อง</b></td><td align="center"><b>ร้อยละ</b></td><td align="center"><b>คงค้าง</b></td><td align="center"><b>ร้อยละ</b></td><td align="center"><b>จำนวน</b></td><td align="center"><b>ยุติเรื่อง</b></td><td align="center"><b>ร้อยละ</b></td><td align="center"><b>คงค้าง</b></td><td align="center"><b>ร้อยละ</b></td></tr>';
foreach ($arrtype as $type_x) {
    if($type_x=='การใช้อำนาจของเจ้าหน้าที่รัฐ'){$type_x='การใช้อำนาจของ<br> เจ้าหน้าที่รัฐ';}
    if($type_x=='อื่นๆ (ไฟฟ้า ประปา และขอความช่วยเหลือ)'){$type_x='อื่นๆ (ไฟฟ้า ประปา<br> และขอความช่วยเหลือ)';}
    $table.= '<tr><td align="center">'.$i.'</td><td align="left"> '.$type_x.' </td><td align="center">'.$data[$a][0].'</td><td align="center">'.$data[$a][1].'</td><td align="center">'.$data[$a][2].'</td><td align="center">'.$data[$a][3].'</td><td align="center">'.$data[$a][4].'</td><td align="center">'.$data[$a+1][0].'</td><td align="center">'.$data[$a+1][1].'</td><td align="center">'.$data[$a+1][2].'</td><td align="center">'.$data[$a+1][3].'</td><td align="center">'.$data[$a+1][4].'</td><td align="center">'.$data[$a+2][0].'</td><td align="center">'.$data[$a+2][1].'</td><td align="center">'.$data[$a+2][2].'</td><td align="center">'.$data[$a+2][3].'</td><td align="center">'.$data[$a+2][4].'</td></tr>';
    $i++;$a=$a+3;
}
$all1 = $data[0][0] + $data[3][0]+$data[6][0]+$data[9][0]+$data[12][0]+$data[15][0]+$data[18][0]+$data[21][0]+$data[24][0];
$all2 = $data[0][1] + $data[3][1]+$data[6][1]+$data[9][1]+$data[12][1]+$data[15][1]+$data[18][1]+$data[21][1]+$data[24][1];
//$all3 = $data[0][2] + $data[3][2]+$data[6][2]+$data[9][2]+$data[12][2]+$data[15][2]+$data[18][2]+$data[21][2]+$data[24][2];
if($all1>0){$all3 = $all2/$all1*100;}else{$all3=0;}

$all4 = $data[0][3] + $data[3][3]+$data[6][3]+$data[9][3]+$data[12][3]+$data[15][3]+$data[18][3]+$data[21][3]+$data[24][3];
//$all5 = $data[0][4] + $data[3][4]+$data[6][4]+$data[9][4]+$data[12][4]+$data[15][4]+$data[18][4]+$data[21][4]+$data[24][4];
if($all1>0){$all5 = $all4/$all1*100;}else{$all5=0;}

$all6 = $data[1][0] + $data[4][0]+$data[7][0]+$data[10][0]+$data[13][0]+$data[16][0]+$data[19][0]+$data[22][0]+$data[25][0];
$all7 = $data[1][1] + $data[4][1]+$data[7][1]+$data[10][1]+$data[13][1]+$data[16][1]+$data[19][1]+$data[22][1]+$data[25][1];
//$all8 = $data[1][2] + $data[4][2]+$data[7][2]+$data[10][2]+$data[13][2]+$data[16][2]+$data[19][2]+$data[22][2]+$data[25][2];
$all8 = $all7/$all6*100;
$all9 = $data[1][3] + $data[4][3]+$data[7][3]+$data[10][3]+$data[13][3]+$data[16][3]+$data[19][3]+$data[22][3]+$data[25][3];
//$all10 = $data[1][4] + $data[4][4]+$data[7][4]+$data[10][4]+$data[13][4]+$data[16][4]+$data[19][4]+$data[22][4]+$data[25][4];
$all10 = $all9/$all6*100;
$all11= $data[2][0] + $data[5][0]+$data[8][0]+$data[11][0]+$data[14][0]+$data[17][0]+$data[20][0]+$data[23][0]+$data[26][0];
$all12= $data[2][1] + $data[5][1]+$data[8][1]+$data[11][1]+$data[14][1]+$data[17][1]+$data[20][1]+$data[23][1]+$data[26][1];
//$all13 = $data[2][2] + $data[5][2]+$data[8][2]+$data[11][2]+$data[14][2]+$data[17][2]+$data[20][2]+$data[23][2]+$data[26][2];
if($all11>0){$all13 = $all12/$all11*100;}else{$all13=0;}

$all14= $data[2][3] + $data[5][3]+$data[8][3]+$data[11][3]+$data[14][3]+$data[17][3]+$data[20][3]+$data[23][3]+$data[26][3];
//$all15 = $data[2][4] + $data[5][4]+$data[8][4]+$data[11][4]+$data[14][4]+$data[17][4]+$data[20][4]+$data[23][4]+$data[26][4];
if($all11>0){$all15 = $all14/$all11*100;}else{$all15=0;}

$all1=number_format($all1);$all2=number_format($all2);$all3=number_format($all3,2);
$all4=number_format($all4);$all5=number_format($all5,2);$all6=number_format($all6);$all7=number_format($all7);
$all8=number_format($all8,2);$all9=number_format($all9);$all10=number_format($all10,2);$all11=number_format($all11);
$all12=number_format($all12);$all13=number_format($all13,2);$all14=number_format($all14);$all15=number_format($all15,2);
$table.= '<tr><td align="center"></td><td align="center"><b>รวม</b></td><td align="center"><b>'.$all1.'</b></td><td align="center"><b>'.$all2.'</b></td><td align="center"><b>'.$all3.'</b></td><td align="center"><b>'.$all4.'</b></td><td align="center"><b>'.$all5.'</b></td><td align="center"><b>'.$all6.'</b></td><td align="center"><b>'.$all7.'</b></td><td align="center"><b>'.$all8.'</b></td><td align="center"><b>'.$all9.'</b></td><td align="center"><b>'.$all10.'</b></td><td align="center"><b>'.$all11.'</b></td><td align="center"><b>'.$all12.'</b></td><td align="center"><b>'.$all13.'</b></td><td align="center"><b>'.$all14.'</b></td><td align="center"><b>'.$all15.'</b></td></tr>';
$table.= '</table>';
//================================================================
$pdf->AddPage();
//$pdf->setVisibility('all');
$pdf->SetFont('thsarabun', 'B', 22);
$pdf->SetXY(0, 10);
$pdf->Cell(0, 0, "ศูนย์ดำรงธรรมจังหวัดอุดรธานี", 0, 1, 'C', 0, '', 0);
$pdf->writeHTML("<br>", true, false, true, false, '');
$pdf->SetFont('thsarabun', 'B', 20);
$pdf->writeHTML('<div align="center">ตั้งแต่วันที่ '.$dday.' '.$arrmonth[$dmonth].' '.$year3t.' จนถึงวันที่ '.$dday1.' '.$arrmonth[$dmonth1].' '.$year1t.' </div><br>', true, false, true, false, '');
$pdf->SetFont('thsarabun', '', 14);
$pdf->writeHTML($table, true, false, true, false, '');
//=================================================================
$pdf->Output('report3year.pdf', 'I');
?>