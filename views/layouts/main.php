<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
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
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $other = scandir($dir = Yii::getAlias('@app/controllers'));
    if (is_array($other) && !empty($other))
        foreach ($other as $index => $item) {
            if (preg_match('/([A-Z0-9].+)Controller\.php/', $item, $matches)) {
                $class = $matches[1];
                $className = 'app\controllers\\' . $class . 'Controller';
                if (!class_exists($className))
                    continue;
                $rf = new ReflectionClass(($className));
                $subItem = ['label' => $class, 'url' => ['/' . mb_strtolower($class) . '/']];
                $actions = $rf->getMethods();
                $Actions = [];
                foreach ($actions as $i => $action) {
                    $name = $action->getName();

                    if (preg_match('/action([A-Z].+)/', $name, $matches_name)) {
                        $Actions[] = ['label' => $matches_name[1], 'url' => ['/' . mb_strtolower($class) . '/' . mb_strtolower($matches_name[1])]];
                    }
                }
                if (!empty($Actions))
                    $subItem['items'] = $Actions;
                $others [] = $subItem;
            }
        } else
        $other = [];
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'товары', 'url' => ['/items/index']],
            ['label' => 'чеки', 'url' => ['/receipt/index']],
            ['label' => 'все', 'items' => $others],
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            ['label' => 'админка', 'items' => [
                ['label' => ' категории', 'url' => ['/category-list']],
                ['label' => 'товары-категории', 'url' => ['/item-category-list']],
                ['label' => 'места', 'url' => ['/places']],
                '<li class="divider"></li>',
                ['label' => 'заметки', 'url' => ['/notes']],

            ]],

            Yii::$app->user->isGuest ? (
            ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
