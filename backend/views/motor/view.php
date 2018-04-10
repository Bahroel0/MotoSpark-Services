<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Motor */

$this->title = $model->id_plat;
$this->params['breadcrumbs'][] = ['label' => 'Motors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="motor-view">

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
            'id_user',
            'nama_motor',
            [
                'attribute' => 'status',
                'label'     => 'Status Parkir',
                'format'    => 'raw',
                'value'     => function($model){
                    if($model->status == 0){
                        return 'Tidak Parkir';
                    }else{
                        return 'Sedang Parkir';
                    }
                }
            ],
            'tanggal_add',
            [
                'attribute' =>'foto',
                'value'     => $model->foto,
                'format'    => ['image',['width' => 100,'heigth' => 100]],
            ],
        ],
    ]) ?>

</div>
