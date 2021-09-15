<?php

namespace app\models;

/**
 * This is the model class for table "icons".
 *
 * @property int $id
 * @property string $name
 * @property string $src
 */
class Icons extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'icons';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'src'], 'string'],
            ['file', 'file', 'extensions' => 'doc, docx, pdf', 'on' => ['insert', 'update']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'src' => 'Src',
        ];
    }
}
