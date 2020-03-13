<?php

use yii\bootstrap\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use rmrevin\yii\fontawesome\FA;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Armada';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-index">
    <?= Html::a(FA::icon('plus') . ' ' . $this->title, ['create'], ['class' => 'btn btn-success float-right']) ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'owner',
            'phone',
            'seat',
            //'status',

            ['class' => 'app\components\ButtonActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>