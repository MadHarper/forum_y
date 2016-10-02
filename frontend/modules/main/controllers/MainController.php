<?php

namespace app\modules\main\controllers;

use yii\web\Controller;

class MainController extends Controller
{

    public function actionIndex()
    {
        $this->layout = 'bootstrap';
        return $this->render('index');
    }


    public function actionTest()
    {

        $mail = \YII::$app->Common;
        $mail::sendMail('alex_maykop@yahoo.com', 'это работает', 'привет, это реально работает', '123тест');



        $image = Image::getImageUrl();
        return $this->render('test', ['my_image' => $image]);
    }

}
