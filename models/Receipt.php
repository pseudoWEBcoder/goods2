<?php

namespace app\models;

/**
 * This is the model class for table "receipt".
 *
 * @property int $id
 * @property int $created
 * @property int $updated
 * @property int $commit
 * @property string $user_inn
 * @property int $fiscal_document_number
 * @property string $fiscal_sign
 * @property string $operator
 * @property int $total_sum
 * @property int $nds_no
 * @property int $shift_number
 * @property string $fiscal_drive_number
 * @property int $counter_submission_sum
 * @property int $taxation_type
 * @property string $kkt_reg_id
 * @property string $date_time
 * @property int $ecash_total_sum
 * @property int $prepayment_sum
 * @property int $cash_total_sum
 * @property int $postpayment_sum
 * @property int $request_number
 * @property int $operation_type
 * @property int $receipt_code
 * @property string $user
 * @property string $message_fiscal_sign
 * @property string $raw_data
 * @property int $nds18
 * @property int $nds10
 * @property string $fns_url
 * @property string $operator_inn
 * @property string $modifiers
 * @property string $retail_place_address
 * @property string $storno_items
 * @property string $retail_place
 * @property int $prepaid_sum
 * @property int $internet_sign
 * @property string $fns_site
 * @property string $machine_number
 * @property string $seller_address
 * @property int $fiscal_document_format_ver
 * @property int $provision_sum
 * @property string $buyer_address
 * @property int $payment_agent_type
 * @property string $properties_user
 * @property int $credit_sum
 * @property string $address_to_check_fiscal_sign
 * @property string $sender_address
 * @property int $nds_calculated10
 * @property string $user_property
 * @property string $properties
 * @property int $nds_calculated18
 * @property string $message
 * @property string $authority_uri
 * @property int $protocol_version
 * @property string $operator_transfer_address
 * @property string $buyer_phone_or_address
 * @property string $provider_phone
 * @property string $operator_phone_to_transfer
 * @property int $code
 * @property string $retail_address
 * @property string $operator_transfer_inn
 * @property string $operator_to_receive_phone
 * @property string $operator_transfer_name
 * @property string $payment_agent_operation
 * @property string $payment_agent_phone
 *
 * @property Items[] $items
 */
class Receipt extends \yii\db\ActiveRecord
{
  //  public  $icons;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'receipt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created', 'updated', 'commit', 'fiscal_document_number', 'total_sum', 'nds_no', 'shift_number', 'counter_submission_sum', 'taxation_type', 'ecash_total_sum', 'prepayment_sum', 'cash_total_sum', 'postpayment_sum', 'request_number', 'operation_type', 'receipt_code', 'nds18', 'nds10', 'prepaid_sum', 'internet_sign', 'fiscal_document_format_ver', 'provision_sum', 'payment_agent_type', 'credit_sum', 'nds_calculated10', 'nds_calculated18', 'protocol_version', 'code'], 'integer'],
            [['user_inn', 'fiscal_sign', 'operator', 'fiscal_drive_number', 'kkt_reg_id', 'user', 'message_fiscal_sign', 'raw_data', 'fns_url', 'operator_inn', 'modifiers', 'retail_place_address', 'storno_items', 'retail_place', 'fns_site', 'machine_number', 'seller_address', 'buyer_address', 'properties_user', 'address_to_check_fiscal_sign', 'sender_address', 'user_property', 'properties', 'message', 'authority_uri', 'operator_transfer_address', 'buyer_phone_or_address', 'provider_phone', 'operator_phone_to_transfer', 'retail_address', 'operator_transfer_inn', 'operator_to_receive_phone', 'operator_transfer_name', 'payment_agent_operation', 'payment_agent_phone'], 'string'],
            [['date_time'], 'number'],
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
            'commit' => 'Commit',
            'user_inn' => 'User Inn',
            'fiscal_document_number' => 'Fiscal Document Number',
            'fiscal_sign' => 'Fiscal Sign',
            'operator' => 'Operator',
            'total_sum' => 'Total Sum',
            'nds_no' => 'Nds No',
            'shift_number' => 'Shift Number',
            'fiscal_drive_number' => 'Fiscal Drive Number',
            'counter_submission_sum' => 'Counter Submission Sum',
            'taxation_type' => 'Taxation Type',
            'kkt_reg_id' => 'Kkt Reg ID',
            'date_time' => 'Date Time',
            'ecash_total_sum' => 'Ecash Total Sum',
            'prepayment_sum' => 'Prepayment Sum',
            'cash_total_sum' => 'Cash Total Sum',
            'postpayment_sum' => 'Postpayment Sum',
            'request_number' => 'Request Number',
            'operation_type' => 'Operation Type',
            'receipt_code' => 'Receipt Code',
            'user' => 'User',
            'message_fiscal_sign' => 'Message Fiscal Sign',
            'raw_data' => 'Raw Data',
            'nds18' => 'Nds18',
            'nds10' => 'Nds10',
            'fns_url' => 'Fns Url',
            'operator_inn' => 'Operator Inn',
            'modifiers' => 'Modifiers',
            'retail_place_address' => 'Retail Place Address',
            'storno_items' => 'Storno Items',
            'retail_place' => 'Retail Place',
            'prepaid_sum' => 'Prepaid Sum',
            'internet_sign' => 'Internet Sign',
            'fns_site' => 'Fns Site',
            'machine_number' => 'Machine Number',
            'seller_address' => 'Seller Address',
            'fiscal_document_format_ver' => 'Fiscal Document Format Ver',
            'provision_sum' => 'Provision Sum',
            'buyer_address' => 'Buyer Address',
            'payment_agent_type' => 'Payment Agent Type',
            'properties_user' => 'Properties User',
            'credit_sum' => 'Credit Sum',
            'address_to_check_fiscal_sign' => 'Address To Check Fiscal Sign',
            'sender_address' => 'Sender Address',
            'nds_calculated10' => 'Nds Calculated10',
            'user_property' => 'User Property',
            'properties' => 'Properties',
            'nds_calculated18' => 'Nds Calculated18',
            'message' => 'Message',
            'authority_uri' => 'Authority Uri',
            'protocol_version' => 'Protocol Version',
            'operator_transfer_address' => 'Operator Transfer Address',
            'buyer_phone_or_address' => 'Buyer Phone Or Address',
            'provider_phone' => 'Provider Phone',
            'operator_phone_to_transfer' => 'Operator Phone To Transfer',
            'code' => 'Code',
            'retail_address' => 'Retail Address',
            'operator_transfer_inn' => 'Operator Transfer Inn',
            'operator_to_receive_phone' => 'Operator To Receive Phone',
            'operator_transfer_name' => 'Operator Transfer Name',
            'payment_agent_operation' => 'Payment Agent Operation',
            'payment_agent_phone' => 'Payment Agent Phone',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Items::className(), ['receipt_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIconReceipt()
    {
        return $this->hasMany(IconReceipt::class, ['receipt_id' => 'id']);
    }

    public function getIcons()
    {
        return $this->hasMany(Icons::class, ['id' => 'icon_id'])
            ->via('iconReceipt');
    }
}
