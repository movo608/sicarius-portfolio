<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\IndexSectionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Index Sections';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="index-sections-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Index Sections', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',

            'text' => [
                'attribute' => 'text',
                'value' => function($value) {
                    return substr($value->text, 0, 70) . '...';
                }
            ],

            'image' => [
                'value' => 'image',
                'attribute' => 'image',
                'format' => ['image', ['class' => 'col-md-5']]
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
