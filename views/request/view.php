<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Request */

$this->title = $model->_id;
$this->params['breadcrumbs'][] = ['label' => 'Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            '_id',
            'req_code_file',
            'req_report_id',
            'req_report_date1',
            'req_amphoe',
            'req_channel',
            'req_channel_remark',
            'req_name_type',
            'req_name',
            'req_name_type1',
            'req_name1',
            'req_topic',
            'req_topic_date',
            'req_send_name',
            'req_send_date',
            'req_report_date',
            'req_status',
            'req_type',
            'req_report_date2',
            'req_alert1',
            'req_alert2',
            'req_alert3',
        ],
    ]) ?>

</div>
