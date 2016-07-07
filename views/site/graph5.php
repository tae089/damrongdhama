<?php
use miloschuman\highcharts\Highcharts;
use app\models\Request;
?>
<style>
.chart-wrapper {
    float: left;
    padding-bottom: 100%;
    position: relative;
    width: 100%;
}
</style>
<div class="site-about">
<?php

$type1 = Request::find()->where(['req_amphoe'=>'เมือง','req_year'=>2016])->all();
$type2 = Request::find()->where(['req_amphoe'=>'กุดจับ','req_year'=>2016])->all();
$type3 = Request::find()->where(['req_amphoe'=>'กุมภวาปี','req_year'=>2016])->all();
$type4 = Request::find()->where(['req_amphoe'=>'กู่แก้ว','req_year'=>2016])->all();
$type5 = Request::find()->where(['req_amphoe'=>'ไชยวาน','req_year'=>2016])->all();
$type6 = Request::find()->where(['req_amphoe'=>'ทุ่งฝน','req_year'=>2016])->all();
$type7 = Request::find()->where(['req_amphoe'=>'โนนสะอาด','req_year'=>2016])->all();
$type8 = Request::find()->where(['req_amphoe'=>'นายูง','req_year'=>2016])->all();
$type9 = Request::find()->where(['req_amphoe'=>'น้ำโสม','req_year'=>2016])->all();
$type10 = Request::find()->where(['req_amphoe'=>'บ้านดุง','req_year'=>2016])->all();
$type11 = Request::find()->where(['req_amphoe'=>'บ้านผือ','req_year'=>2016])->all();
$type12 = Request::find()->where(['req_amphoe'=>'ประจักษ์ศิลปาคม','req_year'=>2016])->all();
$type13 = Request::find()->where(['req_amphoe'=>'เพ็ญ','req_year'=>2016])->all();
$type14 = Request::find()->where(['req_amphoe'=>'พิบูลย์รักษ์','req_year'=>2016])->all();
$type15 = Request::find()->where(['req_amphoe'=>'วังสามหมอ','req_year'=>2016])->all();
$type16 = Request::find()->where(['req_amphoe'=>'ศรีธาตุ','req_year'=>2016])->all();
$type17 = Request::find()->where(['req_amphoe'=>'สร้างคอม','req_year'=>2016])->all();
$type18 = Request::find()->where(['req_amphoe'=>'หนองวัวซอ','req_year'=>2016])->all();
$type19 = Request::find()->where(['req_amphoe'=>'หนองแสง','req_year'=>2016])->all();
$type20 = Request::find()->where(['req_amphoe'=>'หนองหาน','req_year'=>2016])->all();


$type1 = count($type1);$type2 = count($type2);$type3 = count($type3);$type4 = count($type4);$type5 = count($type5);$type6 = count($type6);
$type7 = count($type7);$type8 = count($type8);$type9 = count($type9);$type10 = count($type10);
$type11 = count($type11);$type12 = count($type12);$type13 = count($type13);$type14 = count($type14);
$type15 = count($type15);$type16 = count($type16);$type17 = count($type17);$type18 = count($type18);
$type19 = count($type19);$type20 = count($type20);


