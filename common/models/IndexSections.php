<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "index_sections".
 *
 * @property int $id
 * @property string $name
 * @property string $text
 * @property string $image
 */
class IndexSections extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'index_sections';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'text', 'image'], 'required'],
            [['name'], 'string', 'max' => 56],
            [['text', 'image'], 'string', 'max' => 512],
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
            'text' => 'Text',
            'image' => 'Image',
        ];
    }
}