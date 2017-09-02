<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use backend\components\MainLayoutComponent;

AppAsset::register($this);

$new_messages_count     = MainLayoutComponent::notificationNumbers();
$catPhotosNumbers       = MainLayoutComponent::categoriesPhotosNumbers();
$indexSectionsNumber    = MainLayoutComponent::indexSectionsNumbers();
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
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl . 'admin',
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems = [
            ['label' => 'Home', 'url' => ['/admin']],
            ['label' => 'Frontend', 'url' => ['/../../frontend/web']]
        ];

        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';

        $menuItems[] = [
            'label' => 'Administration' . ' (' . $new_messages_count . ')', 'options' => ['class' => 'message-label'],
            'items' => [
                ['label' => 'Index Sections' . ' (' . $indexSectionsNumber . ')', 'url' => ['/admin/index-sections']],
                '<li class="divider"></li>',
                ['label' => 'Messages' . ' (' . $new_messages_count . ')', 'url' => ['/admin/messages'], 'options' => ['class' => 'message']],
                '<li class="divider"></li>',
                ['label' => 'Photo Categories (' . $catPhotosNumbers['categoriesNumber'] . ')', 'url' => ['/admin/photo-gallery-categories']],
                '<li class="divider"></li>',
                ['label' => 'Category Images (' . $catPhotosNumbers['photosNumber'] . ')', 'url' => ['/admin/photo-gallery-category-images']],
            ]
        ];
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
