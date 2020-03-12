<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "email".
 *
 * @property int $idemail
 * @property string $name
 * @property string $email
 * @property int|null $status
 */
class Email extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'email';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            [['status'], 'integer'],
            [['name', 'email'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idemail' => 'Idemail',
            'name' => 'Name',
            'email' => 'Email',
            'status' => 'Status',
        ];
    }
}
