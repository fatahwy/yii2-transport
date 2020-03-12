<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehicle".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $owner
 * @property string|null $phone
 * @property string|null $seat
 * @property int|null $status
 *
 * @property Trs[] $trs
 */
class Vehicle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vehicle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['name', 'owner', 'phone', 'seat'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'owner' => 'Owner',
            'phone' => 'Phone',
            'seat' => 'Seat',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Trs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrs()
    {
        return $this->hasMany(Trs::className(), ['idvehicle' => 'id']);
    }
}
