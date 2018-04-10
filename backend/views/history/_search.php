<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\HistorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="history-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_history') ?>

    <?= $form->field($model, 'id_plat') ?>

    <?= $form->field($model, 'lat_awal') ?>

    <?= $form->field($model, 'long_awal') ?>

    <?= $form->field($model, 'lat_akhir') ?>

    <?php // echo $form->field($model, 'long_akhir') ?>

    <?php // echo $form->field($model, 'tanggal') ?>

    <?php // echo $form->field($model, 'jarak') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
