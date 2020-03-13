<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Email */

$this->title = 'Update Email: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Email', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->idemail]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="email-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
