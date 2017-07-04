<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PhotoGalleryCategoryImages */

$this->title = 'Update Photo Gallery Category Images: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Photo Gallery Category Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="photo-gallery-category-images-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
