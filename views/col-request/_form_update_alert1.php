<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\ColRequest */
/* @var $form yii\widgets\ActiveForm */
if(isset($_GET['id'])){
    if($model->req_alert1!=''){
        $model->req_alert1 = date('Y-m-d', $model->req_alert1->sec);
        
    }else{
        $model->req_alert1 ="";
    } 

    if($model->req_alert3!=''){
        $model->req_alert3 = date('Y-m-d', $model->req_alert3->sec);
        
    }else{
        $model->req_alert3 ="";
    }

    if($model->req_alert2!=''){
        $model->req_alert2 = date('Y-m-d', $model->req_alert2->sec);
        
    }else{
        $model->req_alert2 ="";
    }  

}
?>

<div class="col-request-form">
    <div class="box box-warning">
    <div class="box-header with-border">
      <h4 class="box-title">บันทึก แจ้งเตือน</h4>
   </div>
  <div class="box-body">

    <?php $form = ActiveForm::begin(); ?>
        <p class="text-muted well well-sm bg-yellow"><i class="fa fa-fw fa-globe"></i> แจ้งเตือนครั้งที่ 1</p>
        <hr>
        <?= $form->field($model, 'req_alert1')->widget(DatePicker::classname(), [
        'removeButton' => false,
        'language' => 'th', 
        'pluginOptions' => [
        'autoclose'=>true,
         'format' => 'yyyy-mm-dd',
         'todayHighlight' => true,
        ],
        ]);?>


        <?= $form->field($model, 'req_alert1_comment')->textInput(); ?>


        <p class="text-muted well well-sm bg-yellow"><i class="fa fa-fw fa-globe"></i> แจ้งเตือนครั้งที่ 2</p>
        <hr>
        <?= $form->field($model, 'req_alert2')->widget(DatePicker::classname(), [
        'removeButton' => false,
         'language' => 'th',
       
        'pluginOptions' => [
        'autoclose'=>true,
         'format' => 'yyyy-mm-dd',
          'todayHighlight' => true,
        ],
        ]);?>


        <?= $form->field($model, 'req_alert2_comment')->textInput(); ?>


        <p class="text-muted well well-sm bg-yellow"><i class="fa fa-fw fa-globe"></i> แจ้งเตือนครั้งที่ 3</p>
        <hr>
        <?= $form->field($model, 'req_alert3')->widget(DatePicker::classname(), [
        'removeButton' => false,
        'language' => 'th', 
        'pluginOptions' => [
        'autoclose'=>true,
         'format' => 'yyyy-mm-dd',
          'todayHighlight' => true,
        ],
        ]);?>


        <?= $form->field($model, 'req_alert3_comment')->textInput(); ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'ปรับปรุง', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
</div>