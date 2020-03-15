<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use rmrevin\yii\fontawesome\FA;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Email';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-index">
    <?= Html::a(FA::icon('plus') . ' ' . $this->title, ['create'], ['class' => 'btn btn-success float-right']) ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'email:email',
            'status:boolean',

            ['class' => 'app\components\ButtonActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>