<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ColRequest */

$this->title = $model->_id;
$this->params['breadcrumbs'][] = ['label' => 'Col Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-request-view">

    <h4><?= Html::encode($this->title) ?></h4>

    <p>
        <?= Html::a('Update', ['update', 'id' => (string)$model->_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => (string)$model->_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
  <div class="box box-warning">
    <!-- <div class="box-header with-border">
      <h3 class="box-title">Different Height</h3>
  </div> -->
  <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            '_id',
            'req_year',
            'req_date',
            /*[ 
                'attribute'=>'req_date',
                'value' => function($model){

                    $ndate = date('Y-m-d', $model->req_date->sec);
                    if($ndate=='1969-12-31'){return '-';}else{return $ndate;}
                 }
               
            ],*/
            'req_type',
            'req_channel',
            'req_mphur',
            'req_name_type',
            'req_name',
            'req_name1_type',
            'req_name1',
            'req_topic',
            'req_topic_date',
            'req_code_file',
           /* 'system_date1',
            'req_send_name',
            'req_send_date',
            'system_date2',
            'req_report_date',
            'req_report_id',
            'req_alert1',
            'system_date3',
            'req_alert2',
            'system_date4',
            'req_alert3',
            'system_date5',*/
            'req_status',
            'req_id',
        ],
    ]); ?>

</div>
</div>
</div>
