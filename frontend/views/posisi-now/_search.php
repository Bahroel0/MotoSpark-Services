<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PosisiNowSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="posisi-now-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_plat') ?>

    <?= $form->field($model, 'lat') ?>

    <?= $form->field($model, 'longi') ?>

    <?= $form->field($model, 'nama_posisi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
