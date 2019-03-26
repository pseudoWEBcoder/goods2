<?php

namespace app\models\finpix;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\finpix\ReceiptItem;

/**
 * ReceiptItemSearch represents the model behind the search form of `app\models\finpix\ReceiptItem`.
 */
class ReceiptItemSearch extends ReceiptItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['_id', 'transaction_id', 'item_pos', 'category_id', 'locally_changed', 'server_timestamp', 'deleted', 'item_exported'], 'integer'],
            [['item_guid', 'item_name'], 'safe'],
            [['item_cost', 'item_discount', 'item_price', 'item_amount'], 'number'],
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
        $query = ReceiptItem::find();

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
            'transaction_id' => $this->transaction_id,
            'item_cost' => $this->item_cost,
            'item_discount' => $this->item_discount,
            'item_price' => $this->item_price,
            'item_amount' => $this->item_amount,
            'item_pos' => $this->item_pos,
            'category_id' => $this->category_id,
            'locally_changed' => $this->locally_changed,
            'server_timestamp' => $this->server_timestamp,
            'deleted' => $this->deleted,
            'item_exported' => $this->item_exported,
        ]);

        $query->andFilterWhere(['like', 'item_guid', $this->item_guid])
            ->andFilterWhere(['like', 'item_name', $this->item_name]);

        return $dataProvider;
    }
}
