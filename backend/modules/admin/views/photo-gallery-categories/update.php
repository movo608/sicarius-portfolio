<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PhotoGalleryCategories */

$this->title = 'Update Photo Gallery Categories: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Photo Gallery Categories', 'url' => ['/admin/photo-gallery-categories']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="photo-gallery-categories-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
