<?php

namespace app\models;

use yii\db\Expression;

class ChartFilters extends \yii\base\Model
{
    public static $monthes = ['нулябрь', 'январь', 'февраль', 'март', 'апрель', 'май', 'июнь', 'июль', 'август', 'сентябрь', 'октябрь', 'ноябрь', 'декабрь'];
    public $day;
    public $month;
    public $year;

    public function rules()
    {
        return [
            [['day'], 'integer'],
            [['month', 'year'], 'safe']
        ];
    }

    public function filter(array $get, \yii\db\ActiveQuery $query)
    {
        $this->load($get) && $this->validate();

        $this->onefilter('d', 'day', 'day', $query);
        $this->onefilter('m', 'month', 'month', $query);
        $this->onefilter('Y', 'year', 'year', $query);
        return $query;
    }

    protected function onefilter($a, $b, $c, \yii\db\ActiveQuery $query)
    {
        if ($this->$c) {
            if (is_array($this->$c)) {
                foreach ($this->$c as $index => $item) {
                    $rnd = mt_rand(0, 999);
                    $query->orWhere(new  Expression('strftime(\'%' . $a . '\',`receipt`.`date_time`) = :' . $b . $index . '_' . $rnd, [$b . $index . '_' . $rnd => $item]));
                }
            } else {
                $query->andWhere(new  Expression('strftime(\'%' . $a . '\',`receipt`.`date_time`) = :' . $b, [$b => $this->$c]));


            }
        }

    }


}
