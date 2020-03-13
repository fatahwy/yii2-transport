<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "starttime".
 *
 * @property int $id
 * @property string $starttime
 */
class Starttime extends ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'starttime';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['starttime'], 'required'],
            [['starttime'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'starttime' => 'Starttime',
        ];
    }
    
    public function getList() {
        return ArrayHelper::map(self::find()->all(), 'id','starttime');
    }

}
