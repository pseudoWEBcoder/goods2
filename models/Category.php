<?php

namespace app\models;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $time
 * @property string $text
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['time'], 'integer'],
            [['text'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'time' => 'Time',
            'text' => 'Text',
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
}
