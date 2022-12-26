<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "upload".
 *
 * @property int $id
 * @property int $created_at
 * @property int $updated_at
 * @property string $md5
 * @property string $status
 * @property int $status_num
 * @property array $info
 */
class Upload extends \yii\db\ActiveRecord
{
    const  STATUS_OK = 0;
    const  STATUS_EMPTY = 0;
    const  STATUS_ERROR = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'upload';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'status_num'], 'integer'],
            [['status'], 'string'],
            [['info'], 'safe'],
            [['md5'], 'string', 'max' => 255],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
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
            'id' => Yii::t('app', 'ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'md5' => Yii::t('app', 'Md5'),
            'status' => Yii::t('app', 'Status'),
            'status_num' => Yii::t('app', 'Status Num'),
            'info' => Yii::t('app', 'Info'),
        ];
    }
}
