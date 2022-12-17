<?php

namespace app\models;

use voskobovich\behaviors\ManyToManyBehavior;
use Yii;

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
 * @property int $nds20
 * @property string $properties_data
 * @property int $nds18118
 * @property int $applied_taxation_type
 * @property int $nds0
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
            [['date_time'], 'string'],
            [['icon_ids'], 'each', 'rule' => ['integer']],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => ManyToManyBehavior::class,
                'relations' => [
                    'icon_ids' => 'icons',
                ],
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
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),
            'commit' => Yii::t('app', 'Commit'),
            'user_inn' => Yii::t('app', 'User Inn'),
            'fiscal_document_number' => Yii::t('app', 'Fiscal Document Number'),
            'fiscal_sign' => Yii::t('app', 'Fiscal Sign'),
            'operator' => Yii::t('app', 'Operator'),
            'total_sum' => Yii::t('app', 'Total Sum'),
            'nds_no' => Yii::t('app', 'Nds No'),
            'shift_number' => Yii::t('app', 'Shift Number'),
            'fiscal_drive_number' => Yii::t('app', 'Fiscal Drive Number'),
            'counter_submission_sum' => Yii::t('app', 'Counter Submission Sum'),
            'taxation_type' => Yii::t('app', 'Taxation Type'),
            'kkt_reg_id' => Yii::t('app', 'Kkt Reg ID'),
            'date_time' => Yii::t('app', 'Date Time'),
            'ecash_total_sum' => Yii::t('app', 'Ecash Total Sum'),
            'prepayment_sum' => Yii::t('app', 'Prepayment Sum'),
            'cash_total_sum' => Yii::t('app', 'Cash Total Sum'),
            'postpayment_sum' => Yii::t('app', 'Postpayment Sum'),
            'request_number' => Yii::t('app', 'Request Number'),
            'operation_type' => Yii::t('app', 'Operation Type'),
            'receipt_code' => Yii::t('app', 'Receipt Code'),
            'user' => Yii::t('app', 'User'),
            'message_fiscal_sign' => Yii::t('app', 'Message Fiscal Sign'),
            'raw_data' => Yii::t('app', 'Raw Data'),
            'nds18' => Yii::t('app', 'Nds18'),
            'nds10' => Yii::t('app', 'Nds10'),
            'fns_url' => Yii::t('app', 'Fns Url'),
            'operator_inn' => Yii::t('app', 'Operator Inn'),
            'modifiers' => Yii::t('app', 'Modifiers'),
            'retail_place_address' => Yii::t('app', 'Retail Place Address'),
            'storno_items' => Yii::t('app', 'Storno Items'),
            'retail_place' => Yii::t('app', 'Retail Place'),
            'prepaid_sum' => Yii::t('app', 'Prepaid Sum'),
            'internet_sign' => Yii::t('app', 'Internet Sign'),
            'fns_site' => Yii::t('app', 'Fns Site'),
            'machine_number' => Yii::t('app', 'Machine Number'),
            'seller_address' => Yii::t('app', 'Seller Address'),
            'fiscal_document_format_ver' => Yii::t('app', 'Fiscal Document Format Ver'),
            'provision_sum' => Yii::t('app', 'Provision Sum'),
            'buyer_address' => Yii::t('app', 'Buyer Address'),
            'payment_agent_type' => Yii::t('app', 'Payment Agent Type'),
            'properties_user' => Yii::t('app', 'Properties User'),
            'credit_sum' => Yii::t('app', 'Credit Sum'),
            'address_to_check_fiscal_sign' => Yii::t('app', 'Address To Check Fiscal Sign'),
            'sender_address' => Yii::t('app', 'Sender Address'),
            'nds_calculated10' => Yii::t('app', 'Nds Calculated10'),
            'user_property' => Yii::t('app', 'User Property'),
            'properties' => Yii::t('app', 'Properties'),
            'nds_calculated18' => Yii::t('app', 'Nds Calculated18'),
            'message' => Yii::t('app', 'Message'),
            'authority_uri' => Yii::t('app', 'Authority Uri'),
            'protocol_version' => Yii::t('app', 'Protocol Version'),
            'operator_transfer_address' => Yii::t('app', 'Operator Transfer Address'),
            'buyer_phone_or_address' => Yii::t('app', 'Buyer Phone Or Address'),
            'provider_phone' => Yii::t('app', 'Provider Phone'),
            'operator_phone_to_transfer' => Yii::t('app', 'Operator Phone To Transfer'),
            'code' => Yii::t('app', 'Code'),
            'retail_address' => Yii::t('app', 'Retail Address'),
            'operator_transfer_inn' => Yii::t('app', 'Operator Transfer Inn'),
            'operator_to_receive_phone' => Yii::t('app', 'Operator To Receive Phone'),
            'operator_transfer_name' => Yii::t('app', 'Operator Transfer Name'),
            'payment_agent_operation' => Yii::t('app', 'Payment Agent Operation'),
            'payment_agent_phone' => Yii::t('app', 'Payment Agent Phone'),
            'nds20' => Yii::t('app', 'Nds20'),
            'properties_data' => Yii::t('app', 'Properties Data'),
            'nds18118' => Yii::t('app', 'Nds18118'),
            'applied_taxation_type' => Yii::t('app', 'Applied Taxation Type'),
            'nds0' => Yii::t('app', 'Nds0'),
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


    public function getFormatedTotalSum()
    {
        return number_format((float)$this->total_sum / 100, 2, '.', ' ');
    }
}
