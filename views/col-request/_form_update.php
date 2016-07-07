<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\ColRequest */
/* @var $form yii\widgets\ActiveForm */
if(isset($_GET['id'])){
    if($model->req_send_date!=''){
        $model->req_send_date = date('Y-m-d', $model->req_send_date->sec);
        
    }else{
        $model->req_send_date ="";
    }
    if($model->req_report_date1!=''){
         $model->req_report_date1 = date('Y-m-d', $model->req_report_date1->sec);
    }else{
        $model->req_report_date1 ="";
    }   

    if($model->req_report_dates!=''){
         $model->req_report_dates = date('Y-m-d', $model->req_report_dates->sec);
    }else{
        $model->req_report_dates ="";
    }

}
?>

<div class="col-request-form">
    <div class="box box-warning">
    <div class="box-header with-border">
      <h4 class="box-title">ปรับปรุง เรื่องร้องเรียน  <B><?= $model->req_topic ?></B></h4>
   </div>
  <div class="box-body">

    <?php $form = ActiveForm::begin(); ?>


        <?= $form->field($model, 'req_code_file') ?>

                
        <?= $form->field($model, 'req_report_id') ?>

        <?= $form->field($model, 'req_report_date1')->widget(DatePicker::classname(), [
        'removeButton' => false,
        'language' => 'th',
        'pluginOptions' => [
        'autoclose'=>true,
         'format' => 'yyyy-mm-dd',
         'todayHighlight' => true,
        ]
        ]);?>

        <?= $form->field($model, 'req_send_name') ?>

        <?= $form->field($model, 'req_report_dates')->widget(DatePicker::classname(), [
        'removeButton' => false,
        'language' => 'th',
        'pluginOptions' => [
        'autoclose'=>true,
         'format' => 'yyyy-mm-dd',
         'todayHighlight' => true,
        ]
        ]);?>
       
        <?php
            // if($model->req_date_report!=''){
            //     echo $form->field($model, 'req_date_report')->dropDownlist(['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12','13'=>'13','14'=>'14','15'=>'15']);
            // }else{
            //     echo $form->field($model, 'req_date_report')->dropDownlist(['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12','13'=>'13','14'=>'14','15'=>'15'],['options'=>['15'=>['Selected'=>true]]]);
            // }

        ?>


         <?= $form->field($model, 'req_send_id') ?>

        <?= $form->field($model, 'req_send_date')->widget(DatePicker::classname(), [
        'removeButton' => false,
        'language' => 'th',
        'pluginOptions' => [
        'autoclose'=>true,
         'format' => 'yyyy-mm-dd',
         'todayHighlight' => true,
        ],
        ]);?>


        
        

        <?//= $form->field($model, 'req_results')->textArea(['rows' => '6']) ?>



        <?= $form->field($model, 'req_status')->textInput(['value' => "ดำเนินการ"])->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'req_alert1')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'req_alert1_comment')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'req_alert2')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'req_alert2_comment')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'req_alert3')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'req_alert3_comment')->hiddenInput()->label(false) ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'ปรับปรุง', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
</div>