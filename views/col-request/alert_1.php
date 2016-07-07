<?php

use yii\helpers\Html;
use kartik\grid\GridView;

//use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\models\ColRequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'แจ้งเตือน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-request-index">


 <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showOnEmpty'=>true,
        'pager' => [
        'firstPageLabel' => 'First',
        'lastPageLabel' => 'Last',
        ],
        'panel'=>['type'=>'primary', 'heading'=>'บันทึกแจ้งเตือน'],
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

            //'_id',
            'req_code_file',
            //'req_date',
            [
                'attribute'=>'req_date',
                'value'=> function($model){
                    if($model->req_date){
                    $ndate = date('Y-m-d', $model->req_date->sec);
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
            'req_send_name',
            //'req_date',
            //'req_mphur',
            //'req_channel',
            //'req_type',
             'req_name',
             'req_name1',
             'req_topic',

/*             [ 
                'attribute'=>'req_alert1z',
                'value' => function($model){
                if($model->req_alert1z){
                   $ndate = date('Y-m-d', $model->req_alert1z->sec);
                    if($ndate=='1969-12-31'){
                        return '-';
                    }else{
                        return $ndate;
                    }  
                }else{
                    return "";
                }
                       
                },
              
             ],*/
            // [
            //     'attribute'=>'req_alert1z',
            //     'value'=> function($model){
            //         if($model->req_alert1z){
            //         $ndate = date('Y-m-d', $model->req_alert1z->sec);
            //         $ndate1 = explode("-",$ndate);
            //            $ndate2 = $ndate1[0]+543;

            //            return $ndate1[2]."-".$ndate1[1]."-".$ndate2;
            //         }else{
            //             return "";
            //         }
            //      },                
            //     'filterType' => GridView::FILTER_DATE_RANGE,
            //     'filterWidgetOptions' =>([
            //     //'model'=>$model,
            //     'attribute'=>'req_alert1z',          
            //     'convertFormat'=>true,  
            //     'language' => 'th',     
            //     'pluginOptions'=>[                                          
            //         'locale'=>[
            //             'format'=>'Y-m-d',
            //          ],
            //     ]
            // ])
            // ],
                     
/*             [ 
                'attribute'=>'req_alert1',
                'value' => function($model){
                if($model->req_alert1){
                   $ndate = date('Y-m-d', $model->req_alert1->sec);
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
                'attribute'=>'req_alert1',
                'value'=> function($model){
                    
                    if($model->req_alert1){
                    $ndate = date('Y-m-d', $model->req_alert1->sec);
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
                'attribute'=>'req_alert1',          
                'convertFormat'=>true,  
                'language' => 'th',     
                'pluginOptions'=>[                                          
                    'locale'=>[
                        'format'=>'Y-m-d',
                     ],
                ]
            ])
            ],
             'req_alert1_comment',
              [
                'attribute'=>'req_alert2',
                'value'=> function($model){
                    if($model->req_alert2){
                    $ndate = date('Y-m-d', $model->req_alert2->sec);
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
                'attribute'=>'req_alert2',          
                'convertFormat'=>true,  
                'language' => 'th',     
                'pluginOptions'=>[                                          
                    'locale'=>[
                        'format'=>'Y-m-d',
                     ],
                ]
            ])
            ],


             'req_alert2_comment',
             [
                'attribute'=>'req_alert3',
                'value'=> function($model){
                    if($model->req_alert3){
                    $ndate = date('Y-m-d', $model->req_alert3->sec);
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
                'attribute'=>'req_alert3',          
                'convertFormat'=>true,  
                'language' => 'th',     
                'pluginOptions'=>[                                          
                    'locale'=>[
                        'format'=>'Y-m-d',
                     ],
                ]
            ])
            ],

           
             'req_alert3_comment',
            // 'req_name_type',
            // 'req_name1',
            // 'req_name1_type',
            // 'req_topic',
            // 'req_topic_date',
            // 'system_date1',
            // 'req_send_name',
            // 'req_send_date',
            // 'system_date2',
            //'req_report_date',
            // 'req_report_id',
            // 'req_alert1',
            // 'system_date3',
            // 'req_alert2',
            // 'system_date4',
            // 'req_alert3',
            // 'system_date5',
            // 'req_status',
            // 'req_id',

            //['class' => 'kartik\grid\ActionColumn'],
             'req_assign',
             [
                'class' => 'yii\grid\ActionColumn',
                'header' => '<font size=2>จัดการ</font>',
                'headerOptions' => ['class' => 'text-center skip-export'],
                'contentOptions' => ['class' => 'text-center skip-export','style'=>'width:200px'],
                'template'=> '{update_1}',
                'buttons' => [
                    'update_1' => function ($url,$model){
                       
                            return
                        Html::a('<i class="fa fa-fw fa-plus"></i> บันทึก แจ้งเตือน',['update_alert1','id'=>(string)$model->_id],['class'=>'btn btn-sm btn-warning']);
                        
                        
                    },
                  
                ],
            ],
        ],
    ]); ?>
</div>
