    <?php

    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use kartik\widgets\DatePicker;
    use app\models\Amphur;
    use yii\helpers\ArrayHelper;


    /* @var $this yii\web\View */
    /* @var $model app\models\ColRequest */
    /* @var $form yii\widgets\ActiveForm */
    ?>

    <div class="col-request-form">
    <div class="box box-warning">
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
     ?>


    <?= $form->field($model, 'req_date')->widget(DatePicker::classname(), [
        'removeButton' => false,
        'language' => 'th',
        'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd',
        'todayHighlight' => true,
        ]
        ]);?>

    <?php $list_type = ['อาวุธสงคราม'=>'อาวุธสงคราม','ยาเสพติด'=>'ยาเสพติด','ป่าไม้'=>'ป่าไม้',
        'ที่ทำกิน'=>'ที่ทำกิน','ผู้มีอิทธิพล'=>'ผู้มีอิทธิพล','หนี้สิน'=>'หนี้สิน',
        'การใช้อำนาจของเจ้าหน้าที่รัฐ'=>'การใช้อำนาจของเจ้าหน้าที่รัฐ','บ่อนการพนัน'=>'บ่อนการพนัน',
        'อื่นๆ'=>'อื่นๆ (ไฟฟ้า ประปา และขอความช่วยเหลือ)',]; ?>

    <?= $form->field($model, 'req_type')->dropDownlist($list_type,['prompt' => 'เลือก']) ?>

    <?php $list_channel = ['รับแจ้งจากหน่วยงานต่างๆ'=>'รับแจ้งจากหน่วยงานต่างๆ',
    'แจ้งด้วยตนเอง'=>'แจ้งด้วยตนเอง','โทรศัพท์'=>'โทรศัพท์','จดหมาย'=>'จดหมาย',
    'เว็บไซต์ ศูนย์ดำรงธรรมอุดรธานี'=>'เว็บไซต์ ศูนย์ดำรงธรรมอุดรธานี',]; ?>

    <?= $form->field($model, 'req_channel')->dropDownlist($list_channel,['prompt' => 'เลือก']) ?>

    <?php 

    $countries=Amphur::find()->where(['province_id'=>29])->all();
    $listData=ArrayHelper::map($countries,'amphur_name','amphur_name');

    ?>
    <?= $form->field($model, 'req_amphoe')->dropDownlist($listData,['prompt'=>'เลือก']) ?>

    <?php $name_type = ['บุคคล'=>'บุคคล','กลุ่มบุคคล'=>'กลุ่มบุคคล','หน่วยงาน'=>'หน่วยงาน','ปกปิด'=>'ปกปิด',]; ?>

    <?= $form->field($model, 'req_name_type')->dropDownlist($name_type,['prompt' => 'เลือก',
        'onchange' => '
        var data = $(this).val();
        if(data==="ปกปิด"){ $("#colrequest-req_name").val(data); 
    }else{ $("#colrequest-req_name").val(""); }
    ']) ?>

    <?= $form->field($model, 'req_name') ?>

    <?php $name1_type = ['บุคคล'=>'บุคคล','กลุ่มบุคคล'=>'กลุ่มบุคคล','หน่วยงาน'=>'หน่วยงาน']; ?>
    <?= $form->field($model, 'req_name1_type')->dropDownlist($name1_type,['prompt' => 'เลือก']) ?>

    <?= $form->field($model, 'req_name1') ?>

    <?= $form->field($model, 'req_topic')->textarea(['row' => '6']); ?>

        <div class="hide">
        <?php if($model->isNewRecord){
            echo $form->field($model, 'req_topic_date')->textInput(['value' => date('Y-m-d H:i:s')]);  
        }
        ?>
        </div>

        


        <?= $form->field($model, 'req_status')->hiddenInput()->label(false) ?>

        <?= $form->field($model, 'req_id')->hiddenInput()->label(false) ?>

        <?= $form->field($model, 'req_rec_new')->hiddenInput()->label(false) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
   