<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "trs".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $startdate
 * @property string|null $estarrival
 * @property string|null $status
 * @property int|null $idvehicle
 *
 * @property Vehicle $idvehicle0
 */
class Trs extends ActiveRecord {

    public $time;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'trs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['startdate', 'estarrival', 'time'], 'safe'],
            [['idvehicle', 'status'], 'integer'],
            [['name', 'phone', 'date', 'time', 'address'], 'required'],
            [['name', 'phone', 'address', 'charge'], 'string', 'max' => 45],
            [['idvehicle'], 'exist', 'skipOnError' => true, 'targetClass' => Vehicle::className(), 'targetAttribute' => ['idvehicle' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Nama',
            'phone' => 'No Telp/WA',
            'address' => 'Alamat',
            'time' => 'Jam Berangkat',
            'startdate' => 'Tanggal Berangkat',
            'estarrival' => 'Perkiraan Tiba',
            'status' => 'Status',
            'idvehicle' => 'Kendaraan',
        ];
    }

    /**
     * Gets query for [[Idvehicle0]].
     *
     * @return ActiveQuery
     */
    public function getIdvehicle0() {
        return $this->hasOne(Vehicle::className(), ['id' => 'idvehicle']);
    }

}
