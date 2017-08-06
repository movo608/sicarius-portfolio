<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\PhotoGalleryCategoryImagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Photo Gallery Category Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="photo-gallery-category-images-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Photo Gallery Category Images', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'category_id' => [
                'attribute' => 'category_id',
                'value' => function ($value) {
                    return \common\models\PhotoGalleryCategories::find()->where(['id' => $value->category_id])->one() ? \common\models\PhotoGalleryCategories::find()->where(['id' => $value->category_id])->one()->name : 'No category. Please set.';
                }
            ],

            'name',
            'description',

            'image' => [
                'attribute' => 'image',
                'value' => 'image',
                'format' => ['image', ['class' => 'col-md-6']]
            ],

            'is_featured',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>