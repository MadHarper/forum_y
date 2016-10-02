<?php


namespace frontend\modules\forum\controllers;

use Yii;
use common\models\User;
use frontend\models\SignupForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\modules\forum\models\AccountActivation;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class AuthController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'reg', 'activate'],
                'rules' => [
                    [
                        'actions' => ['reg', 'activate'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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


    public function actionReg()
    {
        $emailActivation = Yii::$app->params['emailActivation'];
        $model = $emailActivation ? new SignupForm(['scenario' => 'emailActivation']) : new SignupForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {

                if($user->status === User::STATUS_ACTIVE){
                    if (Yii::$app->getUser()->login($user)) {
                        return $this->goHome();
                    }
                }
                else{
                    if($model->sendActivationEmail($user)){
                        Yii::$app->session->setFlash('succsess', 'Письмо отправлено на емейл <strong>'.
                                                    Html::encode($user->email) . '</strong> (Проверьте папку "спам")');
                    }else{
                        Yii::$app->session->setFlash('error', ' Ошибка. Не удалось отправить письмо');
                        Yii::error('Ошибка регистрации');
                    }
                    return $this->refresh();
                }

            }
        }

        return $this->render('reg', [
            'model' => $model,
        ]);

    }



    public function actionActivate($key)
    {
        try{
            $account= new AccountActivation($key);
        }
        catch(InvalidParamException $e){
            throw new BadRequestHttpException($e->getMessage());
        }

        if($account->activateAccount()){
            Yii::$app->session->setFlash('success', 'Аккаунт успешно активирован!');
            /*
             * Здесь сразу реализовать автоматическое залогирование
             */

        }else{
            Yii::$app->session->setFlash('error', 'Ошибка при активации аккаунта');
        }
        return $this->redirect(Url::to(['/']));
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
}