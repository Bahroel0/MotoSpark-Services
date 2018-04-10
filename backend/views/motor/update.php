<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Motor */

$this->title = 'Update Motor: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Motors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_plat, 'url' => ['view', 'id' => $model->id_plat]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="motor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
