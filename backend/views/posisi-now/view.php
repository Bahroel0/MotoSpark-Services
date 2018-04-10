<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PosisiNow */

$this->title = $model->id_plat;
$this->params['breadcrumbs'][] = ['label' => 'Posisi Nows', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posisi-now-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_plat], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_plat], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_plat',
            'lat',
            'longi',
            'nama_posisi',
        ],
    ]) ?>

</div>
