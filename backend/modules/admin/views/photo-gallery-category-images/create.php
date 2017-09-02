<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PhotoGalleryCategoryImages */

$this->title = 'Create Photo Gallery Category Images';
$this->params['breadcrumbs'][] = ['label' => 'Photo Gallery Category Images', 'url' => ['/admin/photo-gallery-category-images']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="photo-gallery-category-images-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
