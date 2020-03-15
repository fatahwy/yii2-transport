<?php
/* @var $this View */

use app\components\Helper;
use kartik\date\DatePicker;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\web\View;

$this->title = Yii::$app->name;
$ispending = $typesubmit == Helper::TYPE_PENDING;
$istoday = $typesubmit == Helper::TYPE_TODAY;
$isvip = $typesubmit == Helper::TYPE_VIP;
$pendingtab = $ispending ? 'active' : '';
$todaytab = $istoday ? 'active' : '';
$viptab = $isvip ? 'active' : '';
$pendingbody = $pendingtab ?: 'fade';
$todaybody = $todaytab ?: 'fade';
$vipbody = $viptab ?: 'fade';
?>

<div class="container">
    <h1>Pemesanan</h1>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link <?= $pendingtab  ?>" data-toggle="tab" href="#home">Order T1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $todaytab ?>" data-toggle="tab" href="#menu1">Hari Ini</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $viptab ?>" data-toggle="tab" href="#menu2">VIP</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div id="home" class="container tab-pane <?= $pendingbody ?>"><br>
            <h3>Order T1</h3>
            <div class="trs-form">

                <?php $form = ActiveForm::begin(); ?>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                        <div class="row">
                            <div class="col-md-6">
                                <?=
                                    $form->field($model, 'startdate')->widget(DatePicker::classname(), [
                                        'options' => ['placeholder' => 'Tanggal Berangkat'],
                                        'language' => 'id',
                                        'type' => DatePicker::TYPE_INPUT,
                                        'pluginOptions' => [
                                            'startDate' => date("Y-m-d", strtotime('+2 days')),
                                            'format' => 'yyyy-mm-dd',
                                            'autoclose' => true
                                        ]
                                    ]);
                                ?>
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($model, 'time')->dropDownList([NULL => '-- Pilih Jam Berangkat --'] + $timedepart) ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <?= $form->field($model, 'phone')->textInput(['type' => 'number']) ?>

                        <?= $form->field($model, 'address')->textarea() ?>
                    </div>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Simpan', ['class' => 'btn btn-success', 'name' => Helper::BTN_SAVE, 'value' => Helper::TYPE_PENDING]) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>

        </div>
        <div id="menu1" class="container tab-pane <?= $todaybody ?>"><br>
            <h3>Hari Ini</h3>
            <div class="trs-form">

                <?php $form = ActiveForm::begin(); ?>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'id' => 'today-name']) ?>

                        <?= $form->field($model, 'idvehicle')->dropDownList([NULL => '-- Pilih Kendaraan --'] + $vehicles, ['id' => 'today-idvehicle']) ?>
                    </div>

                    <div class="col-md-6">
                        <?= $form->field($model, 'phone')->textInput(['type' => 'number', 'id' => 'today-phone']) ?>

                        <?= $form->field($model, 'address')->textarea(['id' => 'today-address']) ?>
                    </div>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Simpan', ['class' => 'btn btn-success', 'name' => Helper::BTN_SAVE, 'value' => Helper::TYPE_TODAY]) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
        <div id="menu2" class="container tab-pane <?= $vipbody ?>"><br>
            <h3>VIP</h3>
            <div class="trs-form">

                <?php $form = ActiveForm::begin(); ?>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'id' => 'vip-name']) ?>

                        <?=
                            $form->field($model, 'startdate')->widget(DatePicker::classname(), [
                                'options' => ['placeholder' => 'Tanggal Berangkat', 'id' => 'vip-startdate'],
                                'language' => 'id',
                                'type' => DatePicker::TYPE_INPUT,
                                'pluginOptions' => [
                                    'startDate' => date("Y-m-d"),
                                    'format' => 'yyyy-mm-dd',
                                    'autoclose' => true
                                ]
                            ]);
                        ?>

                        <?= $form->field($model, 'idvehicle')->dropDownList([NULL => '-- Pilih Kendaraan --'] + $vehicles) ?>
                    </div>

                    <div class="col-md-6">
                        <?= $form->field($model, 'phone')->textInput(['type' => 'number', 'id' => 'vip-phone']) ?>

                        <?= $form->field($model, 'address')->textarea(['id' => 'vip-address']) ?>
                    </div>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Simpan', ['class' => 'btn btn-success', 'name' => Helper::BTN_SAVE, 'value' => Helper::TYPE_VIP]) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>