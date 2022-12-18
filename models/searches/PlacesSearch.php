<?php

namespace app\models\searches;

use app\models\Places;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PlacesSearch represents the model behind the search form about `\app\models\Places`.
 */
class PlacesSearch extends Places
{
    public function rules()
    {
        return [
            [['id', 'created', 'updated'], 'integer'],
            [['name', 'description'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Places::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'created' => $this->created,
            'updated' => $this->updated,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
