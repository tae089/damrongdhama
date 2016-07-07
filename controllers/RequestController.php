<?php

namespace app\controllers;

use Yii;
use app\models\Request;
use app\models\RequestSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ColRequest;
use app\models\ColRequestSearch;
use app\models\ColRequestSearch01;
use app\models\ColRequest07Search;
use app\models\ColRequest06Search;
/**
 * RequestController implements the CRUD actions for Request model.
 */
class RequestController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Request models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ColRequest07Search();
      /*  if(Yii::$app->request->queryParams){
            if(Yii::$app->request->queryParams["RequestSearch"]["req_topic_date"]!=''){
                Yii::$app->request->queryParams["RequestSearch"]["req_topic_date"]=  new \MongoDate(strtotime(Yii::$app->request->queryParams["RequestSearch"]["req_topic_date"]));
                var_dump(Yii::$app->request->queryParams["RequestSearch"]["req_topic_date"]);
            }
        }*/

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //var_dump($dataProvider);
        $dataProvider->pagination->pageSize=10;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndex1()
    {
        $searchModel = new ColRequest06Search();
      /*  if(Yii::$app->request->queryParams){
            if(Yii::$app->request->queryParams["RequestSearch"]["req_topic_date"]!=''){
                Yii::$app->request->queryParams["RequestSearch"]["req_topic_date"]=  new \MongoDate(strtotime(Yii::$app->request->queryParams["RequestSearch"]["req_topic_date"]));
                var_dump(Yii::$app->request->queryParams["RequestSearch"]["req_topic_date"]);
            }
        }*/

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //var_dump($dataProvider);
        $dataProvider->pagination->pageSize=10;
        return $this->render('index1', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single Request model.
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
     * Creates a new Request model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Request();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => (string)$model->_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionReport1()
    {
        if(Yii::$app->request->post())
        {
            $dday = $_POST['dday'];
            $dmonth = $_POST['dmonth'];
            $dday1 = $_POST['dday1'];
            $dmonth1 = $_POST['dmonth1'];
            if(trim($dday)!='' && trim($dmonth) !='' && trim($dday1) !='' && trim($dmonth1) !='')
            {
                 return $this->render('report1',['dday'=>$dday,'dmonth'=>$dmonth,'dday1'=>$dday1,'dmonth1'=>$dmonth1]);
             }else{
                return $this->render('report1');
             }

        }else{
            return $this->render('report1');
        }

    }

    public function actionReport2(){

        if (Yii::$app->request->post()) {

        if(Yii::$app->request->post('dp1')!='' && Yii::$app->request->post('dp2')!=''){
            $data = explode('-',Yii::$app->request->post('dp1'));
            $dday = $data[2];
            $dmonth = $data[1];
            $dyear = $data[0]+543;
            
            $data1 = explode('-',Yii::$app->request->post('dp2'));
            $dday1 = $data1[2];
            $dmonth1 = $data1[1];
            $dyear1 = $data1[0]+543;

            return $this->render('report2',['dday'=>$dday,'dmonth'=>$dmonth,'dyear'=>$dyear,'dday1'=>$dday1,'dmonth1'=>$dmonth1,'dyear1'=>$dyear1]);
        }else{
            return $this->render('report2');
        }

        }else{
            return $this->render('report2');
        }
    }
    /**
     * Updates an existing Request model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $_id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => (string)$model->_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Request model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $_id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Request model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $_id
     * @return Request the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Request::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
