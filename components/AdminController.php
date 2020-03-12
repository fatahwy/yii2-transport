<?php

namespace app\components;

use app\components\AccessRule;
use app\models\Log;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

/**
 * Default controller for the `admin` module
 */
class AdminController extends Controller {

    public $layout = "main.php";

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'rules' => [
                    [
                        'controllers' => ['admin/booking', 'admin/report', 'admin/account'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['pdfboarding'],
                        'allow' => true,
                    ],
                ],
                'denyCallback' => function($rule, $action) {
                    if (Yii::$app->user->isGuest()) {
                        throw new ForbiddenHttpException('Anda tidak memiliki cukup akses untuk halaman ini!');
                    } else {
                        return $this->redirect(['site/login']);
                    }
                },
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'force' => ['post'],
                ],
            ],
        ];
    }

}
