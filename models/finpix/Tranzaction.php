<?php

namespace app\models\finpix;

use Yii;

/**
 * This is the model class for table "tranzaction".
 *
 * @property int $_id
 * @property resource $transaction_guid
 * @property int $transaction_datetime
 * @property int $transaction_datetime_000
 * @property int $budget_id
 * @property int $transaction_type
 * @property int $from_account_id
 * @property int $to_account_id
 * @property string $from_currency3
 * @property string $to_currency3
 * @property double $from_value
 * @property double $to_value
 * @property int $is_planned
 * @property int $seller_id
 * @property string $seller_name
 * @property string $seller_sms_name
 * @property int $source_id
 * @property string $notes
 * @property double $latitude
 * @property double $longitude
 * @property string $image_file_name
 * @property string $raw
 * @property int $locked
 * @property int $locally_changed
 * @property int $server_timestamp
 * @property int $deleted
 * @property int $exported
 */
class Tranzaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tranzaction';
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
            [['transaction_guid', 'from_currency3', 'to_currency3', 'seller_name', 'seller_sms_name', 'notes', 'image_file_name', 'raw'], 'string'],
            [['transaction_datetime', 'transaction_datetime_000', 'budget_id', 'transaction_type', 'from_account_id', 'to_account_id', 'is_planned', 'seller_id', 'source_id', 'locked', 'locally_changed', 'server_timestamp', 'deleted', 'exported'], 'integer'],
            [['from_value', 'to_value', 'latitude', 'longitude'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'Id',
            'transaction_guid' => 'Transaction Guid',
            'transaction_datetime' => 'Transaction Datetime',
            'transaction_datetime_000' => 'Transaction Datetime 000',
            'budget_id' => 'Budget ID',
            'transaction_type' => 'Transaction Type',
            'from_account_id' => 'From Account ID',
            'to_account_id' => 'To Account ID',
            'from_currency3' => 'From Currency3',
            'to_currency3' => 'To Currency3',
            'from_value' => 'From Value',
            'to_value' => 'To Value',
            'is_planned' => 'Is Planned',
            'seller_id' => 'Seller ID',
            'seller_name' => 'Seller Name',
            'seller_sms_name' => 'Seller Sms Name',
            'source_id' => 'Source ID',
            'notes' => 'Notes',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'image_file_name' => 'Image File Name',
            'raw' => 'Raw',
            'locked' => 'Locked',
            'locally_changed' => 'Locally Changed',
            'server_timestamp' => 'Server Timestamp',
            'deleted' => 'Deleted',
            'exported' => 'Exported',
        ];
    }
}
