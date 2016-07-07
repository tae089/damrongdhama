<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RequestSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, '_id') ?>

    <?= $form->field($model, 'req_code_file') ?>

    <?= $form->field($model, 'req_report_id') ?>

    <?= $form->field($model, 'req_report_date1') ?>

    <?= $form->field($model, 'req_amphoe') ?>

    <?php // echo $form->field($model, 'req_channel') ?>

    <?php // echo $form->field($model, 'req_channel_remark') ?>

    <?php // echo $form->field($model, 'req_name_type') ?>

    <?php // echo $form->field($model, 'req_name') ?>

    <?php // echo $form->field($model, 'req_name_type1') ?>

    <?php // echo $form->field($model, 'req_name1') ?>

    <?php // echo $form->field($model, 'req_topic') ?>

    <?php // echo $form->field($model, 'req_topic_date') ?>

    <?php // echo $form->field($model, 'req_send_name') ?>

    <?php // echo $form->field($model, 'req_send_date') ?>

    <?php // echo $form->field($model, 'req_report_date') ?>

    <?php // echo $form->field($model, 'req_status') ?>

    <?php // echo $form->field($model, 'req_type') ?>

    <?php // echo $form->field($model, 'req_report_date2') ?>

    <?php // echo $form->field($model, 'req_alert1') ?>

    <?php // echo $form->field($model, 'req_alert2') ?>

    <?php // echo $form->field($model, 'req_alert3') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
