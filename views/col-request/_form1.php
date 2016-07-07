    <?php

    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use kartik\widgets\DatePicker;
    use app\models\Amphur;
    use app\models\User1;
    use dektrium\user\models\Profile;
    use yii\helpers\ArrayHelper;


    /* @var $this yii\web\View */
    /* @var $model app\models\ColRequest */
    /* @var $form yii\widgets\ActiveForm */

    ?>
<?//= Html::a('กลับ', $curl,['class' => 'btn btn-success']); ?>
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
    if ($_GET['id']) {
        if (isset($model->req_date->sec)) {
           $model->req_date = $ndate;
       }else{
           $model->req_date = "";
       }
   }
if (isset($model->req_name)) {
      $full_name = explode(' ', $model->req_name);
      $model->req_name = $full_name[0];
      $req_lname = $full_name[1];
   }

if (isset($model->req_name1)) {
      $name = explode(' ', $model->req_name1);
      $model->req_name1 = $name[0];
      $req_lname1 = $name[1];
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
    <?php $list_type = ['อาวุธสงคราม'=>'อาวุธสงคราม','ยาเสพติด'=>'ยาเสพติด','ป่าไม้'=>'ป่าไม้',
    'ที่ทำกิน'=>'ที่ทำกิน','ผู้มีอิทธิพล'=>'ผู้มีอิทธิพล','หนี้สิน'=>'หนี้สิน',
    'การใช้อำนาจของเจ้าหน้าที่รัฐ'=>'การใช้อำนาจของเจ้าหน้าที่รัฐ','บ่อนการพนัน'=>'บ่อนการพนัน',
    'อื่นๆ (ไฟฟ้า ประปา และขอความช่วยเหลือ)'=>'อื่นๆ (ไฟฟ้า ประปา และขอความช่วยเหลือ)',]; ?>
    <div class="col-xs-4">
       <?= $form->field($model, 'req_type')->dropDownlist($list_type,['prompt' => 'เลือก']) ?>
   </div>
   <?php $list_channel = ['รับแจ้งจากหน่วยงานต่างๆ'=>'รับแจ้งจากหน่วยงานต่างๆ',
   'แจ้งด้วยตนเอง'=>'แจ้งด้วยตนเอง','โทรศัพท์'=>'โทรศัพท์','จดหมาย'=>'จดหมาย',
   'เว็บไซต์ ศูนย์ดำรงธรรมอุดรธานี'=>'เว็บไซต์ ศูนย์ดำรงธรรมอุดรธานี',]; ?>
   <div class="col-xs-4">
       <?= $form->field($model, 'req_channel')->dropDownlist($list_channel,['prompt' => 'เลือก']) ?>
   </div>
</div>
<div class="col-xs-12">
   <?php 

   $countries=Amphur::find()->where(['province_id'=>29])->all();
   $listData=ArrayHelper::map($countries,'amphur_name','amphur_name');

   ?>
   <div class="col-xs-4">
       <?= $form->field($model, 'req_amphoe')->dropDownlist($listData,['prompt'=>'เลือก']) ?>
   </div>

   <?php $name_type = ['บุคคล'=>'บุคคล','กลุ่มบุคคล'=>'กลุ่มบุคคล','หน่วยงาน'=>'หน่วยงาน','ปกปิด'=>'ปกปิด',]; ?>
   <div class="col-xs-4">
       <?= $form->field($model, 'req_name_type')->dropDownlist($name_type,['prompt' => 'เลือก',
        'onchange' => '
        var data = $(this).val();
        if(data==="ปกปิด"){ $("#colrequest-req_name").val(data); 
    }else{ $("#colrequest-req_name").val(""); }
    ']) ?>
</div>
<div class="col-xs-4">

</div>
</div>
<div class="col-xs-12">
    <div class="col-xs-4">
        <?= $form->field($model,'req_name') ?>
    </div>
    <div class="col-xs-4">
        <?= Html::label('นามสกุล'); ?>
        <?= Html::textInput('req_lname',$req_lname , ['class' => 'form-control']); ?>
    </div>
    <div class="col-xs-4">
        <?= $form->field($model, 'req_name_age') ?>
    </div>
</div>
<div class="col-xs-12">
    <div class="col-xs-8">
        <?= $form->field($model, 'req_name_add') ?>
    </div>
    <div class="col-xs-4">
        <?= $form->field($model, 'req_name_tel') ?>
    </div>
</div>
<div class="col-xs-12">
    <div class="col-xs-8">
        <?= $form->field($model, 'req_name_office') ?>
    </div>
    <div class="col-xs-4">
        <?= $form->field($model, 'req_name_office_tel') ?>
    </div>
</div>
<div class="col-xs-12">
    <div class="col-xs-4">
        <?php $name1_type = ['บุคคล'=>'บุคคล','กลุ่มบุคคล'=>'กลุ่มบุคคล','หน่วยงาน'=>'หน่วยงาน']; ?>
        <?= $form->field($model, 'req_name1_type')->dropDownlist($name1_type,['prompt' => 'เลือก']) ?>
    </div>
</div>
<div class="col-xs-12">
    <div class="col-xs-4">
        <?= $form->field($model, 'req_name1') ?>
    </div>

    <div class="col-xs-4">
        <?= Html::label('นามสกุล'); ?>
        <?= Html::textInput('req_lname1', $req_lname1, ['class' => 'form-control']); ?>
    </div>
    <div class="col-xs-4">
        <?= $form->field($model, 'req_name1_age') ?>
    </div>
</div>
<div class="col-xs-12">
    <div class="col-xs-8">
        <?= $form->field($model, 'req_name1_add') ?>
    </div>
    <div class="col-xs-4">
        <?= $form->field($model, 'req_name1_tel') ?>
    </div>
</div>
<div class="col-xs-12">
    <div class="col-xs-8">
        <?= $form->field($model, 'req_name1_office') ?>
    </div>
    <div class="col-xs-4">
        <?= $form->field($model, 'req_name1_office_tel') ?>
    </div>
</div>
<div class="col-xs-12">
    <div class="col-xs-12">
        <?= $form->field($model, 'req_topic')->textarea(['row' => '6']); ?>
    </div>
</div>
<div class="col-xs-12">
    <div class="col-xs-12">
        <?= $form->field($model, 'req_premise') ?>
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
<?//= Html::input('text', 'curl', $curl); ?>
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
