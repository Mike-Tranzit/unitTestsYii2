<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\{Controller, Response};
use yii\filters\VerbFilter;
use app\models\{ LoginForm, ContactForm, Usernames, Example, AdvancedExample, DorFabric };

class SiteController extends Controller
{

    public $load = false;

    /**
     * {@inheritdoc}
     */
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

    /**
     * {@inheritdoc}
     */
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->load = true;
        return $this->render('index');
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionExample()
    {
        $ex = new Example(); // fix fix fix fix
        // $ex->on(Example::TEST1, ['\app\models\Example', 'foo'], ['123'=>123]);
        // $ex->trigger(Example::TEST1);

        echo $ex->test();
        echo $ex->testing();
        die();

        $model = new Usernames(); // Тестовый комментарий
                                // Тестовый комментарий fix 55
                                // Тестовый комментарий fix 60
                                // Тестовый комментарий fix 66
                                // Тестовый комментарий fix 67
                                // Тестовый комментарий fix 68
                                // Тестовый комментарий fix 69
                                // Тестовый комментарий fix 74
                                // Тестовый комментарий fix 75
        if($model->load(Yii::$app->request->post())) {
            //var_dump(\Yii::$app->request->post());
            //var_dump($model);
        }
        return $this->render('example', [
            'model' => $model,
        ]);
    }

    /** 
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        
        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
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

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
