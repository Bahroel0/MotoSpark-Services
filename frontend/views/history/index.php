<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\HistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Histories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create History', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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
