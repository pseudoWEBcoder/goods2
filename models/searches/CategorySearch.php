<?php

namespace app\models\searches;

use app\models\Category;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CategorySearch represents the model behind the search form about `\app\models\Category`.
 */
class CategorySearch extends Category
{
    public function rules()
    {
        return [
            [['id', 'time'], 'integer'],
            [['text'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Category::find()->with(['items']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $orderSQL = '(SELECT COUNT(*) FROM item_category WHERE category.id = `item_category`.`category_id`)';
        $dataProvider->setSort([
            'attributes' => array_merge($dataProvider->getSort()->attributes, [
                    'items' => [
                        'asc' => [$orderSQL => SORT_ASC],
                        'desc' => [$orderSQL => SORT_DESC],
//                    'asc' => ['count(' . Items::tableName() . '.*)' => SORT_ASC],
//                    'desc' => ['count(' . Items::tableName() . '.*)' => SORT_DESC],
                        //  'desc' => [ClientPhone::tableName() . '.phone_digital' => SORT_DESC]
                    ]
                ]
            )]);
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'time' => $this->time,
        ]);

        $query->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }
}
