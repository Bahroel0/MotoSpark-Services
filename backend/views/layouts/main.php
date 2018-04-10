<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'MotoSpark',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    // $menuItems = [
    //     // ['label' => 'Home', 'url' => ['/site/index']],
    //     ['label' => 'User', 'url' => ['/user']],
    //     ['label' => 'Motor', 'url' => ['/motor']],
    //     ['label' => 'Posisi', 'url' => ['/posisi-now']],
    //     ['label' => 'Riwayat', 'url' => ['/history']],
    // ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'. Html::beginForm(['/user'], 'post'). Html::submitButton('User', ['class' => 'btn btn-link logout']). 
                        html::endForm(). '</li>'.
                        '<li>'. Html::beginForm(['/motor'], 'post'). Html::submitButton('Motor', ['class' => 'btn btn-link logout']). 
                        html::endForm(). '</li>'.
                        '<li>'. Html::beginForm(['/posisi-now'], 'post'). Html::submitButton('Posisi', ['class' => 'btn btn-link logout']).
                        html::endForm(). '</li>'.
                        '<li>'. Html::beginForm(['/history'], 'post'). Html::submitButton('Riwayat', ['class' => 'btn btn-link logout']).
                        html::endForm(). '</li>'.
                        '<li>'. Html::beginForm(['/site/logout'], 'post'). Html::submitButton('Logout', ['class' => 'btn btn-link logout']).
                        html::endForm(). '</li>'
                        ;
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <a href="http://localhost/MotoSpark-Services/frontend/landing">MotoSpark Team</a> 2017</p>

        <p class="pull-right"><?= Yii::powered()  ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
