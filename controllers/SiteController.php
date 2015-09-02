<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Remaining;
use yii\base\Object;

class SiteController extends Controller
{
//     public $defaultAction = "Remaining";
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
//     	header("content-type:text/html;charset=gbk");
//     	header("Content-type:text/html;charset=utf-8");
//      echo "index";
        return $this->actionRemaining();
        // return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
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
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionCheck_user(){
        $app = Remaining::findAll(['id'=>1]);
        var_dump($app);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    function actionRemaining(){
    	if(isset($_GET['sub'],$_GET['desc'],$_GET['money'])){
			//header("Location: www.baidu.com");
// 			var_dump($_GET);
			$_obj = new Remaining();
			$_obj->create_at = date("Y-m-d H:i:s");
			$_obj->detail = $_GET['desc'];
			$_obj->id_str = uniqid();
			$_obj->amount = $_GET['money'];
			$_obj->insert();
			if($_obj->hasErrors()){
				var_dump($_obj->getErrors());
			}
			
//     		echo 'ok<br/>';
    		return $this->display_10_records();
    	}else{
    		return $this->display_10_records();
    	}
    }
    function  display_10_records(){

//     	echo date("Y-m-d H:i:s");
    	$_records_num = 10;
//     	$_records = Remaining::find()->limit($_records_num)->orderBy("create_at desc")->all();
    	$_records = Remaining::find()->orderBy("create_at desc")->all();
    	return $this->renderPartial("display",[
    			'rows'=>$_records,
    	]);
    }
}
