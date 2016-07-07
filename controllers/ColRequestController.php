<?php
// หหหห
namespace app\controllers;

use Yii;
use app\models\ColRequest;
use app\models\ColRequestSearch;
use app\models\ColRequest01Search;
use app\models\ColRequest02Search;
use app\models\ColRequest03Search;
use app\models\ColRequest04Search;
use app\models\ColRequest05Search;
use app\models\ColRequest06Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ColRequestController implements the CRUD actions for ColRequest model.
 */
class ColRequestController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
return [
        //=================================
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        //================================
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all ColRequest models.
     * @return mixed
     */
      public function actionIest()
    {
        $ddd="";
    }
    public function actionIndex()
    {
        $searchModel = new ColRequestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndex_update()
    {
        $searchModel = new ColRequest04Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index_update', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndex_out()
    {
        $searchModel = new ColRequest05Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index_out', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndex_update_out()
    {
        $searchModel = new ColRequest06Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index_update_out', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single ColRequest model.
     * @param integer $_id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ColRequest model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ColRequest();
        if ($model->load(Yii::$app->request->post())) {


            $dt = new \DateTime(date('Y-m-d H:i:s'));
            $ts = $dt->getTimestamp();

            $dt1 = new \DateTime(date($model->req_date));
            //echo $model->req_date;
            //var_dump($dt1); die();
            $ts1 = $dt1->getTimestamp();
            $model->req_year = (int)$model->req_year;
            $model->req_date = new \MongoDate($ts1." 00:00:00");
            //echo  $ndate = date('Y-m-d', $model->req_date->sec);
            $model->req_topic_date = new \MongoDate($ts);
            $model->req_amphoe = trim($model->req_amphoe);
            $model->req_name = $model->req_name." ".Yii::$app->request->post('req_lname');
            $model->req_name1 = $model->req_name1." ".Yii::$app->request->post('req_lname1');
            $model->req_status = "ดำเนินการ";
            $model->req_id = Yii::$app->user->identity->username;
            $model->req_rec_new = "new";
            $model->req_out ="F";
            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionCreate_out()
    {
        $model = new ColRequest();
        if ($model->load(Yii::$app->request->post())) {


            $dt = new \DateTime(date('Y-m-d H:i:s'));
            $ts = $dt->getTimestamp();
            $dt1 = new \DateTime(date($model->req_date));
            //echo $model->req_date;
            //var_dump($dt1); die();
            $ts1 = $dt1->getTimestamp();
            $dt2 = new \DateTime(date($model->req_send_date.' H:i:s'));
            $ts2 = $dt2->getTimestamp();

            $model->req_year = (int)$model->req_year;
            $model->req_date = new \MongoDate($ts1);
            //echo  $ndate = date('Y-m-d', $model->req_date->sec);
            $model->req_topic_date = new \MongoDate($ts);

            $model->req_send_date = new \MongoDate($ts2);
            $model->req_amphoe = trim($model->req_amphoe);
            $model->req_name = $model->req_name." ".Yii::$app->request->post('req_lname');
            $model->req_name1 = $model->req_name1." ".Yii::$app->request->post('req_lname1');
            $model->req_status = "ดำเนินการ";
            $model->req_id = Yii::$app->user->identity->username;
            $model->req_rec_new = "new";
            $model->req_out ="T";
            $model->save();
            return $this->redirect(['index_out']);
        } else {
            return $this->render('create_out', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Updates an existing ColRequest model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $_id
     * @return mixed
     */
    public function actionUpdate($id,$curl)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {

            $dt1 = new \DateTime(date($model->req_date));
            $ts1 = $dt1->getTimestamp();
           // $dt2 = new \DateTime(date($model->req_topic_date));
            //$ts2 = $dt2->getTimestamp();
           // $model->req_topic_date = new \MongoDate($ts2);
            $model->req_id = Yii::$app->user->identity->username;
            $model->req_amphoe = trim($model->req_amphoe);
            $model->req_name = $model->req_name." ".Yii::$app->request->post('req_lname');
            $model->req_name1 = $model->req_name1." ".Yii::$app->request->post('req_lname1');
            $model->req_year = (int)$model->req_year;
            $model->req_date = new \MongoDate($ts1);
            $model->save();

            return $this->redirect($curl);
        } else {
            return $this->render('update', [
                'model' => $model,

            ]);

            //print_r($arr);
            //echo $arr;
        }
    }

    public function actionUpdate_out($id,$curl)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $dt1 = new \DateTime(date($model->req_date));
            $ts1 = $dt1->getTimestamp();
            $dt2 = new \DateTime(date($model->req_send_date.' H:i:s'));
            $ts2 = $dt2->getTimestamp();
           // $dt2 = new \DateTime(date($model->req_topic_date));
            //$ts2 = $dt2->getTimestamp();
           // $model->req_topic_date = new \MongoDate($ts2);
            $model->req_id = Yii::$app->user->identity->username;
            $model->req_amphoe = trim($model->req_amphoe);
            $model->req_year = (int)$model->req_year;
            $model->req_date = new \MongoDate($ts1);
            $model->req_send_date = new \MongoDate($ts2);
            $model->save();

            //return $this->redirect(['index_out']);
            return $this->redirect($curl);
        } else {
            return $this->render('update_out', [
                'model' => $model,
            ]);
        }
    }

     public function actionUpdate1($id,$curl)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            if($model->req_send_date!=''){
                $dt1 = new \DateTime(date($model->req_send_date.' H:i:s'));
                $ts1 = $dt1->getTimestamp();
                $model->req_send_date = new \MongoDate($ts1);
            }


            if($model->req_report_dates!=''){
                $dt2 = new \DateTime(date($model->req_report_dates.' H:i:s'));
                $ts2 = $dt2->getTimestamp();

                if($model->req_date_report > 1){
                    $data1 = $model->req_date_report-1;
                }else{
                    $data1 = $model->req_date_report;
                }

            $date_plus = date ("Y-m-d", strtotime("+".$data1." day", strtotime($model->req_report_dates)));
               $dt3 = new \DateTime(date($date_plus.' H:i:s'));
                $ts3 = $dt3->getTimestamp();
                $model->req_report_date = new \MongoDate($ts3);

                $dt = new \DateTime(date('Y-m-d H:i:s'));
                $ts = $dt->getTimestamp();

                // new
                $date_plus_1 = date ("Y-m-d", strtotime("+7 day", strtotime($date_plus)));
                $dt_1 = new \DateTime(date($date_plus_1.' H:i:s'));
                $ts4 = $dt_1->getTimestamp();

                $date_plus_2 = date ("Y-m-d", strtotime("+5 day", strtotime($date_plus_1)));
                $dt_2 = new \DateTime(date($date_plus_2.' H:i:s'));
                $ts5 = $dt_2->getTimestamp();


                $model->req_alert1z = new \MongoDate($ts3);
                $model->req_alert2z = new \MongoDate($ts4);
                $model->req_alert3z = new \MongoDate($ts5);

                $model->system_date2 = new \MongoDate($ts);
                $model->req_report_dates = new \MongoDate($ts2);
            }
            
            if($model->req_report_date1!=''){
                $dt6 = new \DateTime(date($model->req_report_date1.' H:i:s'));
                $ts6 = $dt6->getTimestamp();
                $req_report_date1 = new \MongoDate($ts6);
            }else{
                $req_report_date1 = '';
            }
             $model->req_report_date1 = $req_report_date1;
             $model->save();
             return $this->redirect($curl);
             //return $this->redirect(['index_update']);
        } else {
            return $this->render('update1', [
                'model' => $model,
            ]);
        }
    }

 public function actionUpdate1_out($id,$curl)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {




            if($model->req_report_date1!=''){
                $dt1 = new \DateTime(date($model->req_report_date1.' H:i:s'));
                $ts1 = $dt1->getTimestamp();
                $model->req_report_date1 = new \MongoDate($ts1);
            }

            // if($model->req_send_date!=''){
            //     $dt2 = new \DateTime(date($model->req_send_date.' H:i:s'));
            //     $ts2 = $dt2->getTimestamp();

            //     if($model->req_date_report > 1){
            //         $data1 = $model->req_date_report-1;
            //     }else{
            //         $data1 = $model->req_date_report;
            //     }

            //     $date_plus = date ("Y-m-d", strtotime("+".$data1." day", strtotime($model->req_send_date)));
            //     $dt3 = new \DateTime(date($date_plus.' H:i:s'));
            //     $ts3 = $dt3->getTimestamp();
            //     $model->req_report_date = new \MongoDate($ts3);

            //     $dt = new \DateTime(date('Y-m-d H:i:s'));
            //     $ts = $dt->getTimestamp();

            //     // new
            //     $date_plus_1 = date ("Y-m-d", strtotime("+7 day", strtotime($date_plus)));
            //     $dt_1 = new \DateTime(date($date_plus_1.' H:i:s'));
            //     $ts4 = $dt_1->getTimestamp();

            //     $date_plus_2 = date ("Y-m-d", strtotime("+5 day", strtotime($date_plus_1)));
            //     $dt_2 = new \DateTime(date($date_plus_2.' H:i:s'));
            //     $ts5 = $dt_2->getTimestamp();


            //     $model->req_alert1z = new \MongoDate($ts3);
            //     $model->req_alert2z = new \MongoDate($ts4);
            //     $model->req_alert3z = new \MongoDate($ts5);

            //     $model->system_date2 = new \MongoDate($ts);
            //     $model->req_send_date = new \MongoDate($ts2);
            // }



            $model->save();
            return $this->redirect($curl);
            //return $this->redirect(['index_update_out']);
        } else {
            return $this->render('update1_out', [
                'model' => $model,
            ]);
        }
    }


    public function actionAlert_1(){
        $searchModel = new ColRequest01Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('alert_1', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAlert_2(){
        $searchModel = new ColRequest02Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('alert_2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAlert_3(){
        $searchModel = new ColRequest03Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('alert_3', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUpdate_alert1($id){
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            if($model->req_alert1!=''){
                $dt1 = new \DateTime(date($model->req_alert1.' H:i:s'));
                $ts1 = $dt1->getTimestamp();
                $model->req_alert1 = new \MongoDate($ts1);
            }else{
                 $model->req_alert1 =="";
            }

            $model->save();
            return $this->redirect(['alert_1']);
        }else{
            return $this->render('update_alert1', [
                'model' => $model,
            ]);
        }
    }


   public function actionUpdate_alert3($id){
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            if($model->req_alert3!=''){
                $dt1 = new \DateTime(date($model->req_alert3.' H:i:s'));
                $ts1 = $dt1->getTimestamp();
                $model->req_alert3 = new \MongoDate($ts1);
            }else{
                 $model->req_alert3 =="";
            }

            if($model->req_alert2!=''){
                $dt2 = new \DateTime(date($model->req_alert2));
                $ts2 = $dt2->getTimestamp();
                $model->req_alert2 = new \MongoDate($ts2);
            }else{
                 $model->req_alert2 =="";
            }
            $model->save();
            return $this->redirect(['alert_3']);
        }else{
            return $this->render('update_alert3', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate_alert2($id){
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            if($model->req_alert2!=''){
                $dt1 = new \DateTime(date($model->req_alert2));
                $ts1 = $dt1->getTimestamp();
                $model->req_alert2 = new \MongoDate($ts1);
            }else{
                 $model->req_alert2 =="";
            }

            if($model->req_alert1!=''){
                $dt2 = new \DateTime(date($model->req_alert1));
                $ts2 = $dt2->getTimestamp();
                $model->req_alert1 = new \MongoDate($ts2);
            }else{
                 $model->req_alert1 =="";
            }


            $model->save();
            return $this->redirect(['alert_2']);
        }else{
            return $this->render('_form_update_alert2', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate_progress($id,$curl){
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();

            //echo $post['req_update_date1']."dsds";
            $count1 = count($model['req_update']);
            if($post['req_update_date1']!='' || $post['req_update_detail1']!=''){
                $count2 = $count1+1;
                $st ="a";
            }else{
                $count2 = $count1;
                $st = "b";
            }

            //echo $model['req_update_date1'] .$model['req_update_detail1'].$model['req_update_user1'];
            //update
            $num1 =1;
            for($i=0; $i<$count2; $i++){
             if($i == ($count2-$num1) && $st == "a"){
                if($post['req_update_date1']!=''){
                    $dt2 = new \DateTime(date($post['req_update_date1'].' H:i:s'));
                    $ts2 = $dt2->getTimestamp();
                    $times2= new \MongoDate($ts2);
                }else{
                    $times2 ="";
                }

                 $arrayName[$i] = array('req_update_date' => $times2,
                    'req_update_detail' => $post['req_update_detail1'],
                    'req_update_user' => $post['req_update_user1']);
                 $datez = split('-',$post['req_update_date1']);$uyear = $datez[0] + 543;
                 $udate = $datez[2].'-'.$datez[1].'-'.$uyear;

                 $string1 .= "วันที่: ".$udate."รายละเอียด: ".$post['req_update_detail1']."ผู้บันทึก :".$post['req_update_user1']."<br>";


             }else{
                if($model['req_update'][$i]['req_update_date']!=''){
                    $dt1 = new \DateTime(date($model['req_update'][$i]['req_update_date'].' H:i:s'));
                    $ts1 = $dt1->getTimestamp();
                    $times1= new \MongoDate($ts1);
                }else{
                    $model->req_update[$i]['req_update_date'] ="";
                }

                 $arrayName[$i] = array('req_update_date' => $times1,
                    'req_update_detail' => $model['req_update'][$i]['req_update_detail'],
                    'req_update_user' => $model['req_update'][$i]['req_update_user']);
                 $datez = split('-',$model['req_update'][$i]['req_update_date']);$uyear = $datez[0] + 543;
                 $udate = $datez[2].'-'.$datez[1].'-'.$uyear;
                 $string1 .= "วันที่: ".$udate."รายละเอียด: ".$model['req_update'][$i]['req_update_detail']."ผู้บันทึก :".$model['req_update'][$i]['req_update_user']."<br>";
             }



            }

            $model->req_update_show = $string1;

            //print_r($arrayName);
            $model->req_update = $arrayName;
            $model->save();
            return $this->redirect(['update_progress', 'id' => (string)$id, 'curl' => $curl]);

        }else{
            return $this->render('update_progress', [
                'model' => $model,
                'curl' => $curl,
            ]);
        }
    }

    public function actionUpdate_progress_out($id,$curl){
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();

            //echo $post['req_update_date1']."dsds";
            $count1 = count($model['req_update']);
            if($post['req_update_date1']!='' || $post['req_update_detail1']!=''){
                $count2 = $count1+1;
                $st ="a";
            }else{
                $count2 = $count1;
                $st = "b";
            }

            //echo $model['req_update_date1'] .$model['req_update_detail1'].$model['req_update_user1'];
            //update
            $num1 =1;
            for($i=0; $i<$count2; $i++){
             if($i == ($count2-$num1) && $st == "a"){
                if($post['req_update_date1']!=''){
                    $dt2 = new \DateTime(date($post['req_update_date1'].' H:i:s'));
                    $ts2 = $dt2->getTimestamp();
                    $times2= new \MongoDate($ts2);
                }else{
                    $times2 ="";
                }

                 $arrayName[$i] = array('req_update_date' => $times2,
                    'req_update_detail' => $post['req_update_detail1'],
                    'req_update_user' => $post['req_update_user1']);
                 $datez = split('-',$post['req_update_date1']);$uyear = $datez[0] + 543;
                 $udate = $datez[2].'-'.$datez[1].'-'.$uyear;

                 $string1 .= "วันที่: ".$udate."รายละเอียด: ".$post['req_update_detail1']."ผู้บันทึก :".$post['req_update_user1']."<br>";


             }else{
                if($model['req_update'][$i]['req_update_date']!=''){
                    $dt1 = new \DateTime(date($model['req_update'][$i]['req_update_date'].' H:i:s'));
                    $ts1 = $dt1->getTimestamp();
                    $times1= new \MongoDate($ts1);
                }else{
                    $model->req_update[$i]['req_update_date'] ="";
                }

                 $arrayName[$i] = array('req_update_date' => $times1,
                    'req_update_detail' => $model['req_update'][$i]['req_update_detail'],
                    'req_update_user' => $model['req_update'][$i]['req_update_user']);
                 $datez = split('-',$model['req_update'][$i]['req_update_date']);$uyear = $datez[0] + 543;
                 $udate = $datez[2].'-'.$datez[1].'-'.$uyear;
                 $string1 .= "วันที่: ".$udate."รายละเอียด: ".$model['req_update'][$i]['req_update_detail']."ผู้บันทึก :".$model['req_update'][$i]['req_update_user']."<br>";
             }



            }

            $model->req_update_show = $string1;

            //print_r($arrayName);
            $model->req_update = $arrayName;
            $model->save();
            return $this->redirect(['update_progress_out', 'id' => (string)$id, 'curl' => $curl]);

        }else{
            return $this->render('update_progress_out', [
                'model' => $model,
                'curl' => $curl,
            ]);
        }
    }

    public function actionDel_progress($id,$number,$curl){
        $model = $this->findModel($id);
        $count1 =  count($model->req_update);

           for($i=0; $i<$count1;$i++){
               $arrayName[$i] = array('req_update_date' => $model->req_update[$i]['req_update_date'],
                    'req_update_detail' => $model->req_update[$i]['req_update_detail'],
                    'req_update_user' => $model->req_update[$i]['req_update_user']
                );
           }

            unset($arrayName[$number]);
            $model->req_update = array_values($arrayName);
            foreach ($model->req_update as $key => $value) {

               $ndate = date('Y-m-d',$value['req_update_date']->sec);
                $ndate1 = explode("-",$ndate);
                $ndate2 = $ndate1[0]+543;
                $ndate3 = $ndate1[2]."-".$ndate1[1]."-".$ndate2;

                $string2 .= "วันที่: ".$ndate3."รายละเอียด: ".$value['req_update_detail']."ผู้บันทึก :".$value['req_update_user']."<br>";
            }

            $model->req_update_show = $string2;
            $model->save();

            return $this->redirect(['update_progress', 'id' => (string)$id, 'curl' => $curl]);

    }

    public function actionDel_progress_out($id,$number,$curl){
        $model = $this->findModel($id);
        $count1 =  count($model->req_update);

           for($i=0; $i<$count1;$i++){
               $arrayName[$i] = array('req_update_date' => $model->req_update[$i]['req_update_date'],
                    'req_update_detail' => $model->req_update[$i]['req_update_detail'],
                    'req_update_user' => $model->req_update[$i]['req_update_user']
                );
           }

            unset($arrayName[$number]);
            $model->req_update = array_values($arrayName);
            foreach ($model->req_update as $key => $value) {

               $ndate = date('Y-m-d',$value['req_update_date']->sec);
                $ndate1 = explode("-",$ndate);
                $ndate2 = $ndate1[0]+543;
                $ndate3 = $ndate1[2]."-".$ndate1[1]."-".$ndate2;

                $string2 .= "วันที่: ".$ndate3."รายละเอียด: ".$value['req_update_detail']."ผู้บันทึก :".$value['req_update_user']."<br>";
            }

            $model->req_update_show = $string2;
            $model->save();

            return $this->redirect(['update_progress_out', 'id' => (string)$id, 'curl' => $curl]);

    }

    /**
     * Deletes an existing ColRequest model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $_id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDelete_out($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index_out']);
    }

    /**
     * Finds the ColRequest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $_id
     * @return ColRequest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ColRequest::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
