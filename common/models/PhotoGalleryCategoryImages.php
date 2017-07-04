<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "photo_gallery_category_images".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property int $is_featured
 */
class PhotoGalleryCategoryImages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photo_gallery_category_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'description', 'image', 'is_featured'], 'required'],
            [['category_id', 'is_featured'], 'integer'],
            [['name', 'description'], 'string', 'max' => 56],
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
            'category_id' => 'Category ID',
            'name' => 'Name',
            'description' => 'Description',
            'image' => 'Image',
            'is_featured' => 'Is Featured',
        ];
    }
}
