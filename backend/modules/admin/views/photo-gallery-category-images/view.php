<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PhotoGalleryCategoryImages */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Photo Gallery Category Images', 'url' => ['/admin/photo-gallery-category-images']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="photo-gallery-category-images-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',

            'category_id',

            'name',
            'description',

            'image' => [
                'attribute' => 'image',
                'value' => '../' . $model->image,
                'format' => ['image', ['class' => 'col-md-6']]
            ],

            'is_featured',
        ],
    ]) ?>

</div>