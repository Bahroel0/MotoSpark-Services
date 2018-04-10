<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Motor */

$this->title = 'Tambahkan Motor';
$this->params['breadcrumbs'][] = ['label' => 'Data Motor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="motor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
