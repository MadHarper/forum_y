<?php

namespace frontend\modules\forum;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'frontend\modules\forum\controllers';

    public function init()
    {
        parent::init();
        $this->layout ='main';
        // custom initialization code goes here
    }
}
