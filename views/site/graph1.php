<?php
use miloschuman\highcharts\Highcharts;
use app\models\Request;
?>
<div class="site-about">
<?php

$type1 = Request::find()->where(['req_channel'=>'รับแจ้งจากหน่วยงานต่างๆ','req_year'=>2016])->all();
$type2 = Request::find()->where(['req_channel'=>'แจ้งด้วยตนเอง','req_year'=>2016])->all();
$type3 = Request::find()->where(['req_channel'=>'โทรศัพท์','req_year'=>2016])->all();
$type4 = Request::find()->where(['req_channel'=>'จดหมาย','req_year'=>2016])->all();
$type5 = Request::find()->where(['req_channel'=>'www.ศูนย์ดำรงธรรม อุดรธานี.com','req_year'=>2016])->all();

$type1 = count($type1);$type2 = count($type2);$type3 = count($type3);$type4 = count($type4);$type5 = count($type5);
$all =  $type1 + $type2 + $type3 + $type4 + $type5;
$per1 = number_format(($type1 / $all * 100),2);
$per2 = number_format(($type2 / $all * 100),2);;
$per3 = number_format(($type3 / $all * 100),2);
$per4 = number_format(($type4 / $all * 100),2);
$per5 = number_format(($type5 / $all * 100),2);

echo '<div align=center><h1>ปี 2559</h1><h3>มีจำนวนเรื่องร้องเรียนทั้งสิ้น '.number_format($all).' เรื่อง</h3></div>';
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
                'data' => [
                    ['รับแจ้งจากหน่วยงานต่างๆ '.$per1.'%', $type1],
                    ['แจ้งด้วยตนเอง '.$per2.'%', $type2],
                    ['โทรศัพท์ '.$per3.'%', $type3],
                    ['จดหมาย '.$per4.'%', $type4],
                    ['www.ศูนย์ดำรงธรรม อุดรธานี.com '.$per5.'%', $type5],
                ],
            ] // new closing bracket
        ],
    ],
]);
?>
<hr>
<?php
$type1 = Request::find()->where(['req_channel'=>'รับแจ้งจากหน่วยงานต่างๆ','req_year'=>2015])->all();
$type2 = Request::find()->where(['req_channel'=>'แจ้งด้วยตนเอง','req_year'=>2015])->all();
$type3 = Request::find()->where(['req_channel'=>'โทรศัพท์','req_year'=>2015])->all();
$type4 = Request::find()->where(['req_channel'=>'จดหมาย','req_year'=>2015])->all();
$type5 = Request::find()->where(['req_channel'=>'www.ศูนย์ดำรงธรรม อุดรธานี.com','req_year'=>2015])->all();

$type1 = count($type1);$type2 = count($type2);$type3 = count($type3);$type4 = count($type4);$type5 = count($type5);
$all =  $type1 + $type2 + $type3 + $type4 + $type5;
$per1 = number_format(($type1 / $all * 100),2);
$per2 = number_format(($type2 / $all * 100),2);;
$per3 = number_format(($type3 / $all * 100),2);
$per4 = number_format(($type4 / $all * 100),2);
$per5 = number_format(($type5 / $all * 100),2);

echo '<div align=center><h1>ปี 2558</h1><h3>มีจำนวนเรื่องร้องเรียนทั้งสิ้น '.number_format($all).' เรื่อง</h3></div>';
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'สถิติแยกตามประเภท'],
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
                'data' => [
                    ['รับแจ้งจากหน่วยงานต่างๆ '.$per1.'%', $type1],
                    ['แจ้งด้วยตนเอง '.$per2.'%', $type2],
                    ['โทรศัพท์ '.$per3.'%', $type3],
                    ['จดหมาย '.$per4.'%', $type4],
                    ['www.ศูนย์ดำรงธรรม อุดรธานี.com '.$per5.'%', $type5],

                ],
            ] // new closing bracket
        ],
    ],
]);
?>
<hr>
<?php
$type1 = Request::find()->where(['req_channel'=>'รับแจ้งจากหน่วยงานต่างๆ','req_year'=>2014])->all();
$type2 = Request::find()->where(['req_channel'=>'แจ้งด้วยตนเอง','req_year'=>2014])->all();
$type3 = Request::find()->where(['req_channel'=>'โทรศัพท์','req_year'=>2014])->all();
$type4 = Request::find()->where(['req_channel'=>'จดหมาย','req_year'=>2014])->all();
$type5 = Request::find()->where(['req_channel'=>'www.ศูนย์ดำรงธรรม อุดรธานี.com','req_year'=>2014])->all();

$type1 = count($type1);$type2 = count($type2);$type3 = count($type3);$type4 = count($type4);$type5 = count($type5);$type6 = count($type6);
$type7 = count($type7);$type8 = count($type8);$type9 = count($type9);
$all =  $type1 + $type2 + $type3 + $type4 + $type5 + $type6 + $type7 + $type8 + $type9;
$per1 = number_format(($type1 / $all * 100),2);
$per2 = number_format(($type2 / $all * 100),2);;
$per3 = number_format(($type3 / $all * 100),2);
$per4 = number_format(($type4 / $all * 100),2);
$per5 = number_format(($type5 / $all * 100),2);

echo '<div align=center><h1>ปี 2557</h1><h3>มีจำนวนเรื่องร้องเรียนทั้งสิ้น '.number_format($all).' เรื่อง</h3></div>';
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'สถิติแยกตามประเภท'],
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
                'data' => [
                    ['รับแจ้งจากหน่วยงานต่างๆ '.$per1.'%', $type1],
                    ['แจ้งด้วยตนเอง '.$per2.'%', $type2],
                    ['โทรศัพท์ '.$per3.'%', $type3],
                    ['จดหมาย '.$per4.'%', $type4],
                    ['www.ศูนย์ดำรงธรรม อุดรธานี.com '.$per5.'%', $type5],
                ],
            ] // new closing bracket
        ],
    ],
]);
?>
</div>
