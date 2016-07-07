<?php
$m = new MongoClient();
$db = $m->selectDB('damrongdhama');
$collection = new MongoCollection($db, 'request');
/*$collection->update(
    array(),
    array( '$rename' => ['req_topic_date'=>'req_date'] ),
    false,true,
);*/

/*
$collection->update(
    array('req_date' => array('$exists' => true)),
    array('$unset' => array('req_date' => true)),
    array('multiple' => true)
) */

$collection->update(
    array('req_topic_date' => array('$exists' => true)),
    array('$rename' => array('req_topic_date' => 'req_date')),
    array('multiple' => true)
)

/*
$cursor = $collection->find();$i=1;
foreach ($cursor as $document) {
	$date = $document['req_date'];
	$user = $document['req_id'];
	$req_new = $document['req_rec_new'];
	echo $i." ) $date  # $user # $req_new<br>";
	$i++;
} */
?>