$all =  $type1 + $type2 + $type3 + $type4 + $type5 + $type6 + $type7 + $type8 + $type9 + $type10 +$type11 + $type12 + $type13 + $type14 + $type15 + $type16 + $type17 + $type18 + $type19 + $type20;
$per1 = number_format(($type1 / $all * 100),2);$per2 = number_format(($type2 / $all * 100),2);$per3 = number_format(($type3 / $all * 100),2);$per4 = number_format(($type4 / $all * 100),2);
$per5 = number_format(($type5 / $all * 100),2);$per6 = number_format(($type6 / $all * 100),2);$per7 = number_format(($type7 / $all * 100),2);$per8 = number_format(($type8 / $all * 100),2);
$per9 = number_format(($type9 / $all * 100),2);$per10 = number_format(($type10 / $all * 100),2);$per11 = number_format(($type11 / $all * 100),2);$per12 = number_format(($type12 / $all * 100),2);
$per13 = number_format(($type13 / $all * 100),2);$per14 = number_format(($type14 / $all * 100),2);$per15 = number_format(($type15 / $all * 100),2);$per16 = number_format(($type16 / $all * 100),2);
$per17 = number_format(($type17 / $all * 100),2);$per18 = number_format(($type18 / $all * 100),2);$per19 = number_format(($type19 / $all * 100),2);$per20 = number_format(($type20 / $all * 100),2);
echo '<div align=center><h1>ปี 2559</h1><h3>มีจำนวนเรื่องร้องเรียนทั้งสิ้น '.number_format($all).' เรื่อง</h3></div>';
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
echo "</div>";
?>
<hr>
<?php
$type1 = Request::find()->where(['req_amphoe'=>'เมือง','req_year'=>2015])->all();
$type2 = Request::find()->where(['req_amphoe'=>'กุดจับ','req_year'=>2015])->all();
$type3 = Request::find()->where(['req_amphoe'=>'กุมภวาปี','req_year'=>2015])->all();
$type4 = Request::find()->where(['req_amphoe'=>'กู่แก้ว','req_year'=>2015])->all();
$type5 = Request::find()->where(['req_amphoe'=>'ไชยวาน','req_year'=>2015])->all();
$type6 = Request::find()->where(['req_amphoe'=>'ทุ่งฝน','req_year'=>2015])->all();
$type7 = Request::find()->where(['req_amphoe'=>'โนนสะอาด','req_year'=>2015])->all();
$type8 = Request::find()->where(['req_amphoe'=>'นายูง','req_year'=>2015])->all();
$type9 = Request::find()->where(['req_amphoe'=>'น้ำโสม','req_year'=>2015])->all();
$type10 = Request::find()->where(['req_amphoe'=>'บ้านดุง','req_year'=>2015])->all();
$type11 = Request::find()->where(['req_amphoe'=>'บ้านผือ','req_year'=>2015])->all();
$type12 = Request::find()->where(['req_amphoe'=>'ประจักษ์ศิลปาคม','req_year'=>2015])->all();
$type13 = Request::find()->where(['req_amphoe'=>'เพ็ญ','req_year'=>2015])->all();
$type14 = Request::find()->where(['req_amphoe'=>'พิบูลย์รักษ์','req_year'=>2015])->all();
$type15 = Request::find()->where(['req_amphoe'=>'วังสามหมอ','req_year'=>2015])->all();
$type16 = Request::find()->where(['req_amphoe'=>'ศรีธาตุ','req_year'=>2015])->all();
$type17 = Request::find()->where(['req_amphoe'=>'สร้างคอม','req_year'=>2015])->all();
$type18 = Request::find()->where(['req_amphoe'=>'หนองวัวซอ','req_year'=>2015])->all();
$type19 = Request::find()->where(['req_amphoe'=>'หนองแสง','req_year'=>2015])->all();
$type20 = Request::find()->where(['req_amphoe'=>'หนองหาน','req_year'=>2015])->all();

$type1 = count($type1);$type2 = count($type2);$type3 = count($type3);$type4 = count($type4);$type5 = count($type5);$type6 = count($type6);
$type7 = count($type7);$type8 = count($type8);$type9 = count($type9);$type10 = count($type10);
$type11 = count($type11);$type12 = count($type12);$type13 = count($type13);$type14 = count($type14);
$type15 = count($type15);$type16 = count($type16);$type17 = count($type17);$type18 = count($type18);
$type19 = count($type19);$type20 = count($type20);


