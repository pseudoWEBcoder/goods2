<?php

namespace app\models\searches;

use app\models\ItemCategory;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ItemCategorySearch represents the model behind the search form of `\app\models\ItemCategory`.
 */
class ItemCategorySearch extends ItemCategory
{
    /**
     * {@inheritdoc}
     */
    public $item_name;
    public $category_name;

    public function rules()
    {
        return [
            [['id', 'item_id', 'category_id'], 'integer'],
            [['item_name', 'category_name'], 'safe'],
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
        $query = ItemCategory::find();

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
            'item_id' => $this->item_id,
            'category_id' => $this->category_id,
        ]);

        return $dataProvider;
    }
}
