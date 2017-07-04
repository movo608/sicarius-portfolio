<?php

namespace app\modules\portfolio\controllers;

use yii\web\Controller;
use common\models\PhotoGalleryCategories;

/**
 * Default controller for the `portfolio` module
 */
class DefaultController extends Controller {
	
    /**
    * Displays the categories page of every category entry in the database
    *
    * @return mixed
    */
    public function actionIndex() {

        $categories = PhotoGalleryCategories::find()->all();

        return $this->render('index', [
            'categories' => $categories
        ]);
    }

}