$all =  $type1 + $type2 + $type3 + $type4 + $type5 + $type6 + $type7 + $type8 + $type9 + $type10 +$type11 + $type12 + $type13 + $type14 + $type15 + $type16 + $type17 + $type18 + $type19 + $type20;
$per1 = number_format(($type1 / $all * 100),2);$per2 = number_format(($type2 / $all * 100),2);$per3 = number_format(($type3 / $all * 100),2);$per4 = number_format(($type4 / $all * 100),2);
$per5 = number_format(($type5 / $all * 100),2);$per6 = number_format(($type6 / $all * 100),2);$per7 = number_format(($type7 / $all * 100),2);$per8 = number_format(($type8 / $all * 100),2);
$per9 = number_format(($type9 / $all * 100),2);$per10 = number_format(($type10 / $all * 100),2);$per11 = number_format(($type11 / $all * 100),2);$per12 = number_format(($type12 / $all * 100),2);
$per13 = number_format(($type13 / $all * 100),2);$per14 = number_format(($type14 / $all * 100),2);$per15 = number_format(($type15 / $all * 100),2);$per16 = number_format(($type16 / $all * 100),2);
$per17 = number_format(($type17 / $all * 100),2);$per18 = number_format(($type18 / $all * 100),2);$per19 = number_format(($type19 / $all * 100),2);$per20 = number_format(($type20 / $all * 100),2);
echo '<div align=center><h1>ปี 2558</h1><h3>มีจำนวนเรื่องร้องเรียนทั้งสิ้น '.number_format($all).' เรื่อง</h3></div>';
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
if($type19>0){array_push($data, ['หนองแสง '.$per19.'%', $type19]);} if($type20>0){array_push($data, ['หนองหาน) '.$per20.'%', $type20]);} 
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
echo "</div>";
?>
<hr>
<?php
$type1 = Request::find()->where(['req_amphoe'=>'เมือง','req_year'=>2014])->all();
$type2 = Request::find()->where(['req_amphoe'=>'กุดจับ','req_year'=>2014])->all();
$type3 = Request::find()->where(['req_amphoe'=>'กุมภวาปี','req_year'=>2014])->all();
$type4 = Request::find()->where(['req_amphoe'=>'กู่แก้ว','req_year'=>2014])->all();
$type5 = Request::find()->where(['req_amphoe'=>'ไชยวาน','req_year'=>2014])->all();
$type6 = Request::find()->where(['req_amphoe'=>'ทุ่งฝน','req_year'=>2014])->all();
$type7 = Request::find()->where(['req_amphoe'=>'โนนสะอาด','req_year'=>2014])->all();
$type8 = Request::find()->where(['req_amphoe'=>'นายูง','req_year'=>2014])->all();
$type9 = Request::find()->where(['req_amphoe'=>'น้ำโสม','req_year'=>2014])->all();
$type10 = Request::find()->where(['req_amphoe'=>'บ้านดุง','req_year'=>2014])->all();
$type11 = Request::find()->where(['req_amphoe'=>'บ้านผือ','req_year'=>2014])->all();
$type12 = Request::find()->where(['req_amphoe'=>'ประจักษ์ศิลปาคม','req_year'=>2014])->all();
$type13 = Request::find()->where(['req_amphoe'=>'เพ็ญ','req_year'=>2014])->all();
$type14 = Request::find()->where(['req_amphoe'=>'พิบูลย์รักษ์','req_year'=>2014])->all();
$type15 = Request::find()->where(['req_amphoe'=>'วังสามหมอ','req_year'=>2014])->all();
$type16 = Request::find()->where(['req_amphoe'=>'ศรีธาตุ','req_year'=>2014])->all();
$type17 = Request::find()->where(['req_amphoe'=>'สร้างคอม','req_year'=>2014])->all();
$type18 = Request::find()->where(['req_amphoe'=>'หนองวัวซอ','req_year'=>2014])->all();
$type19 = Request::find()->where(['req_amphoe'=>'หนองแสง','req_year'=>2014])->all();
$type20 = Request::find()->where(['req_amphoe'=>'หนองหาน','req_year'=>2014])->all();

$type1 = count($type1);$type2 = count($type2);$type3 = count($type3);$type4 = count($type4);$type5 = count($type5);$type6 = count($type6);
$type7 = count($type7);$type8 = count($type8);$type9 = count($type9);$type10 = count($type10);
$type11 = count($type11);$type12 = count($type12);$type13 = count($type13);$type14 = count($type14);
$type15 = count($type15);$type16 = count($type16);$type17 = count($type17);$type18 = count($type18);
$type19 = count($type19);$type20 = count($type20);


$all =  $type1 + $type2 + $type3 + $type4 + $type5 + $type6 + $type7 + $type8 + $type9 + $type10 +$type11 + $type12 + $type13 + $type14 + $type15 + $type16 + $type17 + $type18 + $type19 + $type20;
$per1 = number_format(($type1 / $all * 100),2);$per2 = number_format(($type2 / $all * 100),2);$per3 = number_format(($type3 / $all * 100),2);$per4 = number_format(($type4 / $all * 100),2);
$per5 = number_format(($type5 / $all * 100),2);$per6 = number_format(($type6 / $all * 100),2);$per7 = number_format(($type7 / $all * 100),2);$per8 = number_format(($type8 / $all * 100),2);
$per9 = number_format(($type9 / $all * 100),2);$per10 = number_format(($type10 / $all * 100),2);$per11 = number_format(($type11 / $all * 100),2);$per12 = number_format(($type12 / $all * 100),2);
$per13 = number_format(($type13 / $all * 100),2);$per14 = number_format(($type14 / $all * 100),2);$per15 = number_format(($type15 / $all * 100),2);$per16 = number_format(($type16 / $all * 100),2);
$per17 = number_format(($type17 / $all * 100),2);$per18 = number_format(($type18 / $all * 100),2);$per19 = number_format(($type19 / $all * 100),2);$per20 = number_format(($type20 / $all * 100),2);
echo '<div align=center><h1>ปี 2557</h1><h3>มีจำนวนเรื่องร้องเรียนทั้งสิ้น '.number_format($all).' เรื่อง</h3></div>';
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
if($type19>0){array_push($data, ['หนองแสง '.$per19.'%', $type19]);} if($type20>0){array_push($data, ['หนองหาน) '.$per20.'%', $type20]);} 
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
echo "</div>";
?>
</div>
