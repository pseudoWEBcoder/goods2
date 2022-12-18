<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "items_history".
 *
 * @property int $id
 * @property int $items_id
 * @property int $time
 * @property string $text
 * @property string $diff
 *
 * @property Items $items
 */
class ItemsHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'items_history';
    }

    public function beforeSave($insert)
    {
        if (empty($this->time))
            if ($this->isNewRecord)
                $this->time = time();
        return parent::beforeSave($insert);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['items_id', 'time'], 'integer'],
            [['text', 'diff'], 'string'],
            [['items_id'], 'exist', 'skipOnError' => true, 'targetClass' => Items::className(), 'targetAttribute' => ['items_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'items_id' => Yii::t('app', 'Items ID'),
            'time' => Yii::t('app', 'Time'),
            'text' => Yii::t('app', 'Text'),
            'diff' => Yii::t('app', 'Diff'),
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
