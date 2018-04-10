<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\HistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Riwayat Posisi';
$this->params['breadcrumbs'][] = 'Riwayat';
?>
<div class="history-index">

    <h1>Data Riwayat</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_history',
            'id_plat',
            'lat_awal',
            'long_awal',
            'lat_akhir',
            //'long_akhir',
            //'tanggal',
            //'jarak',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
