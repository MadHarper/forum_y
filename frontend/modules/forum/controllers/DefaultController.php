<?php

namespace frontend\modules\forum\controllers;

use yii\web\Controller;
use frontend\modules\forum\models\Category;
use frontend\modules\forum\models\Post;
use yii\httpclient\Client;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $categories = Category::find()->where(['active' => true, 'parent_id' => 0])->all();

        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('get')
            ->setUrl('https://api.fantasydata.net/v3/nfl/scores/json/ScoresByWeek/2016reg/1')
            ->addHeaders(['Ocp-Apim-Subscription-Key' => 'a7837db6fb014274aa4b6c14f876803a'])
            ->send();
        if ($response->isOk) {

            $games = json_decode($response->content);
        }

        return $this->render('index', ['categories' => $categories, 'games' => $games]);
    }

    public function actionScore()
    {

        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('get')
            ->setUrl('https://api.fantasydata.net/v3/nfl/scores/json/ScoresByWeek/2016reg/1')
            ->addHeaders(['Ocp-Apim-Subscription-Key' => 'a7837db6fb014274aa4b6c14f876803a'])
            ->send();
        if ($response->isOk) {

            print_r(json_decode($response->content));
        }

        echo 'all';
        die;

        return $this->render('index', ['categories' => $categories]);
    }





    public function actionCkeditor(){

        $model = new Post();


        return $this->render('ckeditor', ['model' => $model]);
    }
}
