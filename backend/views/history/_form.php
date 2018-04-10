<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\History */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="history-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_plat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lat_awal')->textInput() ?>

    <?= $form->field($model, 'long_awal')->textInput() ?>

    <?= $form->field($model, 'lat_akhir')->textInput() ?>

    <?= $form->field($model, 'long_akhir')->textInput() ?>

    <?= $form->field($model, 'tanggal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jarak')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
