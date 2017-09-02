<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "photo_gallery_categories".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 */
class PhotoGalleryCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photo_gallery_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'image'], 'required'],
            [['name'], 'string', 'max' => 56],
            [['image'], 'image', 'skipOnEmpty' => false, 'maxSize' => 1024 * 1024 * 6, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'image' => 'Image',
        ];
    }

    /**
    * @scenarios
    */
    public function scenarios() {
        $scenarios = parent::scenarios();

        $scenarios['create'] = ['name', 'image'];
        $scenarios['update'] = ['name'];

        return $scenarios;
    }
}
