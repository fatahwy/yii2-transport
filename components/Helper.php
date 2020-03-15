<?php
namespace app\components;

use Yii;

class Helper {

    const STAT_INACTIVE = 0;
    const STAT_ACTIVE = 1;
    const STAT_PENDING = 2;
    const STAT_CANCEL = 3;
    const STAT_OK = 4;
    const TYPE_PENDING = 'PENDING';
    const TYPE_TODAY = 'TODAY';
    const TYPE_VIP = 'VIP';
    const BTN_SAVE = 'BTN_SAVE';
    const SCENARIO_CREATE = 'create';

    public static function getTimeDepart($id = NULL) {
        $list = [7 => '07:00', 13 => '13:00'];
        if (isset($list[$id])) {
            return $list[$id];
        }
        return $list;
    }

    public static function getTypeOrder($id = NULL) {
        $list = [
            self::TYPE_PENDING => self::TYPE_PENDING,
            self::TYPE_TODAY => self::TYPE_TODAY,
            self::TYPE_VIP => self::TYPE_VIP,
        ];

        if (isset($list[$id])) {
            return $list[$id];
        }
        return $list;
    }

    public static function getStatusOrder($id = NULL) {
        $list = [
            self::STAT_CANCEL => 'Batal',
            self::STAT_OK => 'Ok',
            self::STAT_PENDING => 'Pending',
        ];

        if (isset($list[$id])) {
            return $list[$id];
        }
        return $list;
    }

    public static function flashSucceed($msg = NULL) {
        return Yii::$app->session->setFlash('success', $msg ? : 'Operasi berhasil.');
    }

    public static function flashFailed($msg = '') {
        return Yii::$app->session->setFlash('failed', $msg ? : 'Operasi gagal! <br/>Silakan coba lagi.');
    }

}
