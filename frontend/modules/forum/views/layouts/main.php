<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

\frontend\assets\MainAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <div class="back">

        <div class="container-fluid wrap">
            <div class="row">
                <div class="col-md-12 top">
                    <head>
                        <nav class="navbar navbar-inverse">
                            ...
                        </nav>
                    </head>
                </div>
            </div>


            <div class="row" id="main">

                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Library</a></li>
                            <li class="active">Data</li>
                        </ol>
                    </div>
                </div>


                <?php $messages = Yii::$app->session->getAllFlashes();?>
                <?php if($messages): ?>
                    <div class="row">
                        <div class="col-md-12">
                        <?php foreach($messages as $type => $message): ?>
                            <div class="alert alert-<?= $type ?>" role="alert"><?= $message ?></div>
                        <?php endforeach; ?>

                        </div>
                    </div>
                <?php endif;?>

                <?= $content;?>

                <div class="col-md-12 gfooter">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Library</a></li>
                        <li class="active">Data</li>
                    </ol>
                </div>
            </div>




        </div>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
