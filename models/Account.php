<?php

namespace app\models;

use app\components\Helper;
use Yii;

/**
 * This is the model class for table "account".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int|null $status
 * @property string|null $lastlogin
 */
class Account extends \yii\db\ActiveRecord
{
    public $password_repeat;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'account';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'password_repeat'], 'required'],
            [['status'], 'integer'],
            [['lastlogin'], 'safe'],
            [['username'], 'string', 'max' => 45],
            [['password', 'password_repeat'], 'string', 'min' => 5, 'max' => 45],
            [['username'], 'unique'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'status' => 'Aktif',
            'lastlogin' => 'Login Terakhir',
        ];
    }
}
