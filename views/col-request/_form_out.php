    <?php

    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use kartik\widgets\DatePicker;
    use app\models\Amphur;
    //use app\models\User1;
    use dektrium\user\models\Profile;
    use yii\helpers\ArrayHelper;


    /* @var $this yii\web\View */
    /* @var $model app\models\ColRequest */
    /* @var $form yii\widgets\ActiveForm */
    ?>

    <div class="col-request-form">
      <div class="box box-primary">
    <!-- <div class="box-header with-border">
      <h3 class="box-title">Different Height</h3>
    </div> -->
    <div class="box-body">

      <?php $form = ActiveForm::begin(); ?>

      <div class="hide">
        <?= $form->field($model, 'req_year')->textInput(['value' => date('Y')]); ?>
      </div>
      <?php
      $ndate = date('Y-m-d', $model->req_date->sec);
      $ndate1 = date('Y-m-d', $model->req_send_date->sec);
      if ($_GET['id']) {
        if (isset($model->req_date->sec)) {
         $model->req_date = $ndate;
       }else{
         $model->req_date = "";
       }

       if ($model->req_send_date) {
         $model->req_send_date = $ndate1;
       }else{
         $model->req_send_date = "";
       }
     }
     ?>
     <div class="col-xs-12">
      <div class="col-xs-4">
       <?= $form->field($model, 'req_date')->widget(DatePicker::classname(), [
        'removeButton' => false,
        'language' => 'th',
        'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd',
        'todayHighlight' => true,
        ]
        ]);?>
      </div>
    </div>
    <div class="col-xs-12">
      <div class="col-xs-4">
        <?= $form->field($model, 'req_send_id')->label('เลขที่หนังสือ');?>
      </div>
    </div>
    <div class="col-xs-12">
      <div class="col-xs-4">
        <?= $form->field($model, 'req_send_date')->widget(DatePicker::classname(), [
          'removeButton' => false,
          'language' => 'th',
          'pluginOptions' => [
          'autoclose'=>true,
          'format' => 'yyyy-mm-dd',
          'todayHighlight' => true,
          ],
          ])->label('ลงวันที่หนังสือ');?>
        </div>
      </div>

      <div class="col-xs-12">
        <div class="col-xs-4">
          <?= $form->field($model,'req_name')->label('จาก'); ?>
        </div>
      </div>

      <div class="col-xs-12">
        <div class="col-xs-4">
          <?= $form->field($model, 'req_name1')->label('ถึง'); ?>
        </div>


      </div>



      <div class="col-xs-12">
        <div class="col-xs-12">
          <?= $form->field($model, 'req_topic')->textarea(['row' => '6']); ?>
        </div>
      </div>



      <div class="col-xs-12">
        <div class="col-xs-4">
          <?php
          $countries=Profile::find()->all();
          $listData=ArrayHelper::map($countries,'name','name');
          ?>
          <?= $form->field($model, 'req_assign')->dropDownlist($listData,['prompt'=>'เลือก']) ?>
        </div>
      </div>
      <div class="hide">
        <?php if($model->isNewRecord){
          echo $form->field($model, 'req_topic_date')->textInput(['value' => date('Y-m-d H:i:s')]);
        }
        ?>
      </div>




      <?= $form->field($model, 'req_status')->hiddenInput()->label(false) ?>

      <?= $form->field($model, 'req_id')->hiddenInput()->label(false) ?>

      <?= $form->field($model, 'req_rec_new')->hiddenInput()->label(false) ?>
      <div class="col-xs-12">
        <div class="col-xs-4">
          <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'ปรับปรุง', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
          </div>
        </div>
      </div>
      <?php ActiveForm::end(); ?>

    </div>
  </div>
