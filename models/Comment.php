<?php

namespace app\models;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property int $time
 * @property string $text
 * @property int $items_id
 *
 * @property Items $items
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['time'/*, 'items_id'*/], 'integer'],
            [['text'], 'string'],
            [['items_id'], 'exist', 'skipOnError' => true, 'targetClass' => Items::className(), 'targetAttribute' => ['items_id' => 'id']],
        ];
    }

    public function beforeSave($insert)
    {
        if (is_null($this->time))
            if ($this->isNewRecord)
                $this->time = time();
        return parent::beforeSave($insert);
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
            'items_id' => 'Items ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasOne(Items::className(), ['id' => 'items_id']);
    }
}
