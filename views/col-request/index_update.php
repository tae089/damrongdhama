  <?php

  use yii\helpers\Html;
  use kartik\grid\GridView;
  use yii\helpers\Url;
  //use yii\grid\GridView;

  /* @var $this yii\web\View */
  /* @var $searchModel app\models\ColRequestSearch */
  /* @var $dataProvider yii\data\ActiveDataProvider */



  $this->title = 'Col Requests';
  $this->params['breadcrumbs'][] = $this->title;
  ?>

  <div class="col-request-index">


     <?= GridView::widget([
      'dataProvider' => $dataProvider,
      'id'=>'grid1',
      'rowOptions'=>function($model){
          $ndate = date('Y-m-d',$model->req_date->sec);
          $ndate1 = date('Y-m-d',$model->req_report_dates->sec);
          
          if(date('Y-m-d', strtotime($ndate. ' +3 day')) <=  date('Y-m-d') && ($model->req_status!="ยุติเรื่อง" && $model->req_report_date1 ==''&& $model->req_status!="รายงาน")){
              return ['class' => 'bg-red'];
          }else if(date('Y-m-d') >= $ndate1 && $model->req_send_date=='' && $model->req_report_dates!='' && ($model->req_status!="รายงาน" && $model->req_status!="ยุติเรื่อง")){
               return ['class' => 'bg-yellow'];
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
      'panel'=>['type'=>'primary', 'heading'=>'ปรับปรุง เรื่องร้องเรียน'],
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
      ['class' => 'kartik\grid\SerialColumn'],

      'req_code_file',
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
          ])
                      //])

      ],
      'req_amphoe',
      'req_name',
      'req_name1',

      [
      'attribute'=>'req_topic',
      'format'=>'ntext',
      'contentOptions'=>[ 'style'=>'width: 500px'],
      ],

  /*             [
                  'attribute'=>'req_send_date',
                  'value' => function($model){
                  if($model->req_send_date){
                      $ndate = date('Y-m-d', $model->req_send_date->sec);
                      if($ndate=='1969-12-31'){
                          return '-';
                      }else{
                          return $ndate;
                      }
                  }else{
                      return "";
                  }

                   }

                   ],*/
                  ///////

               'req_report_id',
                  // 'req_date',
                   [
                   'attribute'=>'req_report_date1',
                   'value'=> function($model){
                      if($model->req_report_date1!=""){
                       $ndate = date('Y-m-d',$model->req_report_date1->sec);
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
                  'attribute'=>'req_report_date1',
                  'convertFormat'=>true,
                  'language' => 'th',
                  'pluginOptions'=>[
                  'locale'=>[
                  'format'=>'Y-m-d',
                  ],
                  ],

                  ])

              ],

                  [
                  'attribute'=>'req_report_dates',
                  'value'=> function($model){
                      if($model->req_report_dates!=""){
                         $ndate = date('Y-m-d',$model->req_report_dates->sec);
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
                  'attribute'=>'req_report_dates',
                  'convertFormat'=>true,
                  'language' => 'th',
                  'pluginOptions'=>[
                  'locale'=>[
                  'format'=>'Y-m-d',

                  ],
                  ]
                  ])

              ],
              
              // [
              //     'attribute'=>'req_alert1z',
              //     'value'=> function($model){
              //         if($model->req_alert1z!=""){
              //            $ndate = date('Y-m-d',$model->req_alert1z->sec);
              //            $ndate1 = explode("-",$ndate);
              //            $ndate2 = $ndate1[0]+543;

              //            return $ndate1[2]."-".$ndate1[1]."-".$ndate2;
              //        }else{
              //         return "";
              //     }
              // },
              // 'filterType' => GridView::FILTER_DATE_RANGE,
              // 'filterWidgetOptions' =>([
              //     //'model'=>$model,
              //     'attribute'=>'req_alert1z',
              //     'convertFormat'=>true,
              //     'language' => 'th',
              //     'pluginOptions'=>[
              //     'locale'=>[
              //     'format'=>'Y-m-d',

              //     ],
              //     ]
              //     ])

              // ],


              [
              'attribute'=>'req_send_name',
              'value' => function($model){
                  if($model->req_send_name){
                      return $model->req_send_name;
                  }else{
                      return "";
                  }

              }

              ],

  /*            [
                  'attribute'=>'req_report_date1',
                  'value' => function($model){
                  if($model->req_report_date1){
                     $ndate = date('Y-m-d', $model->req_report_date1->sec);
                      if($ndate=='1969-12-31'){
                          return '-';
                      }else{
                          return $ndate;
                      }
                  }else{
                      return "";
                  }

                  }

                  ],*/


                  [
                    'attribute'=>'req_send_id',
                    'value' => function($model){
                      if($model->req_send_id){
                        return $model->req_send_id;
                      }else{
                        return "";
                      }

                    }

                  ],


                  [
                  'attribute'=>'req_send_date',
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
                  'attribute'=>'req_send_date',
                  'convertFormat'=>true,
                  'language' => 'th',
                  'pluginOptions'=>[
                  'locale'=>[
                  'format'=>'Y-m-d',

                  ],
                  ]
                  ])

              ],



  /*            [
                  'attribute'=>'req_results',
                  'format'=>'ntext',
                  'value' => function($model){
                  if($model->req_results){
                      return $model->req_results;
                  }else{
                      return "";
                  }

                  }

                  ],*/

                  [
                  'attribute'=>'req_update_show',
                  'format'=>'html',
                  'value' => function($model){
                      if($model->req_update_show){
                          return $model->req_update_show;
                      }else{
                          return "";
                      }

                  }

                  ],

                  //'req_id',
                  'req_assign',
                  'req_status',


              //['class' => 'kartik\grid\ActionColumn'],
                  [
                  'class' => 'yii\grid\ActionColumn',
                  'header' => '<font size=2>จัดการ</font>',
                  'headerOptions' => ['class' => 'text-center skip-export'],
                  'contentOptions' => ['class' => 'text-center skip-export','style'=>'width:200px'],

                  'template'=> '{update_1}<br><br>{update_2}',
                  'buttons' => [
                  'update_1' => function ($url,$model){
                    $curl =  Url::current();
                      return
                      Html::a('<i class="fa fa-fw fa-cog"></i> ปรับปรุง เรื่องร้องเรียน',['update1','id'=>(string)$model->_id,'curl'=>$curl],['class'=>'btn btn-sm btn-info']);
                  },

                  'update_2' => function ($url,$model){
                    $curl =  Url::current();
                      return
                      Html::a('<i class="fa fa-fw fa-wrench"></i> ปรับปรุง ความคืบหน้า',['update_progress','id'=>(string)$model->_id,'curl'=>$curl],['class'=>'btn btn-sm btn-warning']);
                  },


                  ],
                  ],
                  ],
                  ]); ?>
              </div>
