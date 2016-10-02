<?php

namespace app\modules\main\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $mail = \Yii::$app->Common;;

        $mail->sendMail('alex_maykop@yahoo.com', 'это работает', 'привет, это реально работает', '123тест');

        $aaa = "Вывод сообщения ААА!!!!!!!";
        $bbb = "Вывод сообщения ААА!!!!!!!";

        $this->layout = 'bootstrap';
        return $this->render('index', ['aaa' => $aaa, 'bbb' => $bbb]);
    }
}
