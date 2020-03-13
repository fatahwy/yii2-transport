<?php
/* @var $this View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Html;
use yii\web\View;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>

    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar navbar-expand-md navbar-dark fixed-top bg-dark',
                ],
            ]);

            $items = [];
            if (Yii::$app->user->isGuest) {
                $items = [
                    ['label' => 'Pesanan', 'url' => ['/trs/index']],
                    ['label' => 'Armada', 'url' => ['/vehicle/index']],
                    ['label' => 'Email', 'url' => ['/email/index']],
                        // ('<li>'
                        //     . Html::beginForm(['/site/logout'], 'post')
                        //     . Html::submitButton(
                        //         'Logout (' . Yii::$app->user->identity->username . ')',
                        //         ['class' => 'btn btn-link logout']
                        //     )
                        //     . Html::endForm()
                        //     . '</li>'),
                ];
            }

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav justify-content-end'],
                'items' => $items,
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
            <p class="float-left">&copy; <?= Yii::$app->name . ' ' . date('Y') ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>

</html>
<?php $this->endPage() ?>