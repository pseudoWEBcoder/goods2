<?php

namespace app\models\finpix;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $_id
 * @property resource $category_guid
 * @property string $category_name
 * @property int $category_parent
 * @property int $category_color
 * @property int $budget_id
 * @property int $exported
 * @property int $locally_changed
 * @property int $server_timestamp
 * @property int $deleted
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_finpix');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_guid', 'category_name'], 'string'],
            [['category_parent', 'category_color', 'budget_id', 'exported', 'locally_changed', 'server_timestamp', 'deleted'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'Id',
            'category_guid' => 'Category Guid',
            'category_name' => 'Category Name',
            'category_parent' => 'Category Parent',
            'category_color' => 'Category Color',
            'budget_id' => 'Budget ID',
            'exported' => 'Exported',
            'locally_changed' => 'Locally Changed',
            'server_timestamp' => 'Server Timestamp',
            'deleted' => 'Deleted',
        ];
    }
}
