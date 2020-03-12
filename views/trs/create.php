<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Trs */

$this->title = 'Create Trs';
$this->params['breadcrumbs'][] = ['label' => 'Trs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
