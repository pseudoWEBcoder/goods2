<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "notes".
 *
 * @property int $id
 * @property int $author_id
 * @property int $created
 * @property int $updated
 * @property string $title
 * @property string $body
 */
class Notes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_id'], 'default', 'value' => \Yii::$app->getUser()->getId()],
            [['author_id', 'created', 'updated'], 'integer'],
            [['body'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created',
                'updatedAtAttribute' => 'updated',
                //  'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => 'Author ID',
            'created' => 'создан',
            'updated' => 'изменен',
            'title' => 'заголовок',
            'body' => 'текст',
        ];
    }
}
