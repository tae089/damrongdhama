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
        'panel'=>['type'=>'primary', 'heading'=>'รายงานรวมทั้งหมด(เรื่องทั่วไป)'],
        'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
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

                     //'req_send_id',
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
                      [
                         'attribute'=>'req_name01',
                         'value'=>'req_name'
                      ],
                      [

                         'attribute'=>'req_name11',
                         'value'=>'req_name1'
                      ],

                 //'req_topic'
                     [
                     'attribute' => 'req_topic',
                     'format' => 'ntext',
                     ],
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

                 'req_assign',
          //  ['class' => 'yii\grid\ActionColumn'],
        ],
        ]); ?>
    </div>
