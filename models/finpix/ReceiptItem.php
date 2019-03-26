<?php

namespace app\models\finpix;

use Yii;

/**
 * This is the model class for table "receipt_item".
 *
 * @property int $_id
 * @property resource $item_guid
 * @property int $transaction_id
 * @property string $item_name
 * @property double $item_cost
 * @property double $item_discount
 * @property double $item_price
 * @property double $item_amount
 * @property int $item_pos
 * @property int $category_id
 * @property int $locally_changed
 * @property int $server_timestamp
 * @property int $deleted
 * @property int $item_exported
 */
class ReceiptItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'receipt_item';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_finpix');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_guid', 'item_name'], 'string'],
            [['transaction_id', 'item_pos', 'category_id', 'locally_changed', 'server_timestamp', 'deleted', 'item_exported'], 'integer'],
            [['item_cost', 'item_discount', 'item_price', 'item_amount'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'Id',
            'item_guid' => 'Item Guid',
            'transaction_id' => 'Transaction ID',
            'item_name' => 'Item Name',
            'item_cost' => 'Item Cost',
            'item_discount' => 'Item Discount',
            'item_price' => 'Item Price',
            'item_amount' => 'Item Amount',
            'item_pos' => 'Item Pos',
            'category_id' => 'Category ID',
            'locally_changed' => 'Locally Changed',
            'server_timestamp' => 'Server Timestamp',
            'deleted' => 'Deleted',
            'item_exported' => 'Item Exported',
        ];
    }
}
