<?php

namespace app\models;

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
            [['author_id'], 'required'],
            [['author_id', 'created', 'updated'], 'integer'],
            [['body'], 'string'],
            [['title'], 'string', 'max' => 255],
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
            'created' => 'Created',
            'updated' => 'Updated',
            'title' => 'Title',
            'body' => 'Body',
        ];
    }
}
