<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PosisiNowSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posisi Motor';
$this->params['breadcrumbs'][] = $this->title;

?>
    <h1>Data Posisi Motor</h1>
<div class="posisi-now-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_plat',
            'lat',
            'longi',
            'nama_posisi',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
