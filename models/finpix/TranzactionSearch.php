<?php

namespace app\models\finpix;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\finpix\Tranzaction;

/**
 * TranzactionSearch represents the model behind the search form of `\app\models\finpix\Tranzaction`.
 */
class TranzactionSearch extends Tranzaction
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['_id', 'transaction_datetime', 'transaction_datetime_000', 'budget_id', 'transaction_type', 'from_account_id', 'to_account_id', 'is_planned', 'seller_id', 'source_id', 'locked', 'locally_changed', 'server_timestamp', 'deleted', 'exported'], 'integer'],
            [['transaction_guid', 'from_currency3', 'to_currency3', 'seller_name', 'seller_sms_name', 'notes', 'image_file_name', 'raw'], 'safe'],
            [['from_value', 'to_value', 'latitude', 'longitude'], 'number'],
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
        $query = Tranzaction::find();

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
            '_id' => $this->_id,
            'transaction_datetime' => $this->transaction_datetime,
            'transaction_datetime_000' => $this->transaction_datetime_000,
            'budget_id' => $this->budget_id,
            'transaction_type' => $this->transaction_type,
            'from_account_id' => $this->from_account_id,
            'to_account_id' => $this->to_account_id,
            'from_value' => $this->from_value,
            'to_value' => $this->to_value,
            'is_planned' => $this->is_planned,
            'seller_id' => $this->seller_id,
            'source_id' => $this->source_id,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'locked' => $this->locked,
            'locally_changed' => $this->locally_changed,
            'server_timestamp' => $this->server_timestamp,
            'deleted' => $this->deleted,
            'exported' => $this->exported,
        ]);

        $query->andFilterWhere(['like', 'transaction_guid', $this->transaction_guid])
            ->andFilterWhere(['like', 'from_currency3', $this->from_currency3])
            ->andFilterWhere(['like', 'to_currency3', $this->to_currency3])
            ->andFilterWhere(['like', 'seller_name', $this->seller_name])
            ->andFilterWhere(['like', 'seller_sms_name', $this->seller_sms_name])
            ->andFilterWhere(['like', 'notes', $this->notes])
            ->andFilterWhere(['like', 'image_file_name', $this->image_file_name])
            ->andFilterWhere(['like', 'raw', $this->raw]);

        return $dataProvider;
    }
}
