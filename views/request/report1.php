<?php

use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;
use app\models\Request;

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
$arrday = [
    '01' => 1, '02' => 2, '03' => 3, '04' => 4, '05' => 5, '06' => 6, '07' => 7, '08' => 8, '09' => 9, '10' => 10,
    '11' => 11, '12' => 12, '13' => 13, '14' => 14, '15' => 15, '16' => 16, '17' => 17, '18' => 18, '19' => 19, '20' => 20,
    '21' => 21, '22' => 22, '23' => 23, '24' => 24, '25' => 25, '26' => 26, '27' => 27, '28' => 28, '29' => 29, '30' => 30, '31' => 31,
];
?>
<style>
.table {
  border: 0.5px solid #000000;
}
.table-bordered > thead > tr > th,
.table-bordered > tbody > tr > th,
.table-bordered > tfoot > tr > th,
.table-bordered > thead > tr > td,
.table-bordered > tbody > tr > td,
.table-bordered > tfoot > tr > td {
   border: 0.5px solid #000000;
}
</style>
<div class="request-view">
<div class="col-request-form">
    <div class="box box-primary">
    <div class="box-header with-border">
      <h4 class="box-title">
<div class="form-inline">
 <?php $form = ActiveForm::begin(); ?>

<?php

$year1 = date('Y');$year2 = date('Y')-1;$year3 = date('Y')-2;
$year1t = $year1+543;$year2t = $year2+543;$year3t = $year3+543;
echo "รายงาน 3 ปี ($year3t, $year2t, $year1t)";
echo "<br/><br/>ตั้งแต่วันที่ ";
echo Html::dropDownList('dday',$dday,$arrday,['prompt' => ' เลือก ','class' => 'form-control','style'=>'width: 80px']);
echo " เดือน ";
echo Html::dropDownList('dmonth',$dmonth,$arrmonth,['prompt' => ' เลือก ','class' => 'form-control','style'=>'width: 150px']);
echo " ปี $year3t ";
echo " ถึงวันที่ ";
echo Html::dropDownList('dday1',$dday1,$arrday,['prompt' => ' เลือก ','class' => 'form-control','style'=>'width: 80px']);
echo " เดือน ";
echo Html::dropDownList('dmonth1',$dmonth1,$arrmonth,['prompt' => ' เลือก ','class' => 'form-control','style'=>'width: 150px']);
echo " ปี $year1t ";

echo Html::submitButton('ตกลง',['class'=>'btn btn-primary']);

