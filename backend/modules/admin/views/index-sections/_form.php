<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\IndexSectionsValid;

/* @var $this yii\web\View */
/* @var $model common\models\IndexSections */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="index-sections-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->dropDownList(
    	ArrayHelper::map(IndexSectionsValid::find()->all(), 'name', 'name')
    ) ?>

    <?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
