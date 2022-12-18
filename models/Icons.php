<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

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
            [['name',], 'string'],
            ['src', 'image', 'extensions' => 'jpg, jpeg, gif, png', 'on' => ['insert', 'update']],
        ];
    }

    public static function listAll($keyField = 'id', $valueField = 'name', $asArray = true)
    {
        $query = static::find();
        if ($asArray) {
            $query->select([$keyField, $valueField])->asArray();
        }

        return ArrayHelper::map($query->all(), $keyField, $valueField);
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => \mohorev\file\UploadImageBehavior::class,
                'attribute' => 'src',
                'scenarios' => ['insert', 'update'],
                'placeholder' => '@app/modules/user/assets/images/userpic.jpg',
                'path' => '@webroot/upload/icons/{id}',
                'url' => '@web/upload/icons/{id}',
                'thumbs' => [
                    'thumb' => ['width' => 400, 'quality' => 90],
                    'icon' => ['width' => 50, 'quality' => 90],
                    'preview' => ['width' => 200, 'height' => 200],
                    'news_thumb' => ['width' => 200, 'height' => 200, 'bg_color' => '000'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'src' => Yii::t('app', 'Src'),
        ];
    }
}
