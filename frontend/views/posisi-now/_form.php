<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PosisiNow */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="posisi-now-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_plat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lat')->textInput() ?>

    <?= $form->field($model, 'longi')->textInput() ?>

    <?= $form->field($model, 'nama_posisi')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
