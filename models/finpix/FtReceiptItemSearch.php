<?php

namespace app\models\finpix;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\finpix\FtReceiptItem;

/**
 * FtReceiptItemSearch represents the model behind the search form of `\app\models\finpix\FtReceiptItem`.
 */
class FtReceiptItemSearch extends FtReceiptItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_name', 'notes'], 'safe'],
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
        $query = FtReceiptItem::find();

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
        $query->andFilterWhere(['like', 'item_name', $this->item_name])
            ->andFilterWhere(['like', 'notes', $this->notes]);

        return $dataProvider;
    }
}
