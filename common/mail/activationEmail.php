<?php



use yii\helpers\Html;

echo 'Здравствуйте, ' . Html::encode($user->username);

echo Html::a("Для активации аккаунта на форуме перейдите по ссылке ",
            Yii::$app->urlManager->createAbsoluteUrl(
                [
                    'forum/auth/activate',
                    'key' => $user->email_confirm_token
                ]
            ));




