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

            'id',
            'category_id',
            'name',
            'description',
            'image',
            // 'is_featured',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
