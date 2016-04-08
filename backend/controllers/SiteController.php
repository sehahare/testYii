<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'language'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'set-cookie', 'show-cookie'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                  //  'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    
     public function actionSignup()
    {
        $authItems = AuthItem::find()->all();
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
            'authItems' => $authItems,
        ]);
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    
    public function actionSetCookie(){
        $cookie = new yii\web\Cookie([
            'name'=>'test', 
            'value' => 'test cookie value'
        ]);
        Yii::$app->getResponse()->getCookies()->add($cookie);
    }

    public function actionShowCookie(){
        if( Yii::$app->getRequest()->getCookies()->has('test')){
            print_r(Yii::$app->getRequest()->getCookies()->getValue('test'));
            
        }
    }

    public function actionIndex()
    {
    
        
        return $this->render('index');
    }

    public function actionLogin()
    {
        $this->layout = 'loginLayout';
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
    
    public function actionLanguage(){
        if(isset($_POST['lang'])){
            Yii::$app->language = $_POST['lang'];
            $cookie = new yii\web\Cookie([
                'name'=>'lang', 
                'value'=>$_POST['lang']
            ]);
            Yii::$app->getResponse()->getCookies()->add($cookie);
        }
    }
    

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
