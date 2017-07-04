<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PhotoGalleryCategories */

$this->title = 'Create Photo Gallery Categories';
$this->params['breadcrumbs'][] = ['label' => 'Photo Gallery Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="photo-gallery-categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
