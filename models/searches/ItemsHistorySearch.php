<?php

namespace app\models\searches;

use app\models\ItemsHistory;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ItemsHistorySearch represents the model behind the search form of `\app\models\ItemsHistory`.
 */
class ItemsHistorySearch extends ItemsHistory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'items_id', 'time'], 'integer'],
            [['text', 'diff'], 'safe'],
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
        $query = ItemsHistory::find();

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
            'items_id' => $this->items_id,
            'time' => $this->time,
        ]);

        $query->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'diff', $this->diff]);

        return $dataProvider;
    }
}
