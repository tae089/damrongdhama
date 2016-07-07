  <?php

  use yii\helpers\Html;
  use kartik\grid\GridView;
  use kartik\daterange\DateRangePicker;
  use yii\helpers\Url;
  //use yii\grid\GridView;


  /* @var $this yii\web\View */
  /* @var $searchModel app\models\ColRequestSearch */
  /* @var $dataProvider yii\data\ActiveDataProvider */

  $this->title = 'Col Requests';
  $this->params['breadcrumbs'][] = $this->title;
  ?>
  <div class="col-request-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
      <?= Html::a('<i class="fa fa-plus-circle"></i> บันทึก เรื่องร้องเรียน (เรื่องทั่วไป)', ['create_out'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
      'dataProvider' => $dataProvider,
      'rowOptions'=>function($model){
        $ndate = date('Y-m-d',$model->req_date->sec);
        if(date('Y-m-d', strtotime($ndate. ' +3 day')) <=  date('Y-m-d') && ($model->req_report_date1 =='' || $model->req_status=="ยุติเรื่อง")){

          return ['class' => 'danger'];
        }else{
          return [];
        }
      },
      'filterModel' => $searchModel,
      'pager' => [
        'firstPageLabel' => 'First',
        'lastPageLabel' => 'Last',
      ],
      'showOnEmpty'=>true,
      'panel'=>['type'=>'primary', 'heading'=>'แจ้งเรื่องร้องเรียน (เรื่องทั่วไป)'],
      'responsive'=>true,
      'hover'=>true,
      'pjax'=>true,
      // 'showPageSummary' => true,
      'export' => [
        'label' => 'Export',
        'fontAwesome' => true,

      ],
      'exportConfig' => [
        \kartik\grid\GridView::EXCEL => [
          'fontAwesome' => true,
          'label' => 'Export to Excel',
          'icon' => 'file-excel-o',
        ],
      ],

      'columns' => [
        [

          'class' => 'kartik\grid\SerialColumn'
        ],
        //'_id',
        //'req_date',
        //'req_code_file',
        /*        [
        'attribute'=>'req_date',
        'value' => function($model){

        $ndate = date('Y-m-d', $model->req_date->sec);
        if($ndate=='1969-12-31'){return '-';}else{return $ndate;}
      }

    ],*/
    [
      'attribute'=>'req_date',
      'value'=> function($model){
        if($model->req_date!=""){
          $ndate = date('Y-m-d',$model->req_date->sec);
          $ndate1 = explode("-",$ndate);
          $ndate2 = $ndate1[0]+543;

          return $ndate1[2]."-".$ndate1[1]."-".$ndate2;
        }else{
          return "";
        }
      },
      'filterType' => GridView::FILTER_DATE_RANGE,
      'filterWidgetOptions' =>([
        //'model'=>$model,
        'attribute'=>'req_date',
        'convertFormat'=>true,
        'language' => 'th',
        'pluginOptions'=>[
          'locale'=>[
            'format'=>'Y-m-d',
          ],
        ]
      ])

    ],

    [
      'attribute'=>'req_send_id01',
      'value'=>'req_send_id',
    ],

    [
      'attribute'=>'req_send_date01',
      'value'=> function($model){
        if($model->req_send_date!=""){
          $ndate = date('Y-m-d',$model->req_send_date->sec);
          $ndate1 = explode("-",$ndate);
          $ndate2 = $ndate1[0]+543;

          return $ndate1[2]."-".$ndate1[1]."-".$ndate2;
        }else{
          return "";
        }
      },
      'filterType' => GridView::FILTER_DATE_RANGE,
      'filterWidgetOptions' =>([
        //'model'=>$model,
        'attribute'=>'req_send_date01',
        'convertFormat'=>true,
        'language' => 'th',
        'pluginOptions'=>[
          'locale'=>[
            'format'=>'Y-m-d',
          ],
        ]
      ])

    ],
    // 'req_type',
    // 'req_channel',
    // 'req_amphoe',
    // 'req_name_type',
    //'req_name',
    [

      'attribute'=>'req_name01',
      'value'=>'req_name'
    ],
    // 'req_name1_type',
    //'req_name1',
    [
      'attribute'=>'req_name11',
      'value'=>'req_name1'
    ],

    //'req_topic'
    [
      'attribute' => 'req_topic',
      'format' => 'ntext',
    ],
    'req_id',
    'req_assign',
    //['class' => 'kartik\grid\ActionColumn'],
    [
      'class' => 'yii\grid\ActionColumn',
      'buttonOptions'=>['class'=>'btn btn-default'],
      'header' => '<font size=2>จัดการ</font>',
      'headerOptions' => ['class' => 'text-center skip-export'],
      'contentOptions' => ['class' => 'text-center skip-export','noWrap' => true],
      'template'=> '{update} {delete1}',
      'buttons' => [
        'update' => function ($url,$model){
          $curl =  Url::current();
          return
          Html::a('<span class="glyphicon glyphicon-pencil"></span>',['update_out','id'=>(string)$model->_id,'curl'=>$curl],['class'=>'btn btn-default']);
        },
        'delete1' => function ($url,$model){
          return
          Html::a('<span class="glyphicon glyphicon-trash"></span>',['delete_out','id'=>(string)$model->_id],['class'=>'btn btn-default',
          'data-confirm'=>'คุณต้องการลบข้อมูลหรือไม่ ?',
        ]);
      },

    ],
  ],
  ],
  ]); ?>
  </div>
