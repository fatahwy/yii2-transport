<?php

use rmrevin\yii\fontawesome\FA;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Pjax;

/* @var $this View */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Waktu Berangkat';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="starttime-index">

    <?= Html::a(FA::icon('plus') . '' . $this->title, ['create'], ['class' => 'btn btn-success']) ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'starttime',
            ['class' => 'app\components\ButtonActionColumn'],
        ],
    ]);
    ?>

    <?php Pjax::end(); ?>

</div>
