<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use app\models\ColRequest;
use yii\mongodb\Query;
?>

<p><?= Html::a('<i class="fa fa-chevron-circle-left"></i> กลับ', $curl,['class' => 'btn btn-success']); ?></p>
<div class="col-request-form">
    <div class="box box-warning">
    <div class="box-header with-border">
      <h4 class="box-title">ปรับปรุง ความคืบหน้า </h4>
   </div>
  <div class="box-body">

    <?php $form = ActiveForm::begin(); ?>
        <div class="row">
        <?php
            for($i=0; $i<count($model->req_update); $i++){

        ?>
         <div class="col-md-2">
         <?php
            if($i == 0){
                echo '<label class="control-label">วันที่</label>';
             }else{
                echo "";
            }
        ?>
        <?php

        if($model->req_status== "ยุติเรื่อง"){
          //echo Html::textInput('test1',$model->req_update[$i]['req_update_date'],['class'=>'form-control']);
          echo $form->field($model, 'req_update['.$i.'][req_update_date]')->textInput(['readonly' => true])->label(false);
        }else{
          echo  $form->field($model, 'req_update['.$i.'][req_update_date]')->widget(DatePicker::classname(), [
            'removeButton' => false,
            'language' => 'th',
            'pluginOptions' => [
            'autoclose'=>true,
             'format' => 'yyyy-mm-dd',
             'todayHighlight' => true,
            ],
            ])->label(false);
        }

        ?>
        </div>


        <div class="col-md-8">
        <?php
            if($i == 0){
                echo '<label class="control-label">รายละเอียด</label>';
             }else{
                echo "";
            }
        ?>
        <?= $form->field($model, 'req_update['.$i.'][req_update_detail]')->textInput()->label(false) ?>
        </div>

        <div class="col-md-1">
        <?php
            if($i == 0){
                echo '<label class="control-label">ชื่อผู้บันทึก</label>';
             }else{
                echo "";
            }
        ?>
        <?= $form->field($model, 'req_update['.$i.'][req_update_user]')->textInput(['readonly' => true])->label(false) ?>
        </div>

        <div class="col-md-1">
        <?php
            if($i == 0){
                echo '<center><label class="control-label">จัดการ</label><center>';
             }else{
                echo "";
            }
        ?>
        <center>
           <?php
           if($model->req_status== "ยุติเรื่อง"){
            echo "<button type='button' class='btn btn-block btn-danger disabled'><i class='fa fa-fw fa-trash'></i> ลบ</button>";
           }else{
            echo Html::a('<i class="fa fa-fw fa-trash"></i> ลบ',['del_progress_out','id'=>(string)$model->_id,'number'=>$i,'curl'=>$curl],['class'=>'btn btn-block btn-danger',
                'data'=>[
                    'confirm'=>'ต้องการลบ รายการนี้หรือไหม ?',
                ]

            ]);
           }

           ?>
        </center>
        </div>

        <?php
            }
        ?>
        </div>


        <hr>

        <div class="row">

         <div class="col-md-2">
        <?php
         echo '<label class="control-label">วันที่</label>';
        if($model->req_status== "ยุติเรื่อง"){
          echo Html::textInput('req_update_date1','',['class'=>'form-control']);
        }else{

            echo DatePicker::widget([
                'name' => 'req_update_date1',
                'removeButton' => false,
                'language' => 'th',
                    'pluginOptions' => [
                    'autoclose'=>true,
                     'format' => 'yyyy-mm-dd',
                    ],
            ]);
        }
        ?>
        </div>

        <div class="col-md-8">
        <?//= $form->field($model, 'req_update_detail1')->textInput()->label('รายละเอียด') ?>
        <?php echo '<label class="control-label">รายละเอียด</label>'; ?>
        <?= Html::textInput('req_update_detail1','',['class'=>'form-control']); ?>
        </div>

        <div class="col-md-2">
        <?//= $form->field($model, 'req_update_user1')->textInput()->label('ชื่อผู้บันทึก') ?>
        <?//php echo '<label class="control-label">ชื่อผู้บันทึก</label>'; ?>
        <?= Html::textInput('req_update_user1',Yii::$app->user->identity->username,['class'=>'form-control hide']); ?>
        </div>

        </div>
        <hr>

        <div class="row from inline">
         <div class="col-md-2">
        <?= $form->field($model, 'req_status')->dropDownlist(['ดำเนินการ'=>'ดำเนินการ','รายงาน'=>'รายงาน','ยุติเรื่อง'=>'ยุติเรื่อง'],['prompt' => 'เลือก'])->label(false) ?>
        </div>
        <div class="col-md-1">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'ปรับปรุง', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary pull-right']) ?>
        </div>
        </div>
        </div>

        <?php ActiveForm::end(); ?>

        <?php
            $this->registerJs(

                    '$("document").ready(function(){
                        if($("#colrequest-req_status").val()== "ยุติเรื่อง"){
                            //$("input").prop("disabled", true)
                            $("input").prop("readonly", true);

                        }

                    });'
                );
        ?>

    </div>
</div>
</div>
