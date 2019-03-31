<?php

namespace app\models\searches;

use app\models\ItemStatuses as ItemStatusesModel;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ItemStatuses represents the model behind the search form about `\app\models\ItemStatuses`.
 */
class ItemStatuses extends ItemStatusesModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'updated'], 'integer'],
            [['text', 'color', 'icon'], 'safe'],
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
        $query = ItemStatusesModel::find();

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
            'updated' => $this->updated,
        ]);

        $query->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'icon', $this->icon]);

        return $dataProvider;
    }
}
