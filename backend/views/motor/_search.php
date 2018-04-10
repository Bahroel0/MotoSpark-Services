<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MotorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="motor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_plat') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'nama_motor') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'tanggal_add') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
