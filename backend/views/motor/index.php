<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MotorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Motor';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="motor-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <br>

    <p>
        <?= Html::a('Tambah Motor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_plat',
            'id_user',
            'nama_motor',
            'status',
            'tanggal_add',
            //'foto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
