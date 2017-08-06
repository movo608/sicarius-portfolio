<?php 

namespace backend\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class MainLayoutComponent extends Component {

	public function notificationNumbers() {

		return \common\models\Messages::find()->where(['seen' => (int) 0])->count();
	}

	public function categoriesPhotosNumbers($result = []) {

		$result = [
			'categoriesNumber' => \common\models\PhotoGalleryCategories::find()->count(),
			'photosNumber' => \common\Models\PhotoGalleryCategoryImages::find()->count()
		];

		return $result;
	}

	public function indexSectionsNumbers() {

		return \common\models\IndexSections::find()->count();
	}

}