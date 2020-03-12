<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trs".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $date
 * @property string|null $status
 * @property int|null $idvehicle
 *
 * @property Vehicle $idvehicle0
 */
class Trs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['idvehicle'], 'integer'],
            [['name', 'phone', 'address', 'status'], 'string', 'max' => 45],
            [['idvehicle'], 'exist', 'skipOnError' => true, 'targetClass' => Vehicle::className(), 'targetAttribute' => ['idvehicle' => 'id']],
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
            'phone' => 'Phone',
            'address' => 'Address',
            'date' => 'Date',
            'status' => 'Status',
            'idvehicle' => 'Idvehicle',
        ];
    }

    /**
     * Gets query for [[Idvehicle0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdvehicle0()
    {
        return $this->hasOne(Vehicle::className(), ['id' => 'idvehicle']);
    }
}
