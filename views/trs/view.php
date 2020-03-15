<?php

use app\components\Helper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Trs */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Trs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="trs-view">
    <p class="float-right">
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'phone',
            'address',
            'startdate',
            'estarrival',
            'charge',
            'type',
            // 'status',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model) {
                    return Helper::getStatusOrder($model->status);
                }
            ],
            'idvehicle0.name',
        ],
    ]) ?>

</div>
