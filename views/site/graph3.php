<?php
use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;

$case=5;
?>
<div class="site-graph2">
<?php
$collection = Yii::$app->mongodb->getCollection('request');
$result = $collection->aggregate(
   // array( '$match' => array( 'year' => 'Unpaid' ) ),
    array( '$group' => array(
       '_id' => ['req_name1'=>'$req_name1', 'year'=> [ '$year'=> '$req_topic_date' ]],
        'total' => array( '$sum' => 1 )
    ))
);
//var_dump($result);
$data=[];$sumall=0;
foreach ($result as $result1) {
   if($result1['total']>=$case && $result1['_id']['year']==2016 && trim($result1['_id']['req_name1'])!='-')
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
echo '<div align=center><h1>ปี 2559 </h1><h3>(เฉพาะจำนวนคำร้องมากกว่า '.$case.' เรื่อง)</h3></div>';
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

echo "<hr>";

foreach ($result as $result1) {
   if($result1['total']>=$case && $result1['_id']['year']==2015 && trim($result1['_id']['req_name1'])!='-')
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
echo '<div align=center><h1>ปี 2558 </h1><h3>(เฉพาะจำนวนคำร้องมากกว่า '.$case.' เรื่อง)</h3></div>';
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
echo "<hr>";
foreach ($result as $result1) {
   if($result1['total']>=$case && $result1['_id']['year']==2014 && trim($result1['_id']['req_name1'])!='-')
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
echo '<div align=center><h1>ปี 2557 </h1><h3>(เฉพาะจำนวนคำร้องมากกว่า '.$case.' เรื่อง)</h3></div>';
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
?>

</div>