?>
<?php ActiveForm::end(); ?>
</div>
</h4>
</div>
<div class="box-body">
<?php
if(isset($dday) && isset($dmonth))
{
echo Html::a(' <i class="fa fa-print"></i> พิมพ์รายงาน', "report/report3y.php?year=$year1&dday=$dday&dday1=$dday1&dmonth=$dmonth&dmonth1=$dmonth1", ['class' => 'btn btn-primary','target'=>'_blank']);
echo "<br>";
$arrtype = ['อาวุธสงคราม','ยาเสพติด','ป่าไม้','ที่ทำกิน','ผู้มีอิทธิพล','หนี้สิน','การใช้อำนาจของเจ้าหน้าที่รัฐ','บ่อนการพนัน','อื่นๆ (ไฟฟ้า ประปา และขอความช่วยเหลือ)'];
$arryear = [$year3,$year2,$year1];
$data = [];
foreach ($arrtype as $type_x) {
    foreach ($arryear as $year_x) {
        if($year_x==$year3){$ddayx=$dday;$dmonthx=$dmonth;}else{$ddayx='01';$dmonthx='01';}
        if($year_x==$year1){$ddayx1=$dday1;$dmonthx1=$dmonth1;}else{$ddayx1='31';$dmonthx1='12';}
            $type1 = Request::find()->where(['req_type'=>$type_x,'req_date'=>['$gte'=>new \MongoDate(strtotime($year_x.'-'.$dmonthx.'-'.$ddayx.' 00:00:00')),'$lte'=>new \MongoDate(strtotime($year_x.'-'.$dmonthx1.'-'.$ddayx1.' 00:00:00'))]])->all();
            $type1x = Request::find()->where(['req_type'=>$type_x,'req_status'=>'ยุติเรื่อง','req_date'=>['$gte'=>new \MongoDate(strtotime($year_x.'-'.$dmonthx.'-'.$ddayx.' 00:00:00')),'$lte'=>new \MongoDate(strtotime($year_x.'-'.$dmonthx1.'-'.$ddayx1.' 00:00:00'))]])->all();
            $typeall = Request::find()->where(['req_date'=>['$gte'=>new \MongoDate(strtotime($year_x.'-'.$dmonthx.'-'.$ddayx.' 00:00:00')),'$lte'=>new \MongoDate(strtotime($year_x.'-'.$dmonthx1.'-'.$ddayx1.' 00:00:00'))]])->all();
            $type1 = count($type1);$type1x=count($type1x);$typeall=count($typeall);
            $type1z = $type1-$type1x;
            if($type1>0){$per = number_format(($type1x / $type1 * 100),2);}else{$per=0;}
            $type2 = $type1-$type1x;
            if($type2>0){$per2 = number_format(($type2 / $type1 * 100),2);}else{$per2=0;}
            array_push($data,[$type1,$type1x,$per,$type2,$per2]);
    }
}
//echo json_encode($data);

//echo $data[3][0];

//========================================= แสดงตารางรายงาน ===================================
$i=1;$a=0;
echo "<table class='table table-bordered'><tr class='success'><td rowspan=2 align='center'>ลำดับ</td><td rowspan=2 align='center'>ประเภท</td><td colspan=5 align='center'>ปี $year3t</td><td colspan=5 align='center'>ปี $year2t</td><td colspan=5 align='center'>ปี $year1t</td></tr>";
echo "<tr class='success'><td align='center'>จำนวน</td><td align='center'>ยุติเรื่อง</td><td align='center'>ร้อยละ</td><td align='center'>คงค้าง</td><td align='center'>ร้อยละ</td><td align='center'>จำนวน</td><td align='center'>ยุติเรื่อง</td><td align='center'>ร้อยละ</td><td align='center'>คงค้าง</td><td align='center'>ร้อยละ</td><td align='center'>จำนวน</td><td align='center'>ยุติเรื่อง</td><td align='center'>ร้อยละ</td><td align='center'>คงค้าง</td><td align='center'>ร้อยละ</td></tr>";
foreach ($arrtype as $type_x) {
    echo "<tr><td align='center'>$i</td><td >$type_x</td><td align='center'>".$data[$a][0]."</td><td align='center'>".$data[$a][1]."</td><td align='center'>".$data[$a][2]."</td><td align='center'>".$data[$a][3]."</td><td align='center'>".$data[$a][4]."</td><td align='center'>".$data[$a+1][0]."</td><td align='center'>".$data[$a+1][1]."</td><td align='center'>".$data[$a+1][2]."</td><td align='center'>".$data[$a+1][3]."</td><td align='center'>".$data[$a+1][4]."</td><td align='center'>".$data[$a+2][0]."</td><td align='center'>".$data[$a+2][1]."</td><td align='center'>".$data[$a+2][2]."</td><td align='center'>".$data[$a+2][3]."</td><td align='center'>".$data[$a+2][4]."</td></tr>";
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
if($all6>0){$all8 = $all7/$all6*100;}else{$all8=0;}

$all9 = $data[1][3] + $data[4][3]+$data[7][3]+$data[10][3]+$data[13][3]+$data[16][3]+$data[19][3]+$data[22][3]+$data[25][3];
//$all10 = $data[1][4] + $data[4][4]+$data[7][4]+$data[10][4]+$data[13][4]+$data[16][4]+$data[19][4]+$data[22][4]+$data[25][4];
if($all6>0){$all10 = $all9/$all6*100;}else{$all10=0;}

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
echo "<tr><td align='center'></td><td align='center'><b>รวม</b></td><td align='center'><b>$all1</b></td><td align='center'><b>$all2</b></td><td align='center'><b>$all3</b></td><td align='center'><b>$all4</b></td><td align='center'><b>$all5</b></td><td align='center'><b>$all6</b></td><td align='center'><b>$all7</b></td><td align='center'><b>$all8</b></td><td align='center'><b>$all9</b></td><td align='center'><b>$all10</b></td><td align='center'><b>$all11</b></td><td align='center'><b>$all12</b></td><td align='center'><b>$all13</b></td><td align='center'><b>$all14</b></td><td align='center'><b>$all15</b></td></tr>";
echo "</table>";
}
?>
</div>
</div>
</div>
