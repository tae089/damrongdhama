<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ColRequest */

$this->title = 'แจ้งเรื่องร้องเรียน';
$this->params['breadcrumbs'][] = ['label' => 'Col Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-request-create">

    <h4><i class="fa fa-bullhorn"></i> <?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form_out', [
        'model' => $model,
    ]) ?>

</div>
