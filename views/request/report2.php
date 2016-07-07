<?php

use yii\helpers\Html;
//use yii\jui\DatePicker;
use yii\widgets\ActiveForm;
use app\models\Request;
use kartik\widgets\DatePicker;

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

echo $dp1;
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
    <?php
        if($dyear!='' && $dyear1!=''){
        $dyears = $dyear -543;
        $dyear1s = $dyear1 -543;   
        $year_all = range($dyears, $dyear1s);
        $dp1 = $dyears."-".$dmonth."-".$dday;
        $dp2 = $dyear1s."-".$dmonth1."-".$dday1;

    }
    echo"<input type='hidden'  value='$dp1' id='dp1'>";
    echo"<input type='hidden'  value='$dp2' id='dp2'>";

    ?>
        <div class="box box-primary">
            <div class="box-header with-border">
              <h4 class="box-title">
                <div class="form-inline">
                   <?php $form = ActiveForm::begin(); ?>
                  
                            <?php
                            echo 'ตั้งแต่วันที่&nbsp;&nbsp;';
                            echo DatePicker::widget([
                                'name' => 'dp1',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                'value'=>$dp1,
                                'language' =>'th',
                                'pluginOptions' => [
                                'autoclose'=>true,
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true,
                                ]
                                ]);
                                ?>
                         
                                <?php
                                echo '&nbsp;&nbsp;ถึงวันที่&nbsp;&nbsp;';
                                echo DatePicker::widget([
                                    'name' => 'dp2',
                                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                    'language' =>'th',
                                    'value'=>$dp2,
                                    'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'yyyy-mm-dd',
                                    'todayHighlight' => true,
                                    ]
                                    ]);
                                    ?>
                             
                        
                        <div class="form-group">
                            <?= Html::submitButton(' ตกลง ', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </h4>
            </div>
            <div class="box-body">
                <?php
                if(isset($dday) && isset($dmonth))
                {
                    echo Html::a(' <i class="fa fa-print"></i> พิมพ์รายงาน', "report/report_date.php?year=$dyears&year1=$dyear1s&dday=$dday&dday1=$dday1&dmonth=$dmonth&dmonth1=$dmonth1", ['class' => 'btn btn-primary','target'=>'_blank']);
                    echo "<br><br>";
                    $arrtype = ['อาวุธสงคราม','ยาเสพติด','ป่าไม้','ที่ทำกิน','ผู้มีอิทธิพล','หนี้สิน','การใช้อำนาจของเจ้าหน้าที่รัฐ','บ่อนการพนัน','อื่นๆ (ไฟฟ้า ประปา และขอความช่วยเหลือ)'];
                    //$arryear = [$year3,$year2,$year1];
                    $data = [];
                    $ddayx=$dday;
                    $dmonthx=$dmonth; 
                    $ddayx1=$dday1;
                    $dmonthx1=$dmonth1;
                    foreach ($arrtype as $type_x) {
                       // foreach ($year_all as $year_x) {

                            
                            // if($year_x==($year_all[0])){$ddayx=$dday;$dmonthx=$dmonth;}else{$ddayx='01';$dmonthx='01';}  
                            // if($year_x==end($year_all)){$ddayx1=$dday1;$dmonthx1=$dmonth1;}else{$ddayx1='31';$dmonthx1='12';}
                            
                            $type1 = Request::find()->where(['req_type'=>$type_x,'req_date'=>['$gte'=>new \MongoDate(strtotime($year_all[0].'-'.$dmonthx.'-'.$ddayx.' 00:00:00')),'$lte'=>new \MongoDate(strtotime(end($year_all).'-'.$dmonthx1.'-'.$ddayx1.' 00:00:00'))]])->all();

                            $type1x = Request::find()->where(['req_type'=>$type_x,'req_status'=>'ยุติเรื่อง','req_date'=>['$gte'=>new \MongoDate(strtotime($year_all[0].'-'.$dmonthx.'-'.$ddayx.' 00:00:00')),'$lte'=>new \MongoDate(strtotime(end($year_all).'-'.$dmonthx1.'-'.$ddayx1.' 00:00:00'))]])->all();

                            $typeall = Request::find()->where(['req_date'=>['$gte'=>new \MongoDate(strtotime($year_all[0].'-'.$dmonthx.'-'.$ddayx.' 00:00:00')),'$lte'=>new \MongoDate(strtotime(end($year_all).'-'.$dmonthx1.'-'.$ddayx1.' 00:00:00'))]])->all();


                            $type1 = count($type1);
                            $type1x=count($type1x);
                            $typeall=count($typeall);

                            $type1z = $type1-$type1x;

                            if($type1>0){$per = number_format(($type1x / $type1 * 100),2);}else{$per=0;}

                            $type2 = $type1-$type1x;

                            if($type2>0){$per2 = number_format(($type2 / $type1 * 100),2);}else{$per2=0;}

                            array_push($data,[$type1,$type1x,$per,$type2,$per2]);
                            //print_r($data);
                       // }
                    }
//echo json_encode($data);

//echo $data[3][0];

//========================================= แสดงตารางรายงาน ===================================
                    $i=1;$a=0;
                    //for($i=0;$i<count($year_all);$i++){
                    echo "<table class='table table-bordered'><tr class='success'><td rowspan=2 align='center'>ลำดับ</td><td rowspan=2 align='center'>ประเภท</td><td colspan=5 align='center'>ตั้งแต่วันที่&nbsp;&nbsp;<B>".$dday."-".$dmonth."-".$dyear."</B>&nbsp;&nbsp;ถึง&nbsp;&nbsp;<B>".$dday1."-".$dmonth1."-".$dyear1."</B></td></tr>";


                    echo "<tr class='success'><td align='center'>จำนวน</td><td align='center'>ยุติเรื่อง</td><td align='center'>ร้อยละ</td><td align='center'>คงค้าง</td><td align='center'>ร้อยละ</td>
                        </tr>";
                    //}
                    
                    foreach ($arrtype as $type_x) {
                        echo "<tr><td align='center'>$i</td><td >$type_x</td><td align='center'>".$data[$a][0]."</td><td align='center'>".$data[$a][1]."</td><td align='center'>".$data[$a][2]."</td><td align='center'>".$data[$a][3]."</td><td align='center'>".$data[$a][4]."</tr>";
                      
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



                    echo "<tr><td align='center'></td><td align='center'><b>รวม</b></td><td align='center'><b>$all1</b></td><td align='center'><b>$all2</b></td><td align='center'><b>$all3</b></td><td align='center'><b>$all4</b></td><td align='center'><b>$all5</b></td>
                    </tr>";
                    echo "</table>";
                }
                ?>

                <?php
                    $this->registerJs(

                            '$("document").ready(function(){ 
                               if($("#dp1").val()!= "" && $("#dp2").val()!= ""){
                                    $("#w1").val($("#dp1").val());
                                    $("#w2").val($("#dp2").val());
                               }
                            });'
                        );
                ?>      


            </div>
        </div>
    </div>

