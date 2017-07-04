<?php

namespace common\models;

use Yii;

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
            [['image'], 'string', 'max' => 512],
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
}
