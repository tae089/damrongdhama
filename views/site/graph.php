<?php
use miloschuman\highcharts\Highcharts;
use app\models\Request;
?>
<div class="site-about">
<?php

$type1 = Request::find()->where(['req_type'=>'การใช้อำนาจของเจ้าหน้าที่รัฐ','req_year'=>2016])->all();
$type2 = Request::find()->where(['req_type'=>'ที่ทำกิน','req_year'=>2016])->all();
$type3 = Request::find()->where(['req_type'=>'บ่อนการพนัน','req_year'=>2016])->all();
$type4 = Request::find()->where(['req_type'=>'ป่าไม้','req_year'=>2016])->all();
$type5 = Request::find()->where(['req_type'=>'ผู้มีอิทธิพล','req_year'=>2016])->all();
$type6 = Request::find()->where(['req_type'=>'ยาเสพติด','req_year'=>2016])->all();
$type7 = Request::find()->where(['req_type'=>'หนี้สิน','req_year'=>2016])->all();
$type8 = Request::find()->where(['req_type'=>'อื่นๆ (ไฟฟ้า ประปา และขอความช่วยเหลือ)','req_year'=>2016])->all();
$type9 = Request::find()->where(['req_type'=>'อาวุธสงคราม','req_year'=>2016])->all();
$type1 = count($type1);$type2 = count($type2);$type3 = count($type3);$type4 = count($type4);$type5 = count($type5);$type6 = count($type6);
$type7 = count($type7);$type8 = count($type8);$type9 = count($type9);
$all =  $type1 + $type2 + $type3 + $type4 + $type5 + $type6 + $type7 + $type8 + $type9;
$per1 = number_format(($type1 / $all * 100),2);
$per2 = number_format(($type2 / $all * 100),2);;
$per3 = number_format(($type3 / $all * 100),2);
$per4 = number_format(($type4 / $all * 100),2);
$per5 = number_format(($type5 / $all * 100),2);
$per6 = number_format(($type6 / $all * 100),2);
$per7 = number_format(($type7 / $all * 100),2);
$per8 = number_format(($type8 / $all * 100),2);
$per9 = number_format(($type9 / $all * 100),2);
echo '<div align=center><h1>ปี 2559</h1><h3>มีจำนวนเรื่องร้องเรียนทั้งสิ้น '.number_format($all).' เรื่อง</h3></div>';
$data = [];
if($type9>0){array_push($data, ['อาวุธสงคราม '.$per9.'%', $type9]);} 
if($type6>0){array_push($data, ['ยาเสพติด '.$per6.'%', $type6]);} 
if($type4>0){array_push($data, ['ป่าไม้ '.$per4.'%', $type4]);} 
if($type2>0){array_push($data,  ['ที่ทำกิน '.$per2.'%', $type2]);} 
if($type5>0){array_push($data, ['ผู้มีอิทธิพล '.$per5.'%', $type5]);} 
if($type7>0){array_push($data, ['หนี้สิน '.$per7.'%', $type7]);} 
if($type1>0){array_push($data, ['การใช้อำนาจของเจ้าหน้าที่รัฐ '.$per1.'%', $type1]);} 
if($type3>0){array_push($data, ['บ่อนการพนัน '.$per3.'%', $type3]);} 
if($type8>0){array_push($data, ['อื่นๆ (ไฟฟ้า ประปา และขอความช่วยเหลือ) '.$per8.'%', $type8]);} 
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'แสดงกราฟแยกตามประเภท'],
         'credits'=> [ 'enabled'=>false],
        'plotOptions' => [
            'pie' => [
                'cursor' => 'pointer',
                'point'=>[
                    'events'=>[
                        'legendItemClick'=>"function(){alert('OK');ruturn false;}"
                    ]
                ]
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
?>
<hr>
<?php
$type1 = Request::find()->where(['req_type'=>'การใช้อำนาจของเจ้าหน้าที่รัฐ','req_year'=>2015])->all();
$type2 = Request::find()->where(['req_type'=>'ที่ทำกิน','req_year'=>2015])->all();
$type3 = Request::find()->where(['req_type'=>'บ่อนการพนัน','req_year'=>2015])->all();
$type4 = Request::find()->where(['req_type'=>'ป่าไม้','req_year'=>2015])->all();
$type5 = Request::find()->where(['req_type'=>'ผู้มีอิทธิพล','req_year'=>2015])->all();
$type6 = Request::find()->where(['req_type'=>'ยาเสพติด','req_year'=>2015])->all();
$type7 = Request::find()->where(['req_type'=>'หนี้สิน','req_year'=>2015])->all();
$type8 = Request::find()->where(['req_type'=>'อื่นๆ (ไฟฟ้า ประปา และขอความช่วยเหลือ)','req_year'=>2015])->all();
$type9 = Request::find()->where(['req_type'=>'อาวุธสงคราม','req_year'=>2015])->all();
$type1 = count($type1);$type2 = count($type2);$type3 = count($type3);$type4 = count($type4);$type5 = count($type5);$type6 = count($type6);
$type7 = count($type7);$type8 = count($type8);$type9 = count($type9);
$all =  $type1 + $type2 + $type3 + $type4 + $type5 + $type6 + $type7 + $type8 + $type9;
$per1 = number_format(($type1 / $all * 100),2);
$per2 = number_format(($type2 / $all * 100),2);;
$per3 = number_format(($type3 / $all * 100),2);
$per4 = number_format(($type4 / $all * 100),2);
$per5 = number_format(($type5 / $all * 100),2);
$per6 = number_format(($type6 / $all * 100),2);
$per7 = number_format(($type7 / $all * 100),2);
$per8 = number_format(($type8 / $all * 100),2);
$per9 = number_format(($type9 / $all * 100),2);
echo '<div align=center><h1>ปี 2558</h1><h3>มีจำนวนเรื่องร้องเรียนทั้งสิ้น '.number_format($all).' เรื่อง</h3></div>';
$data = [];
if($type9>0){array_push($data, ['อาวุธสงคราม '.$per9.'%', $type9]);} 
if($type6>0){array_push($data, ['ยาเสพติด '.$per6.'%', $type6]);} 
if($type4>0){array_push($data, ['ป่าไม้ '.$per4.'%', $type4]);} 
if($type2>0){array_push($data,  ['ที่ทำกิน '.$per2.'%', $type2]);} 
if($type5>0){array_push($data, ['ผู้มีอิทธิพล '.$per5.'%', $type5]);} 
if($type7>0){array_push($data, ['หนี้สิน '.$per7.'%', $type7]);} 
if($type1>0){array_push($data, ['การใช้อำนาจของเจ้าหน้าที่รัฐ '.$per1.'%', $type1]);} 
if($type3>0){array_push($data, ['บ่อนการพนัน '.$per3.'%', $type3]);} 
if($type8>0){array_push($data, ['อื่นๆ (ไฟฟ้า ประปา และขอความช่วยเหลือ) '.$per8.'%', $type8]);} 
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
?>
<hr>
<?php
$type1 = Request::find()->where(['req_type'=>'การใช้อำนาจของเจ้าหน้าที่รัฐ','req_year'=>2014])->all();
$type2 = Request::find()->where(['req_type'=>'ที่ทำกิน','req_year'=>2014])->all();
$type3 = Request::find()->where(['req_type'=>'บ่อนการพนัน','req_year'=>2014])->all();
$type4 = Request::find()->where(['req_type'=>'ป่าไม้','req_year'=>2014])->all();
$type5 = Request::find()->where(['req_type'=>'ผู้มีอิทธิพล','req_year'=>2014])->all();
$type6 = Request::find()->where(['req_type'=>'ยาเสพติด','req_year'=>2014])->all();
$type7 = Request::find()->where(['req_type'=>'หนี้สิน','req_year'=>2014])->all();
$type8 = Request::find()->where(['req_type'=>'อื่นๆ (ไฟฟ้า ประปา และขอความช่วยเหลือ)','req_year'=>2014])->all();
$type9 = Request::find()->where(['req_type'=>'อาวุธสงคราม','req_year'=>2014])->all();
$type1 = count($type1);$type2 = count($type2);$type3 = count($type3);$type4 = count($type4);$type5 = count($type5);$type6 = count($type6);
$type7 = count($type7);$type8 = count($type8);$type9 = count($type9);
$all =  $type1 + $type2 + $type3 + $type4 + $type5 + $type6 + $type7 + $type8 + $type9;
$per1 = number_format(($type1 / $all * 100),2);
$per2 = number_format(($type2 / $all * 100),2);;
$per3 = number_format(($type3 / $all * 100),2);
$per4 = number_format(($type4 / $all * 100),2);
$per5 = number_format(($type5 / $all * 100),2);
$per6 = number_format(($type6 / $all * 100),2);
$per7 = number_format(($type7 / $all * 100),2);
$per8 = number_format(($type8 / $all * 100),2);
$per9 = number_format(($type9 / $all * 100),2);
echo '<div align=center><h1>ปี 2557</h1><h3>มีจำนวนเรื่องร้องเรียนทั้งสิ้น '.number_format($all).' เรื่อง</h3></div>';
$data = [];
if($type9>0){array_push($data, ['อาวุธสงคราม '.$per9.'%', $type9]);} 
if($type6>0){array_push($data, ['ยาเสพติด '.$per6.'%', $type6]);} 
if($type4>0){array_push($data, ['ป่าไม้ '.$per4.'%', $type4]);} 
if($type2>0){array_push($data,  ['ที่ทำกิน '.$per2.'%', $type2]);} 
if($type5>0){array_push($data, ['ผู้มีอิทธิพล '.$per5.'%', $type5]);} 
if($type7>0){array_push($data, ['หนี้สิน '.$per7.'%', $type7]);} 
if($type1>0){array_push($data, ['การใช้อำนาจของเจ้าหน้าที่รัฐ '.$per1.'%', $type1]);} 
if($type3>0){array_push($data, ['บ่อนการพนัน '.$per3.'%', $type3]);} 
if($type8>0){array_push($data, ['อื่นๆ (ไฟฟ้า ประปา และขอความช่วยเหลือ) '.$per8.'%', $type8]);} 
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
?>
</div>
