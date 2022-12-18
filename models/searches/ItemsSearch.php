<?php

namespace app\models\searches;

use app\models\Items;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ItemsSearch represents the model behind the search form of `app\models\Items`.
 */
class ItemsSearch extends Items
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created', 'updated', 'price', 'nds_sum', 'nds_rate', 'sum', 'receipt_id', 'nds18', 'nds10', 'calculation_type_sign', 'calculation_subject_sign', 'nds_no', 'payment_type', 'nds', 'nds_calculated10', 'nds_calculated18', 'payment_agent_by_product_type', 'product_type', 'excise', 'commit'], 'integer'],
            [['quantity'], 'number'],
            [['name', 'modifiers', 'properties', 'status_id', 'nomenclature_code', 'unit', 'properties_item', 'provider_inn', 'product_code_data', 'product_code_data_error'], 'safe'],
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
        $query = Items::find()->with(['place', 'comments', 'status', 'status', 'categories', 'itemCategory', 'receipt']);

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

        $table = $this->tableName() . '.';
// grid filtering conditions
        $query->andFilterWhere([
            $table . 'id' => $this->id,
            $table . 'created' => $this->created,
            $table . 'updated' => $this->updated,
            $table . 'quantity' => $this->quantity,
            $table . 'price' => $this->price,
            $table . 'nds_sum' => $this->nds_sum,
            $table . 'nds_rate' => $this->nds_rate,
            $table . 'sum' => $this->sum,
            $table . 'receipt_id' => $this->receipt_id,
            $table . 'nds18' => $this->nds18,
            $table . 'nds10' => $this->nds10,
            $table . 'calculation_type_sign' => $this->calculation_type_sign,
            $table . 'calculation_subject_sign' => $this->calculation_subject_sign,
            $table . 'nds_no' => $this->nds_no,
            $table . 'payment_type' => $this->payment_type,
            $table . 'nds' => $this->nds,
            $table . 'nds_calculated10' => $this->nds_calculated10,
            $table . 'nds_calculated18' => $this->nds_calculated18,
            $table . 'payment_agent_by_product_type' => $this->payment_agent_by_product_type,
            $table . 'product_type' => $this->product_type,
            $table . 'excise' => $this->excise,
            $table . 'commit' => $this->commit,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'modifiers', $this->modifiers])
            ->andFilterWhere(['like', 'properties', $this->properties]);

        return $dataProvider;
    }
}
