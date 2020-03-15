<?php

namespace app\controllers;

use app\components\Helper;
use app\models\LoginForm;
use app\models\Trs;
use app\models\Vehicle;
use Yii;
use yii\bootstrap4\Html;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $req = Yii::$app->request;
        $model = new Trs();
        $timedepart = Helper::getTimeDepart();
        $vehicles = Vehicle::getList();
        $typesubmit = Helper::TYPE_PENDING;

        if ($model->load($req->post())) {
            $model->status = Helper::STAT_PENDING;
            $typesubmit = $req->post(Helper::BTN_SAVE);

            if (in_array($typesubmit, Helper::getTypeOrder())) {
                if ($typesubmit == Helper::TYPE_PENDING) {
                    $model->startdate = $model->startdate . ' ' . $timedepart[$model->time];
                } else {
                    $model->startdate = Helper::now();
                    $model->time = key($timedepart);
                }
                $model->type = $typesubmit;
            }

            if ($model->save()) {
                Helper::flashSucceed('Terima kasih. <br>Pesanan berhasil disimpan.<br>Beberapa saat lagi admin akan menghubungi anda');
                return $this->refresh();
            }

            Helper::flashFailed(Html::errorSummary($model));
        }

        return $this->render('index', [
            'model' => $model,
            'timedepart' => $timedepart,
            'vehicles' => $vehicles,
            'typesubmit' => $typesubmit,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
