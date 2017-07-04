<?php 

namespace app\modules\portfolio\controllers;

use yii\web\Controller;
use yii\web\HttpException;
use common\models\PhotoGalleryCategories;
use common\models\PhotoGalleryCategoryImages;

class PhotosController extends Controller {

	/**
    * Displays the photos one category (with the id, $id) is populated with
    *
    * @return mixed
    */
    public function actionIndex($id) {

        $photos = PhotoGalleryCategoryImages::find()->where(['category_id' => $id])->all();

        if (!$category = PhotoGalleryCategories::find()->where(['id' => $id])->one()) {
        	throw new HttpException('404', 'The requested item could not be found. Please try again later.');
        }

        $nextCategory       = PhotoGalleryCategories::find()->where(['id' => (int)$id + 1])->one();
        $previousCategory   = PhotoGalleryCategories::find()->where(['id' => (int)$id - 1])->one();

        return $this->render('index', [
            'photos' => $photos,
            'category' => $category,
            'nextCategory' => $nextCategory,
            'previousCategory' => $previousCategory
        ]);
    }

}