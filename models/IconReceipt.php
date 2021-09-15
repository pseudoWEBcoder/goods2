<?php

namespace app\models;

/**
 * This is the model class for table "icon_receipt".
 *
 * @property int $id
 * @property int $icon_id
 * @property int $receipt_id
 */
class IconReceipt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'icon_receipt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['icon_id', 'receipt_id'], 'integer'],
            [['receipt_id'], 'exist', 'skipOnError' => true, 'targetClass' => Receipt::className(), 'targetAttribute' => ['receipt_id' => '']],
            [['icon_id'], 'exist', 'skipOnError' => true, 'targetClass' => Icons::className(), 'targetAttribute' => ['icon_id' => '']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'icon_id' => 'Icon ID',
            'receipt_id' => 'Receipt ID',
        ];
    }
}
