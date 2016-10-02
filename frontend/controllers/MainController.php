<?php

namespace frontend\controllers;

use frontend\models\Image;
use frontend\components;

class MainController extends \yii\web\Controller
{
    public function actionIndex()
    {
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
