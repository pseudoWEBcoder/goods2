<?php

namespace app\models\searches;

use app\models\Notes;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * NotesSearch represents the model behind the search form about `\app\models\Notes`.
 */
class NotesSearch extends Notes
{
    public function rules()
    {
        return [
            [['id', 'author_id', 'created', 'updated'], 'integer'],
            [['title', 'body'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Notes::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'author_id' => $this->author_id,
            'created' => $this->created,
            'updated' => $this->updated,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'body', $this->body]);

        return $dataProvider;
    }
}
