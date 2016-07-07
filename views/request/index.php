<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\daterange\DateRangePicker;

$this->title = 'Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">
    <?=GridView::widget([
        'dataProvider'=> $dataProvider,
        'filterModel' => $searchModel,
        'pager' => [
        'firstPageLabel' => 'First',
        'lastPageLabel' => 'Last',
        ],
        'options' => ['width' => '100%'],
        'responsive'=>true,
        'hover'=>true,
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
        'panel'=>['type'=>'primary', 'heading'=>'รายงานรวมทั้งหมด'],
        'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
             //'req_year',
     /*   [
        'attribute' => 'req_year',
        'value' => function($model){
            if($model->req_year!=""){
                $ndate = $model->req_year+543;
                return $ndate;
            }else{
                return "";
            }
        }
        ],*/
        'req_channel',
        'req_amphoe',
        'req_name',
        'req_name1',
            // 'req_type',
           //  'req_topic',
        [
        'attribute' => 'req_topic',
        'headerOptions' => ['width' => '150'],
                //'options' => ['width' => '200'],
        ],
/*        [
        'attribute' => 'req_date',
        'value' => function($model){
            $ndate = date('Y-m-d',$model->req_date->sec);
            if($ndate=='1970-01-01'){return '-';}else{return $ndate;}
                   // return $ndate;
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
        'req_code_file',
        'req_report_id',
        'req_send_name',
/*        [
        'attribute' => 'req_report_date1',
        'value' => function($model){
            $ndate = date('Y-m-d',$model->req_report_date1->sec);
            if($ndate=='1970-01-01'){return '-';}else{return $ndate;}
                    //return $ndate;
        }
        ],*/
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
            ]
            ])

        ],
/*        [
        'attribute' => 'req_send_date',
        'value' => function($model){
            $ndate = date('Y-m-d',$model->req_send_date->sec);
            if($ndate=='1970-01-01'){return '-';}else{return $ndate;}
                    //return $ndate;
        }
        ],*/
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

/*        [
        'attribute' => 'req_report_date',
        'value' => function($model){
            $ndate = date('Y-m-d',$model->req_report_date->sec);
            if($ndate=='1970-01-01'){return '-';}else{return $ndate;}
                   // return $ndate;
        }
        ],*/
        [
        'attribute'=>'req_report_date',
        'value'=> function($model){
            if($model->req_report_date!=""){
                $ndate = date('Y-m-d',$model->req_report_date->sec);
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
            'attribute'=>'req_report_date',          
            'convertFormat'=>true,  
            'language' => 'th',     
            'pluginOptions'=>[                                          
            'locale'=>[
            'format'=>'Y-m-d',
            ],
            ]
            ])

        ],
        'req_status',

/*        [
        'attribute' => 'req_alert1',
        'value' => function($model){
            $ndate = date('Y-m-d',$model->req_alert1->sec);
            if($ndate=='1970-01-01'){return '-';}else{return $ndate;}
                   // return $ndate;
        }
        ],*/
        [
        'attribute'=>'req_alert1',
        'value'=> function($model){
            if($model->req_alert1!=""){
                $ndate = date('Y-m-d',$model->req_alert1->sec);
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
/*        [
        'attribute' => 'req_alert2',
        'value' => function($model){
            $ndate = date('Y-m-d',$model->req_alert2->sec);
            if($ndate=='1970-01-01'){return '-';}else{return $ndate;}
                   // return $ndate;
        }
        ],*/
        [
        'attribute'=>'req_alert2',
        'value'=> function($model){
            if($model->req_alert2!=""){
                $ndate = date('Y-m-d',$model->req_alert2->sec);
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
/*        [
        'attribute' => 'req_alert3',
        'value' => function($model){
            $ndate = date('Y-m-d',$model->req_alert3->sec);
            if($ndate=='1970-01-01'){return '-';}else{return $ndate;}
                   // return $ndate;
        }
        ],
*/
        [
        'attribute'=>'req_alert3',
        'value'=> function($model){
            if($model->req_alert3!=""){
                $ndate = date('Y-m-d',$model->req_alert3->sec);
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
          //  ['class' => 'yii\grid\ActionColumn'],
        ],
        ]); ?>
    </div>
