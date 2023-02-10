<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;


$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>
<?= $form->field($model, 'title') ?>
<?= $form->field($model, 'text')->widget(CKEditor::className(), [
    'editorOptions' => [
        'preset' => 'standart', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
        'inline' => false, //по умолчанию false
    ],
]); ?>
<?= $form->field($model, 'data') ?>
<?= $form->field($model, 'likes') ?>
<?= $form->field($model, 'hits') ?>

        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end() ?>