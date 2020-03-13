<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Starttime */

$this->title = 'Tambah Waktu Berangkat';
$this->params['breadcrumbs'][] = ['label' => 'Waktu Berangkat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="starttime-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
