<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\PhotoGalleryCategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Photo Gallery Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="photo-gallery-categories-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Photo Gallery Categories', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            
            'image' => [
                'attribute' => 'image',
                'format' => ['image', ['class' => 'col-md-6']],
                'value' => 'image'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
