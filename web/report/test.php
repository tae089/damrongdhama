<?php
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
$type1 = $collection->count(['req_type'=>'การใช้อำนาจของเจ้าหน้าที่รัฐ','req_topic_date'=>['$gte'=>new \MongoDate(strtotime('2014-01-01')),'$lte'=>new \MongoDate(strtotime('2014-12-31'))]]);
echo $type1;
?>