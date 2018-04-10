<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PosisiNow */

$this->title = 'Create Posisi Now';
$this->params['breadcrumbs'][] = ['label' => 'Posisi Nows', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posisi-now-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
