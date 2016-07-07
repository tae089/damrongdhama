<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionGraph()
    {
        return $this->render('graph');
    }
    public function actionGraph1()
    {
        return $this->render('graph1');
    }
    public function actionGraph2()
    {
        return $this->render('graph2');
    }
    public function actionGraph3()
    {
        return $this->render('graph3');
    }
    public function actionGraph4()
    {
        return $this->render('graph4');
    }
    public function actionGraph5()
    {
        return $this->render('graph5');
    }
    public function actionGraph_menu1()
    {
        if(Yii::$app->request->post())
        {
            return $this->render('graph_menu1',[
                'dp1'=>$_POST['dp1'],
                'dp2'=>$_POST['dp2'],
                'dd1'=>$_POST['dd1'],
                ]);
        }else{
            return $this->render('graph_menu1');
        }
        
    }

    public function actionGraph_menu2()
    {
        if(Yii::$app->request->post())
        {
            return $this->render('graph_menu2',[
                'yy1'=>$_POST['yy1'],
                'dd1'=>$_POST['dd1'],
                ]);
        }else{
            return $this->render('graph_menu2');
        }
    }
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
