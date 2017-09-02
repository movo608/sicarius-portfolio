<?php 

namespace backend\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class ImageUploadComponent extends Component {

    /**
    * Public function that can be accessed by any class through component call.
    * Uploads a file (image) through \yii\web\UploadedFile class used in the controller.
    * @return bool.
    */
	public function upload($model) {

        /**
        * If the $model->image field is not empty, proceed to uploading.
        */
        if (!empty($model->image)) {

            /**
            * Assign current local CMOS time.
            */
            $time = time();

            /**
            * Create the basePath for the image to be uploaded at @root/uploads.
            * Create the image name.
            * Create the database model.
            */
            $imageBasePath = dirname(Yii::$app->basePath, 1) . '\uploads\\';
            $imageData = 'img' . $model->image->baseName . '.' . $model->image->extension;
            $imageDatabaseEntryPath = '../../../uploads/';

            $modelImageDatabaseEntry = $imageDatabaseEntryPath . $time . $imageData;

            $model->image->saveAs($imageBasePath . $time . $imageData);

            $model->image = $modelImageDatabaseEntry;

            /**
            * If the model can be saved into the database, return true; else return false.
            * Further handling will be done in the controller, depending on the returned value.
            */
            if ($model->save(false)) {
            	return true;
            } else {
            	return false;
            }

        }

    }

}