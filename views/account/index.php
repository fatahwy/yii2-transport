<?php

use rmrevin\yii\fontawesome\FA;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Pjax;

/* @var $this View */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Akun';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-index">
    <p class="float-right">
        <?= Html::a(FA::icon('plus') . ' ' . $this->title, ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'username',
            'password',
            'status',
            'lastlogin',
            ['class' => 'app\components\ButtonActionColumn'],
        ],
    ]);
    ?>

    <?php Pjax::end(); ?>

</div>
