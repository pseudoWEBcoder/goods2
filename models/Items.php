<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "items".
 *
 * @property int $id
 * @property int $created
 * @property int $updated
 * @property string $quantity
 * @property int $price
 * @property string $name
 * @property int $nds_sum
 * @property int $nds_rate
 * @property int $sum
 * @property int $receipt_id
 * @property int $nds18
 * @property int $nds10
 * @property int $calculation_type_sign
 * @property int $calculation_subject_sign
 * @property string $modifiers
 * @property int $nds_no
 * @property int $payment_type
 * @property int $nds
 * @property int $nds_calculated10
 * @property int $nds_calculated18
 * @property string $properties
 * @property int $payment_agent_by_product_type
 * @property int $product_type
 * @property int $excise
 * @property int $commit
 *
 * @property Receipt $receipt
 */
class Items extends \yii\db\ActiveRecord
{
	public $commitStatuses=[ 
//	time=>'OK',
-1=>'BAD',
 -2=>'Partial', 
 ];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created', 'updated', 'price', 'nds_sum', 'nds_rate', 'sum', 'receipt_id', 'nds18', 'nds10', 'calculation_type_sign', 'calculation_subject_sign', 'nds_no', 'payment_type', 'nds', 'nds_calculated10', 'nds_calculated18', 'payment_agent_by_product_type', 'product_type', 'excise', 'commit'], 'integer'],
            [['quantity'], 'number'],
            [['name', 'modifiers', 'properties'], 'string'],
            [['receipt_id'], 'exist', 'skipOnError' => true, 'targetClass' => Receipt::className(), 'targetAttribute' => ['receipt_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created' => 'Created',
            'updated' => 'Updated',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'name' => 'Name',
            'nds_sum' => 'Nds Sum',
            'nds_rate' => 'Nds Rate',
            'sum' => 'Sum',
            'receipt_id' => 'Receipt ID',
            'nds18' => 'Nds18',
            'nds10' => 'Nds10',
            'calculation_type_sign' => 'Calculation Type Sign',
            'calculation_subject_sign' => 'Calculation Subject Sign',
            'modifiers' => 'Modifiers',
            'nds_no' => 'Nds No',
            'payment_type' => 'Payment Type',
            'nds' => 'Nds',
            'nds_calculated10' => 'Nds Calculated10',
            'nds_calculated18' => 'Nds Calculated18',
            'properties' => 'Properties',
            'payment_agent_by_product_type' => 'Payment Agent By Product Type',
            'product_type' => 'Product Type',
            'excise' => 'Excise',
            'commit' => 'Commit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceipt()
    {
        return $this->hasOne(Receipt::className(), ['id' => 'receipt_id']);
    }
public function getformatedPrice(){
return number_format((float)$this->price / 100, 2, '.', ' ');
}
public function getComments(){
return $this->hasMany(Comment::className(), ['items_id' => 'id']);
}





}

