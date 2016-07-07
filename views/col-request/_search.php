<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ColRequestSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-request-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, '_id') ?>

    <?= $form->field($model, 'req_date') ?>

    <?= $form->field($model, 'req_mphur') ?>

    <?= $form->field($model, 'req_channel') ?>

    <?= $form->field($model, 'req_type') ?>

    <?php // echo $form->field($model, 'req_name') ?>

    <?php // echo $form->field($model, 'req_name_type') ?>

    <?php // echo $form->field($model, 'req_name1') ?>

    <?php // echo $form->field($model, 'req_name1_type') ?>

    <?php // echo $form->field($model, 'req_topic') ?>

    <?php // echo $form->field($model, 'req_topic_date') ?>

    <?php // echo $form->field($model, 'system_date1') ?>

    <?php // echo $form->field($model, 'req_send_name') ?>

    <?php // echo $form->field($model, 'req_send_date') ?>

    <?php // echo $form->field($model, 'system_date2') ?>

    <?php // echo $form->field($model, 'req_report_date') ?>

    <?php // echo $form->field($model, 'req_report_id') ?>

    <?php // echo $form->field($model, 'req_alert1') ?>

    <?php // echo $form->field($model, 'system_date3') ?>

    <?php // echo $form->field($model, 'req_alert2') ?>

    <?php // echo $form->field($model, 'system_date4') ?>

    <?php // echo $form->field($model, 'req_alert3') ?>

    <?php // echo $form->field($model, 'system_date5') ?>

    <?php // echo $form->field($model, 'req_status') ?>

    <?php // echo $form->field($model, 'req_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
