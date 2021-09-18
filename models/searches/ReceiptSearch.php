<?php

namespace app\models\searches;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Receipt;

/**
 * ReceiptSearch represents the model behind the search form of `app\models\Receipt`.
 */
class ReceiptSearch extends Receipt
{
    public $view;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created', 'updated', 'commit', 'fiscal_document_number', 'total_sum', 'nds_no', 'shift_number', 'counter_submission_sum', 'taxation_type', 'ecash_total_sum', 'prepayment_sum', 'cash_total_sum', 'postpayment_sum', 'request_number', 'operation_type', 'receipt_code', 'nds18', 'nds10', 'prepaid_sum', 'internet_sign', 'fiscal_document_format_ver', 'provision_sum', 'payment_agent_type', 'credit_sum', 'nds_calculated10', 'nds_calculated18', 'protocol_version', 'code'], 'integer'],
            [['user_inn', 'fiscal_sign', 'operator', 'fiscal_drive_number', 'kkt_reg_id', 'user', 'message_fiscal_sign', 'raw_data', 'fns_url', 'operator_inn', 'modifiers', 'retail_place_address', 'storno_items', 'retail_place', 'fns_site', 'machine_number', 'seller_address', 'buyer_address', 'properties_user', 'address_to_check_fiscal_sign', 'sender_address', 'user_property', 'properties', 'message', 'authority_uri', 'operator_transfer_address', 'buyer_phone_or_address', 'provider_phone', 'operator_phone_to_transfer', 'retail_address', 'operator_transfer_inn', 'operator_to_receive_phone', 'operator_transfer_name', 'payment_agent_operation', 'payment_agent_phone'], 'safe'],
            [['date_time'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Receipt::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created' => $this->created,
            'updated' => $this->updated,
            'commit' => $this->commit,
            'fiscal_document_number' => $this->fiscal_document_number,
            'total_sum' => $this->total_sum,
            'nds_no' => $this->nds_no,
            'shift_number' => $this->shift_number,
            'counter_submission_sum' => $this->counter_submission_sum,
            'taxation_type' => $this->taxation_type,
            'date_time' => $this->date_time,
            'ecash_total_sum' => $this->ecash_total_sum,
            'prepayment_sum' => $this->prepayment_sum,
            'cash_total_sum' => $this->cash_total_sum,
            'postpayment_sum' => $this->postpayment_sum,
            'request_number' => $this->request_number,
            'operation_type' => $this->operation_type,
            'receipt_code' => $this->receipt_code,
            'nds18' => $this->nds18,
            'nds10' => $this->nds10,
            'prepaid_sum' => $this->prepaid_sum,
            'internet_sign' => $this->internet_sign,
            'fiscal_document_format_ver' => $this->fiscal_document_format_ver,
            'provision_sum' => $this->provision_sum,
            'payment_agent_type' => $this->payment_agent_type,
            'credit_sum' => $this->credit_sum,
            'nds_calculated10' => $this->nds_calculated10,
            'nds_calculated18' => $this->nds_calculated18,
            'protocol_version' => $this->protocol_version,
            'code' => $this->code,
        ]);

        $query->andFilterWhere(['like', 'user_inn', $this->user_inn])
            ->andFilterWhere(['like', 'fiscal_sign', $this->fiscal_sign])
            ->andFilterWhere(['like', 'operator', $this->operator])
            ->andFilterWhere(['like', 'fiscal_drive_number', $this->fiscal_drive_number])
            ->andFilterWhere(['like', 'kkt_reg_id', $this->kkt_reg_id])
            ->andFilterWhere(['like', 'user', $this->user])
            ->andFilterWhere(['like', 'message_fiscal_sign', $this->message_fiscal_sign])
            ->andFilterWhere(['like', 'raw_data', $this->raw_data])
            ->andFilterWhere(['like', 'fns_url', $this->fns_url])
            ->andFilterWhere(['like', 'operator_inn', $this->operator_inn])
            ->andFilterWhere(['like', 'modifiers', $this->modifiers])
            ->andFilterWhere(['like', 'retail_place_address', $this->retail_place_address])
            ->andFilterWhere(['like', 'storno_items', $this->storno_items])
            ->andFilterWhere(['like', 'retail_place', $this->retail_place])
            ->andFilterWhere(['like', 'fns_site', $this->fns_site])
            ->andFilterWhere(['like', 'machine_number', $this->machine_number])
            ->andFilterWhere(['like', 'seller_address', $this->seller_address])
            ->andFilterWhere(['like', 'buyer_address', $this->buyer_address])
            ->andFilterWhere(['like', 'properties_user', $this->properties_user])
            ->andFilterWhere(['like', 'address_to_check_fiscal_sign', $this->address_to_check_fiscal_sign])
            ->andFilterWhere(['like', 'sender_address', $this->sender_address])
            ->andFilterWhere(['like', 'user_property', $this->user_property])
            ->andFilterWhere(['like', 'properties', $this->properties])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'authority_uri', $this->authority_uri])
            ->andFilterWhere(['like', 'operator_transfer_address', $this->operator_transfer_address])
            ->andFilterWhere(['like', 'buyer_phone_or_address', $this->buyer_phone_or_address])
            ->andFilterWhere(['like', 'provider_phone', $this->provider_phone])
            ->andFilterWhere(['like', 'operator_phone_to_transfer', $this->operator_phone_to_transfer])
            ->andFilterWhere(['like', 'retail_address', $this->retail_address])
            ->andFilterWhere(['like', 'operator_transfer_inn', $this->operator_transfer_inn])
            ->andFilterWhere(['like', 'operator_to_receive_phone', $this->operator_to_receive_phone])
            ->andFilterWhere(['like', 'operator_transfer_name', $this->operator_transfer_name])
            ->andFilterWhere(['like', 'payment_agent_operation', $this->payment_agent_operation])
            ->andFilterWhere(['like', 'payment_agent_phone', $this->payment_agent_phone]);

        return $dataProvider;
    }
}
