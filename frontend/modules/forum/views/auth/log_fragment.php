<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>

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