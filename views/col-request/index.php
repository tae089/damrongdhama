  <?php

  use yii\helpers\Html;
  use kartik\grid\GridView;
  use kartik\daterange\DateRangePicker;
  use yii\widgets\Pjax;
  use yii\helpers\Url;
 // use yii\grid\GridView;


  /* @var $this yii\web\View */
  /* @var $searchModel app\models\ColRequestSearch */
  /* @var $dataProvider yii\data\ActiveDataProvider */

  $this->title = 'Col Requests';
  $this->params['breadcrumbs'][] = $this->title;

  ?>
  <div class="col-request-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
      <?= Html::a('<i class="fa fa-plus-circle"></i> บันทึก เรื่องร้องเรียน', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
      'dataProvider' => $dataProvider,
      'id'=>'grid1',
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
      'panel'=>['type'=>'primary', 'heading'=>'แจ้งเรื่องร้องเรียน'],
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
        'req_code_file',
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
        ],
        //   'pluginEvents' => [
        //   "apply.daterangepicker" => "function() {

        //       var data1 = $('input[name=daterangepicker_start]').val();
        //       var data2 = $('input[name=daterangepicker_end]').val();
        //       $('#colrequestsearch-req_date').val(data1+' - '+data2);
        //           //alert(data1+' - '+data2);
        //           // if(data1 == data2){

        //           // }

        //       setTimeout(function(){
        //         $('#grid1').yiiGridView('applyFilter');
        //     }, 1000);


        // }",
        // ]
      ])

    ],
    'req_type',
    'req_channel',
    'req_amphoe',
    'req_name_type',
    'req_name',
    'req_name1_type',
    'req_name1',

    //'req_topic'
    [
      'attribute' => 'req_topic',
      'format' => 'ntext',
    ],
    'req_status',
    'req_id',
    'req_assign',
    //['class' => 'kartik\grid\ActionColumn'],
    [
      'class' => 'yii\grid\ActionColumn',
      'buttonOptions'=>['class'=>'btn btn-default'],
      'header' => '<font size=2>จัดการ</font>',
      'headerOptions' => ['class' => 'text-center skip-export'],
      'contentOptions' => ['class' => 'text-center skip-export','noWrap' => true],
      'template'=> '{print} {update} {delete}',
      'buttons' => [
        'print' => function ($url,$model){
          // return
          //Html::a('<span class="glyphicon glyphicon-print" id="glyphicon-print"></span>','., ['target'=>'_blank']);
          return Html::a('<span class="glyphicon glyphicon-print"></span>','javascript::;',['class' => 'btn btn-default',
          'onclick'=>'
          window.open("report/report.php?id='.$model->_id.'");
          ',]);
        },
        'update' => function ($url,$model){
          $dd =  Url::current();
          return

          Html::a('<span class="glyphicon glyphicon-pencil"></span>',['update','id'=>(string)$model->_id,'curl'=>$dd],['class'=>'btn btn-default']);
        },
        /*'delete' => function ($url,$model){
        return
        Html::a('<span class="glyphicon glyphicon-trash"></span>',['delete','id'=>(string)$model->_id]);
      },*/

    ],
  ],
  ],
  ]); ?>

  </div>
