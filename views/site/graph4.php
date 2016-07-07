<?php
use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;
use app\models\Request;
?>
<div class="site-graph2">
<?php

$sumall = Request::find()->where(['req_year'=>2016])->count();
$sum1 =  Request::find()->where(['req_year'=>2016,'req_status'=>'ยุติเรื่อง'])->count();
$sum2 = $sumall - $sum1;
$per1 = number_format(($sum1 / $sumall * 100),2);
$per2 = number_format(($sum2 / $sumall * 100),2);
$arrsum=[];
array_push($arrsum,['ยุติเรื่อง '.$per1.'%',$sum1]);
array_push($arrsum,['กำลังดำเนินการ '.$per2.'%',$sum2]);
//var_dump($data);
echo '<div align=center><h1>ปี 2559 </h1></div>';
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

echo "<hr>";
$sumall = Request::find()->where(['req_year'=>2015])->count();
$sum1 =  Request::find()->where(['req_year'=>2015,'req_status'=>'ยุติเรื่อง'])->count();
$sum2 = $sumall - $sum1;
$per1 = number_format(($sum1 / $sumall * 100),2);
$per2 = number_format(($sum2 / $sumall * 100),2);
$arrsum=[];

array_push($arrsum,['ยุติเรื่อง '.$per1.'%',$sum1]);
array_push($arrsum,['กำลังดำเนินการ '.$per2.'%',$sum2]);
echo '<div align=center><h1>ปี 2558 </h1></div>';
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
echo "<hr>";
$sumall = Request::find()->where(['req_year'=>2014])->count();
$sum1 =  Request::find()->where(['req_year'=>2014,'req_status'=>'ยุติเรื่อง'])->count();
$sum2 = $sumall - $sum1;
$per1 = number_format(($sum1 / $sumall * 100),2);
$per2 = number_format(($sum2 / $sumall * 100),2);
$arrsum=[];

array_push($arrsum,['ยุติเรื่อง '.$per1.'%',$sum1]);
array_push($arrsum,['กำลังดำเนินการ '.$per2.'%',$sum2]);
echo '<div align=center><h1>ปี 2557 </h1></div>';
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
?>

</div>
