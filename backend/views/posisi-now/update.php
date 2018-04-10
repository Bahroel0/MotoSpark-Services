<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PosisiNow */

$this->title = 'Update Posisi Now: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Posisi Nows', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_plat, 'url' => ['view', 'id' => $model->id_plat]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="posisi-now-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
