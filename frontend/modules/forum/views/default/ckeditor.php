<?php


use mihaildev\ckeditor\CKEditor;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'text')->widget(CKEditor::className(),[
'editorOptions' => [
'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
'inline' => false, //по умолчанию false
],
]);?>

<div class="form-group">
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

