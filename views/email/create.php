<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Email */

$this->title = 'Tambah Email';
$this->params['breadcrumbs'][] = ['label' => 'Email', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
