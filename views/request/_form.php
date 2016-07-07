<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Request */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'req_code_file') ?>

    <?= $form->field($model, 'req_report_id') ?>

    <?= $form->field($model, 'req_report_date1') ?>

    <?= $form->field($model, 'req_amphoe') ?>

    <?= $form->field($model, 'req_channel') ?>

    <?= $form->field($model, 'req_channel_remark') ?>

    <?= $form->field($model, 'req_name_type') ?>

    <?= $form->field($model, 'req_name') ?>

    <?= $form->field($model, 'req_name_type1') ?>

    <?= $form->field($model, 'req_name1') ?>

    <?= $form->field($model, 'req_topic') ?>

    <?= $form->field($model, 'req_topic_date') ?>

    <?= $form->field($model, 'req_send_name') ?>

    <?= $form->field($model, 'req_send_date') ?>

    <?= $form->field($model, 'req_report_date') ?>

    <?= $form->field($model, 'req_status') ?>

    <?= $form->field($model, 'req_type') ?>

    <?= $form->field($model, 'req_report_date2') ?>

    <?= $form->field($model, 'req_alert1') ?>

    <?= $form->field($model, 'req_alert2') ?>

    <?= $form->field($model, 'req_alert3') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
