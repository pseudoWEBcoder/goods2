<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Items;

/**
 * ItemsSearch represents the model behind the search form about `\app\models\Items`.
 */
class ItemsSearch extends Items
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created', 'updated', 'price', 'nds_sum', 'nds_rate', 'sum', 'receipt_id', 'nds18', 'nds10', 'calculation_type_sign', 'calculation_subject_sign', 'nds_no', 'payment_type', 'nds', 'nds_calculated10', 'nds_calculated18', 'payment_agent_by_product_type', 'product_type', 'excise', 'commit'], 'integer'],
            [['quantity'], 'number'],
            [['name', 'modifiers', 'properties'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Items::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'created' => $this->created,
            'updated' => $this->updated,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'nds_sum' => $this->nds_sum,
            'nds_rate' => $this->nds_rate,
            'sum' => $this->sum,
            'receipt_id' => $this->receipt_id,
            'nds18' => $this->nds18,
            'nds10' => $this->nds10,
            'calculation_type_sign' => $this->calculation_type_sign,
            'calculation_subject_sign' => $this->calculation_subject_sign,
            'nds_no' => $this->nds_no,
            'payment_type' => $this->payment_type,
            'nds' => $this->nds,
            'nds_calculated10' => $this->nds_calculated10,
            'nds_calculated18' => $this->nds_calculated18,
            'payment_agent_by_product_type' => $this->payment_agent_by_product_type,
            'product_type' => $this->product_type,
            'excise' => $this->excise,
            'commit' => $this->commit,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'modifiers', $this->modifiers])
            ->andFilterWhere(['like', 'properties', $this->properties]);

        return $dataProvider;
    }
}
