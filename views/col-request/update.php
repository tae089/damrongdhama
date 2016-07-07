<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ColRequest */

$this->title = 'Update Col Request: ' . $model->_id;
$this->params['breadcrumbs'][] = ['label' => 'Col Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->_id, 'url' => ['view', 'id' => (string)$model->_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="col-request-update">

    

    <?= $this->render('_form1', [
        'model' => $model,
        'curl' => $curl,
    ]) ?>

</div>
