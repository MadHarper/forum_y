<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

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
                            <ul class="nav navbar-nav navbar-right">
                                <?php if(!Yii::$app->user->isGuest): ?>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= Yii::$app->user->getIdentity()->username ;?> <span class="glyphicon glyphicon-user pull-right"></span></a>
                                    <ul class="dropdown-menu user_service">
                                        <li><a href="#">Account Settings <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">User stats <span class="glyphicon glyphicon-stats pull-right"></span></a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Messages <span class="badge pull-right"> 42 </span></a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Favourites Snippets <span class="glyphicon glyphicon-heart pull-right"></span></a></li>
                                        <li class="divider"></li>
                                        <li><?= Html::a("Выйти <span class='glyphicon glyphicon-log-out pull-right'></span>", Url::to(['/forum/auth/logout']), ['data-method' => 'POST']) ?></li>
                                    </ul>
                                </li>
                                <li class="top_grlyph">
                                    <a href="#">
                                        <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
                                        <span class="animated flash badge globalNotificationCount right" id="globMesCnt">4</span>
                                    </a>
                                </li>

                                <li class="top_grlyph">
                                    <a href="#" id="last_glyph"><span class="glyphicon glyphicon-globe"   aria-hidden="true"></span>
                                        <span class="animated flash badge messagelNotificationCount right" id="mesMesCnt">12</span>
                                    </a>
                                </li>
                                <?php else: ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Войти <span class="caret"></span></a>
                                    <ul class="dropdown-menu enter_sandman">
                                        <li>
                                            <div class="input-group login_div">
                                                <form id="login-form" action="<?= Url::toRoute(['/forum/auth/ajaxlogin']);?>" method="post" role="form">
                                                    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken; ?>">
                                                    <div class="form-group field-loginform-username required">
                                                        <input type="text" class="form-control" id="loginform-username" name="LoginForm[username]" placeholder="Имя...">
                                                        <p class="help-block help-block-error"></p>
                                                    </div>
                                                    <div class="form-group field-loginform-password required">
                                                        <input type="password" class="form-control" id="loginform-password" name="LoginForm[password]" placeholder="Пароль...">
                                                        <p class="help-block help-block-error"></p>
                                                    </div>
                                                    <div class="form-group field-loginform-rememberme">
                                                        <div class="checkbox">
                                                            <label for="Запомнить ">
                                                                <input type="hidden" name="LoginForm[rememberMe]" value="0"><input type="checkbox" id="loginform-rememberme" name="LoginForm[rememberMe]" value="1" checked="">
                                                                <span>Запомнить меня</span>
                                                            </label>
                                                            <p class="help-block help-block-error"></p>

                                                        </div>
                                                    </div>
                                                    <div style="color:#999;margin:1em 0">
                                                        If you forgot your password you can <a href="/site/request-password-reset">reset it</a>.
                                                    </div>

                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-default btn_submit" id="login_ajax_sbmt" name="login-button">Войти</button>                </div>

                                                </form>

                                            </div><!-- /input-group -->
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="<?= Url::to(['/registr']);?>">Регистрация</a></li>
                                <?php endif; ?>
                            </ul>
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
