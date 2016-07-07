<?php
use yii\helpers\Html;
use kartik\widgets\DatePicker;
use yii\widgets\ActiveForm;
use miloschuman\highcharts\Highcharts;
use app\models\Request;
?>
<div class="site-graph_menu1">
<h3>กราฟแสดงสถิติต่างๆเป็นช่วงวัน</h3>
<br>
<?php $form = ActiveForm::begin(); ?>
<div class='row'>
	<div class='col-md-3'>
	<?php
	      echo '<label class="control-label">ตั้งแต่วันที่</label>';
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
    	</div>
	<div class='col-md-3'>
	<?php
	      echo '<label class="control-label">ถึงวันที่</label>';
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
    	</div>
	<div class='col-md-3'>
	<?php
	      echo '<label class="control-label">แยกตาม</label><br>';
	      echo Html::dropDownList('dd1',$dd1,['แยกตามประเภท','แยกตามช่องทาง','แยกตามอำเภอ','แยกตามหน่วยงานที่รับผิดชอบ','แยกตามผู้ถูกร้องเรียน','แยกตามสถานะเรื่องร้องเรียน']);
	    ?>
    	</div>
</div>
<br>
	<div class="form-group">
                <?= Html::submitButton(' ตกลง ', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
<?php ActiveForm::end(); ?>
<hr>
<?php
if(trim($dp1)!='' && trim($dp2)!='')
{
	if($dd1==0)
	{
$type1 = Request::find()->where(['req_type'=>'การใช้อำนาจของเจ้าหน้าที่รัฐ','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();
$type2 = Request::find()->where(['req_type'=>'ที่ทำกิน','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2))]])->all();
$type3 = Request::find()->where(['req_type'=>'บ่อนการพนัน','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();
$type4 = Request::find()->where(['req_type'=>'ป่าไม้','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();
$type5 = Request::find()->where(['req_type'=>'ผู้มีอิทธิพล','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();
$type6 = Request::find()->where(['req_type'=>'ยาเสพติด','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();
$type7 = Request::find()->where(['req_type'=>'หนี้สิน','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();
$type8 = Request::find()->where(['req_type'=>'อื่นๆ (ไฟฟ้า ประปา และขอความช่วยเหลือ)','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();
$type9 = Request::find()->where(['req_type'=>'อาวุธสงคราม','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();
$type1 = count($type1);$type2 = count($type2);$type3 = count($type3);$type4 = count($type4);$type5 = count($type5);$type6 = count($type6);
$type7 = count($type7);$type8 = count($type8);$type9 = count($type9);
$all =  $type1 + $type2 + $type3 + $type4 + $type5 + $type6 + $type7 + $type8 + $type9;
if($all > 0){
	$per1 = number_format(($type1 / $all * 100),2);
	$per2 = number_format(($type2 / $all * 100),2);;
	$per3 = number_format(($type3 / $all * 100),2);
	$per4 = number_format(($type4 / $all * 100),2);
	$per5 = number_format(($type5 / $all * 100),2);
	$per6 = number_format(($type6 / $all * 100),2);
	$per7 = number_format(($type7 / $all * 100),2);
	$per8 = number_format(($type8 / $all * 100),2);
	$per9 = number_format(($type9 / $all * 100),2);
}else{
	$per1=0;$per2=0;$per3=0;$per4=0;$per5=0;$per6=0;$per7=0;$per8=0;$per9=0;
}
$date1=split('-',$dp1);$year1=$date1[0] + 543;
$date2 = $date1[2].'-'.$date1[1].'-'.$year1;
$date3=split('-',$dp2);$year2=$date3[0] + 543;
$date4 = $date3[2].'-'.$date3[1].'-'.$year2;
echo '<div align=center><h3>ตั้งแต่วันที่ '.$date2.' ถึงวันที่ '.$date4.'</h3><br><h3>มีจำนวนเรื่องร้องเรียนทั้งสิ้น '.number_format($all).' เรื่อง</h3></div>';
$data = [];
if($type9>0){array_push($data, ['อาวุธสงคราม '.$per9.'%', $type9]);} 
if($type6>0){array_push($data, ['ยาเสพติด '.$per6.'%', $type6]);} 
if($type4>0){array_push($data, ['ป่าไม้ '.$per4.'%', $type4]);} 
if($type2>0){array_push($data,  ['ที่ทำกิน '.$per2.'%', $type2]);} 
if($type5>0){array_push($data, ['ผู้มีอิทธิพล '.$per5.'%', $type5]);} 
if($type7>0){array_push($data, ['หนี้สิน'.$per7.'%', $type7]);} 
if($type1>0){array_push($data, ['การใช้อำนาจของเจ้าหน้าที่รัฐ '.$per1.'%', $type1]);} 
if($type3>0){array_push($data, ['บ่อนการพนัน '.$per3.'%', $type3]);} 
if($type8>0){array_push($data, ['อื่นๆ  (ไฟฟ้า ประปา และขอความช่วยเหลือ)'.$per8.'%', $type8]);} 
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'แสดงกราฟแยกตามประเภท'],
         'credits'=> [ 'enabled'=>false],
        'plotOptions' => [
            'pie' => [
                'cursor' => 'pointer',
            ],
        ],
        'series' => [
            [ // new opening bracket
                'type' => 'pie',
                'name' => 'จำนวน',
                'data' => $data,
            ] // new closing bracket
        ],
    ],
]);

	}

if($dd1==1)
{
$type1 = Request::find()->where(['req_channel'=>'รับแจ้งจากหน่วยงานต่างๆ','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();
$type2 = Request::find()->where(['req_channel'=>'แจ้งด้วยตนเอง','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();
$type3 = Request::find()->where(['req_channel'=>'โทรศัพท์','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();
$type4 = Request::find()->where(['req_channel'=>'จดหมาย','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();
$type5 = Request::find()->where(['req_channel'=>'เว็บไซต์ ศูนย์ดำรงธรรมอุดรธานี','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();

$type1 = count($type1);$type2 = count($type2);$type3 = count($type3);$type4 = count($type4);$type5 = count($type5);
$all =  $type1 + $type2 + $type3 + $type4 + $type5;
if($all > 0){
	$per1 = number_format(($type1 / $all * 100),2);
	$per2 = number_format(($type2 / $all * 100),2);;
	$per3 = number_format(($type3 / $all * 100),2);
	$per4 = number_format(($type4 / $all * 100),2);
	$per5 = number_format(($type5 / $all * 100),2);
}else{
	$per1=0;$per2=0;$per3=0;$per4=0;$per5=0;
}
$date1=split('-',$dp1);$year1=$date1[0] + 543;
$date2 = $date1[2].'-'.$date1[1].'-'.$year1;
$date3=split('-',$dp2);$year2=$date3[0] + 543;
$date4 = $date3[2].'-'.$date3[1].'-'.$year2;
echo '<div align=center><h3>ตั้งแต่วันที่ '.$date2.' ถึงวันที่ '.$date4.'</h3><br><h3>มีจำนวนเรื่องร้องเรียนทั้งสิ้น '.number_format($all).' เรื่อง</h3></div>';
$data=[];
if($type1>0){array_push($data, ['รับแจ้งจากหน่วยงานต่างๆ '.$per1.'%', $type1]);} if($type2>0){array_push($data, ['แจ้งด้วยตนเอง '.$per2.'%', $type2]);} 
if($type3>0){array_push($data, ['โทรศัพท์ '.$per3.'%', $type3]);} if($type4>0){array_push($data,  ['จดหมาย '.$per4.'%', $type4]);} 
if($type5>0){array_push($data, ['www.ศูนย์ดำรงธรรม อุดรธานี.com '.$per5.'%', $type5]);} 
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'สถิติแยกตามช่องทางการรับแจ้ง'],
         'credits'=> [ 'enabled'=>false],
        'plotOptions' => [
            'pie' => [
                'cursor' => 'pointer',

            ],
        ],
        'series' => [
            [ // new opening bracket
                'type' => 'pie',
                'name' => 'จำนวน',
                'data' => $data,
            ] // new closing bracket
        ],
    ],
]);
}
if($dd1==2)
{
$type1 = Request::find()->where(['req_amphoe'=>'เมือง','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();
$type2 = Request::find()->where(['req_amphoe'=>'กุดจับ','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();
$type3 = Request::find()->where(['req_amphoe'=>'กุมภวาปี','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();
$type4 = Request::find()->where(['req_amphoe'=>'กู่แก้ว','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();
$type5 = Request::find()->where(['req_amphoe'=>'ไชยวาน','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();
$type6 = Request::find()->where(['req_amphoe'=>'ทุ่งฝน','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();
$type7 = Request::find()->where(['req_amphoe'=>'โนนสะอาด','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();
$type8 = Request::find()->where(['req_amphoe'=>'นายูง','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();
$type9 = Request::find()->where(['req_amphoe'=>'น้ำโสม','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();
$type10 = Request::find()->where(['req_amphoe'=>'บ้านดุง','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();
$type11 = Request::find()->where(['req_amphoe'=>'บ้านผือ','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();
$type12 = Request::find()->where(['req_amphoe'=>'ประจักษ์ศิลปาคม','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();
$type13 = Request::find()->where(['req_amphoe'=>'เพ็ญ','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();
$type14 = Request::find()->where(['req_amphoe'=>'พิบูลย์รักษ์','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();
$type15 = Request::find()->where(['req_amphoe'=>'วังสามหมอ','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();
$type16 = Request::find()->where(['req_amphoe'=>'ศรีธาตุ','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();
$type17 = Request::find()->where(['req_amphoe'=>'สร้างคอม','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();
$type18 = Request::find()->where(['req_amphoe'=>'หนองวัวซอ','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();
$type19 = Request::find()->where(['req_amphoe'=>'หนองแสง','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();
$type20 = Request::find()->where(['req_amphoe'=>'หนองหาน','req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2.'23:59:59'))]])->all();


$type1 = count($type1);$type2 = count($type2);$type3 = count($type3);$type4 = count($type4);$type5 = count($type5);$type6 = count($type6);
$type7 = count($type7);$type8 = count($type8);$type9 = count($type9);$type10 = count($type10);
$type11 = count($type11);$type12 = count($type12);$type13 = count($type13);$type14 = count($type14);
$type15 = count($type15);$type16 = count($type16);$type17 = count($type17);$type18 = count($type18);
$type19 = count($type19);$type20 = count($type20);


$all =  $type1 + $type2 + $type3 + $type4 + $type5 + $type6 + $type7 + $type8 + $type9 + $type10 +$type11 + $type12 + $type13 + $type14 + $type15 + $type16 + $type17 + $type18 + $type19 + $type20;
if($all>0)
{
$per1 = number_format(($type1 / $all * 100),2);$per2 = number_format(($type2 / $all * 100),2);$per3 = number_format(($type3 / $all * 100),2);$per4 = number_format(($type4 / $all * 100),2);
$per5 = number_format(($type5 / $all * 100),2);$per6 = number_format(($type6 / $all * 100),2);$per7 = number_format(($type7 / $all * 100),2);$per8 = number_format(($type8 / $all * 100),2);
$per9 = number_format(($type9 / $all * 100),2);$per10 = number_format(($type10 / $all * 100),2);$per11 = number_format(($type11 / $all * 100),2);$per12 = number_format(($type12 / $all * 100),2);
$per13 = number_format(($type13 / $all * 100),2);$per14 = number_format(($type14 / $all * 100),2);$per15 = number_format(($type15 / $all * 100),2);$per16 = number_format(($type16 / $all * 100),2);
$per17 = number_format(($type17 / $all * 100),2);$per18 = number_format(($type18 / $all * 100),2);$per19 = number_format(($type19 / $all * 100),2);$per20 = number_format(($type20 / $all * 100),2);
}else{
	$per1=0;$per2=0;$per3=0;$per4=0;$per5=0;$per6=0;$per7=0;$per8=0;$per9=0;$per10=0;
	$per11=0;$per12=0;$per13=0;$per14=0;$per15=0;$per16=0;$per17=0;
}
$date1=split('-',$dp1);$year1=$date1[0] + 543;
$date2 = $date1[2].'-'.$date1[1].'-'.$year1;
$date3=split('-',$dp2);$year2=$date3[0] + 543;
$date4 = $date3[2].'-'.$date3[1].'-'.$year2;
echo '<div align=center><h3>ตั้งแต่วันที่ '.$date2.' ถึงวันที่ '.$date4.'</h3><br><h3>มีจำนวนเรื่องร้องเรียนทั้งสิ้น '.number_format($all).' เรื่อง</h3></div>';
$data = [];
if($type1>0){array_push($data, ['เมือง '.$per1.'%', $type1]);} if($type2>0){array_push($data, ['กุดจับ '.$per2.'%', $type2]);} 
if($type3>0){array_push($data, ['กุมภวาปี '.$per3.'%', $type3]);} if($type4>0){array_push($data,  ['กู่แก้ว '.$per4.'%', $type4]);} 
if($type5>0){array_push($data, ['ไชยวาน '.$per5.'%', $type5]);} if($type6>0){array_push($data, ['ทุ่งฝน '.$per6.'%', $type6]);} 
if($type7>0){array_push($data, ['โนนสะอาด '.$per7.'%', $type7]);} if($type8>0){array_push($data, ['นายูง '.$per8.'%', $type8]);} 
if($type9>0){array_push($data, ['น้ำโสม '.$per9.'%', $type9]);} if($type10>0){array_push($data, ['บ้านดุง '.$per10.'%', $type10]);} 
if($type11>0){array_push($data, ['บ้านผือ '.$per11.'%', $type11]);} if($type12>0){array_push($data, ['ประจักษ์ศิลปาคม '.$per12.'%', $type12]);} 
if($type13>0){array_push($data, ['เพ็ญ '.$per13.'%', $type13]);} if($type14>0){array_push($data,  ['พิบูลย์รักษ์ '.$per14.'%', $type14]);} 
if($type15>0){array_push($data, ['วังสามหมอ '.$per15.'%', $type15]);} if($type16>0){array_push($data, ['ศรีธาตุ '.$per16.'%', $type16]);} 
if($type17>0){array_push($data, ['สร้างคอม '.$per17.'%', $type17]);} if($type18>0){array_push($data, ['หนองวัวซอ '.$per18.'%', $type18]);} 
if($type19>0){array_push($data, ['หนองแสง '.$per19.'%', $type19]);} if($type20>0){array_push($data, ['หนองหาน '.$per20.'%', $type20]);} 
echo "<div align='center'>";
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'แสดงกราฟแยกตามอำเภอ'],
        'chart' => ['height' => 600],
          'credits'=> [ 'enabled'=>false],
     
        'plotOptions' => [
            'pie' => [
                'cursor' => 'pointer',
                'point'=>[
                    'events'=>[
                        'legendItemClick'=>"function(){alert('OK');ruturn false;}"
                    ]
                ],
            //    'showInLegend' => True
            ],

        ],
        'series' => [
            [ // new opening bracket
                'type' => 'pie',
                'name' => 'จำนวน',
                'data' =>$data,
            ] // new closing bracket
        ],
    ],
]);
}
if($dd1==3)
{
$collection = Yii::$app->mongodb->getCollection('request');
$result = $collection->aggregate(
    array( '$match' => array( 'req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2))]  ) ),
    array( '$group' => array(
       '_id' => ['req_send_name'=>'$req_send_name'],
        'total' => array( '$sum' => 1 )
    ))
);
//var_dump($result);
$data=[];$sumall=0;
foreach ($result as $result1) {
   // if($result1['total']>=10)
   //  {
        array_push($data ,[$result1['_id']['req_send_name'],$result1['total']]);
        $sumall = $sumall + $result1['total'];
    // }
}
$arrdata=[];
foreach ($data as $data1) {
    $per = number_format(($data1[1] / $sumall * 100),2);
    array_push($arrdata, [$data1[0]." $per%",$data1[1]]);
}
$date1=split('-',$dp1);$year1=$date1[0] + 543;
$date2 = $date1[2].'-'.$date1[1].'-'.$year1;
$date3=split('-',$dp2);$year2=$date3[0] + 543;
$date4 = $date3[2].'-'.$date3[1].'-'.$year2;
echo '<div align=center><h3>ตั้งแต่วันที่ '.$date2.' ถึงวันที่ '.$date4.'</h3><h3>มีจำนวนเรื่องร้องเรียนทั้งสิ้น '.$sumall.' เรื่อง</h3></div>';
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'แสดงกราฟแยกตามหน่วยงานที่รับผิดชอบ'],
        'chart' => ['height' => 600],
         'credits'=> [ 'enabled'=>false],
        'plotOptions' => [
            'pie' => [
                'cursor' => 'pointer',

            ],
        ],
        'series' => [
            [ // new opening bracket
                'type' => 'pie',
                'name' => 'จำนวน',
                'data' => $arrdata,
            ] // new closing bracket
        ],
    ],
]);
}

if($dd1==4)
{
$collection = Yii::$app->mongodb->getCollection('request');
$result = $collection->aggregate(
   array( '$match' => array( 'req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2))]  ) ),
    array( '$group' => array(
       '_id' => ['req_name1'=>'$req_name1'],
        'total' => array( '$sum' => 1 )
    ))
);
$case=5;
$data=[];$sumall=0;
foreach ($result as $result1) {
   // if($result1['total']>=$case && trim($result1['_id']['req_name1'])!='-')
   //  {
   //      array_push($data ,[$result1['_id']['req_name1'],$result1['total']]);
   //      $sumall = $sumall + $result1['total'];
   //  }
    if(trim($result1['_id']['req_name1'])!='-')
    {
        array_push($data ,[$result1['_id']['req_name1'],$result1['total']]);
        $sumall = $sumall + $result1['total'];
    }

}
$arrdata=[];
foreach ($data as $data1) {
    $per = number_format(($data1[1] / $sumall * 100),2);
    array_push($arrdata, [$data1[0]." $per%",$data1[1]]);
}
$date1=split('-',$dp1);$year1=$date1[0] + 543;
$date2 = $date1[2].'-'.$date1[1].'-'.$year1;
$date3=split('-',$dp2);$year2=$date3[0] + 543;
$date4 = $date3[2].'-'.$date3[1].'-'.$year2;
echo '<div align=center><h3>ตั้งแต่วันที่ '.$date2.' ถึงวันที่ '.$date4.'</h3><h3>มีจำนวนเรื่องร้องเรียนทั้งสิ้น '.$sumall.' เรื่อง</h3></div>';
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'แสดงกราฟแยกตามผู้ถูกร้องเรียน'],
        'credits'=> [ 'enabled'=>false],
        'plotOptions' => [
            'pie' => [
                'cursor' => 'pointer',

            ],
        ],
        'series' => [
            [ // new opening bracket
                'type' => 'pie',
                'name' => 'จำนวน',
                'data' => $arrdata,
            ] // new closing bracket
        ],
    ],
]);	
}

if($dd1==5)
{
$sumall = Request::find()->where(['req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2))] ])->count();
$sum1 =  Request::find()->where(['req_date'=>['$gte'=>new \MongoDate(strtotime($dp1)),'$lte'=>new \MongoDate(strtotime($dp2))] ,'req_status'=>'ยุติเรื่อง'])->count();
$sum2 = $sumall - $sum1;
if($sumall>0){
$per1 = number_format(($sum1 / $sumall * 100),2);
$per2 = number_format(($sum2 / $sumall * 100),2);
}else{$per1=0;$per2=0;}

$arrsum=[];
if($per1>0){array_push($arrsum,['ยุติเรื่อง '.$per1.'%',$sum1]);}
if($per2>0){array_push($arrsum,['กำลังดำเนินการ '.$per2.'%',$sum2]);}
//var_dump($data);
$date1=split('-',$dp1);$year1=$date1[0] + 543;
$date2 = $date1[2].'-'.$date1[1].'-'.$year1;
$date3=split('-',$dp2);$year2=$date3[0] + 543;
$date4 = $date3[2].'-'.$date3[1].'-'.$year2;
echo '<div align=center><h3>ตั้งแต่วันที่ '.$date2.' ถึงวันที่ '.$date4.'</h3><br><h3>มีจำนวนเรื่องร้องเรียนทั้งสิ้น '.number_format($sumall).' เรื่อง</h3></div>';
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'แสดงกราฟแยกตามสถานะเรื่องร้องเรียน'],
         'credits'=> [ 'enabled'=>false],
        'plotOptions' => [
            'pie' => [
                'cursor' => 'pointer',

            ],
        ],
        'series' => [
            [ // new opening bracket
                'type' => 'pie',
                'name' => 'จำนวน',
                'data' => $arrsum,
            ] // new closing bracket
        ],
    ],
]);
}

}

?>
</div>
