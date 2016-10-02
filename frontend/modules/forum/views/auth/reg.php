<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row" id="central">
    <div class="col-md-9 theme forum-list">

        <div class="site-signup">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>Заполните поля:</p>

            <div class="row">
                <div class="col-lg-5">


                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                    <?= $form->field($model, 'username') ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <div class="form-group">
                        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                    <?php if($model->scenario === 'emailActivation'):?>
                        <i>На указанный имейл будет отправлено письмо для активации.</i>
                    <?php endif;?>
                </div>



            </div>
        </div>

    </div>
</div>