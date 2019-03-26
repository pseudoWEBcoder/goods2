<?php

namespace app\models\finpix;

use Yii;

/**
 * This is the model class for table "ft_receipt_item".
 *
 * @property string $item_name
 * @property string $notes
 */
class FtReceiptItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ft_receipt_item';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_finpix');
    }
public static function primaryKey() { 
return ['id']; 
}

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_name', 'notes'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'item_name' => 'Item Name',
            'notes' => 'Notes',
        ];
    }
}
