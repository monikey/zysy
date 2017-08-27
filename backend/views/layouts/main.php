<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
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
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
        
        $menuItems = [
            [
                'label'=>'主页',
                'url'=>['/site/index'],
            ],
            [
                'label' => '巡查设置',
                'url' => ['/site/index'] ,
                'items'=>[
                    [
                        'label'=>'巡查时间',
                        'url'=>['/inspecttype/index']
                    ],
                    [
                        'label'=>'巡查项目',
                        'url'=>['/inspectitem/index']
                    ],
                    [
                        'label'=>'巡查标签',
                        'url'=>['/inspecttag/index']
                    ]
                ] 
            ],
            [
                'label' => '基础数据设置',
                'url' => ['/site/index'] ,
                'items'=>[
                    [
                        'label'=>'学生数据导入',
                        'url'=>['/students/index']
                    ],
                    [
                        'label'=>'教师信息导入',
                        'url'=>['/inspectitem/index']
                    ],
                    [
                        'label'=>'班级信息导入',
                        'url'=>['/classes/index']
                    ],
                    [
                        'label'=>'部门设置',
                        'url'=>['/department/index']
                    ],
                ]
            ],
            ['label' => 'Login', 'url' => ['/site/login']]
        ];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
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
