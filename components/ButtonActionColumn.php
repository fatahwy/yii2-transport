<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

use Yii;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use rmrevin\yii\fontawesome\FA;

class ButtonActionColumn extends ActionColumn {

    public $dropButtons;

    protected function initDefaultButtons() {
        if (!isset($this->buttons['view'])) {
            $this->buttons['view'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('yii', 'View'),
                    'aria-label' => Yii::t('yii', 'View'),
                    'data-pjax' => '0',
                    'class' => 'btn btn-primary btn-sm',
                    'style' => 'margin: 2px;'
                        ], $this->buttonOptions);
                return Html::a(FA::icon('search'), $url, $options);
            };
        }
        if (!isset($this->buttons['update'])) {
            $this->buttons['update'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('yii', 'Update'),
                    'aria-label' => Yii::t('yii', 'Update'),
                    'data-pjax' => '0',
                    'class' => 'btn btn-primary btn-sm',
                    'style' => 'margin: 2px;'
                        ], $this->buttonOptions);
                return Html::a(FA::icon('edit'), $url, $options);
            };
        }
        if (!isset($this->buttons['delete'])) {
            $this->buttons['delete'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('yii', 'Delete'),
                    'aria-label' => Yii::t('yii', 'Delete'),
                    'data-confirm' => Yii::t('yii', 'Apakah anda yakin akan menghapus item ini?'),
                    'data-method' => 'post',
                    'data-pjax' => '0',
                    'class' => 'btn btn-danger btn-sm',
                    'style' => 'margin: 2px;'
                        ], $this->buttonOptions);
                return Html::a(FA::icon('trash'), $url, $options);
            };
        }
    }

}
