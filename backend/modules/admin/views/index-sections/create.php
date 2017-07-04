<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\IndexSections */

$this->title = 'Create Index Sections';
$this->params['breadcrumbs'][] = ['label' => 'Index Sections', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="index-sections-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
