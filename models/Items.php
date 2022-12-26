<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "items".
 *
 * @property int $id
 * @property int $created
 * @property int $updated
 * @property string $quantity
 * @property int $price
 * @property string $name
 * @property int $nds_sum
 * @property int $nds_rate
 * @property int $sum
 * @property int $receipt_id
 * @property int $nds18
 * @property int $nds10
 * @property int $calculation_type_sign
 * @property int $calculation_subject_sign
 * @property string $modifiers
 * @property int $nds_no
 * @property int $payment_type
 * @property int $nds
 * @property int $nds_calculated10
 * @property int $nds_calculated18
 * @property string $properties
 * @property int $payment_agent_by_product_type
 * @property int $product_type
 * @property int $excise
 * @property int $commit
 * @property int $status_id
 *
 * @property Comment[] $comments
 * @property ItemStatuses $status
 * @property Receipt $receipt
 */
class Items extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'items';
    }

    function behaviors()
    {
        return [
            'images' => [
                'class' => 'dvizh\gallery\behaviors\AttachImages',
                'mode' => 'gallery',
                'quality' => 60,
                'galleryId' => 'picture'
            ],
            [
                'class' => \voskobovich\linker\LinkerBehavior::className(),
                'relations' => [
                    'category_ids' => 'categories',

                ],
            ],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created', 'updated', 'price', 'nds_sum', 'nds_rate', 'sum', 'receipt_id', 'nds18', 'nds10', 'calculation_type_sign', 'calculation_subject_sign', 'nds_no', 'payment_type', 'nds', 'nds_calculated10', 'nds_calculated18', 'payment_agent_by_product_type', 'product_type', 'excise', 'commit', 'status_id'], 'integer'],
            [['quantity'], 'number'],
            [['name', 'modifiers', 'properties'], 'string'],
            [['category_ids'], 'each', 'rule' => ['safe']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => ItemStatuses::class, 'targetAttribute' => ['status_id' => 'id']],
            [['receipt_id'], 'exist', 'skipOnError' => true, 'targetClass' => Receipt::class, 'targetAttribute' => ['receipt_id' => 'id']],
            [['place_id'], 'exist', 'skipOnError' => true, 'targetClass' => Places::class, 'targetAttribute' => ['place_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),
            'quantity' => Yii::t('app', 'Quantity'),
            'price' => Yii::t('app', 'Price'),
            'name' => Yii::t('app', 'Name'),
            'nds_sum' => Yii::t('app', 'Nds Sum'),
            'nds_rate' => Yii::t('app', 'Nds Rate'),
            'sum' => Yii::t('app', 'Sum'),
            'receipt_id' => Yii::t('app', 'Receipt ID'),
            'nds18' => Yii::t('app', 'Nds18'),
            'nds10' => Yii::t('app', 'Nds10'),
            'calculation_type_sign' => Yii::t('app', 'Calculation Type Sign'),
            'calculation_subject_sign' => Yii::t('app', 'Calculation Subject Sign'),
            'modifiers' => Yii::t('app', 'Modifiers'),
            'nds_no' => Yii::t('app', 'Nds No'),
            'payment_type' => Yii::t('app', 'Payment Type'),
            'nds' => Yii::t('app', 'Nds'),
            'nds_calculated10' => Yii::t('app', 'Nds Calculated10'),
            'nds_calculated18' => Yii::t('app', 'Nds Calculated18'),
            'properties' => Yii::t('app', 'Properties'),
            'payment_agent_by_product_type' => Yii::t('app', 'Payment Agent By Product Type'),
            'product_type' => Yii::t('app', 'Product Type'),
            'excise' => Yii::t('app', 'Excise'),
            'commit' => Yii::t('app', 'Commit'),
            'status_id' => Yii::t('app', 'Status ID'),
            'nomenclature_code' => Yii::t('app', 'Nomenclature Code'),
            'unit' => Yii::t('app', 'Unit'),
            'properties_item' => Yii::t('app', 'Properties Item'),
            'provider_inn' => Yii::t('app', 'Provider Inn'),
            'product_code_data' => Yii::t('app', 'Product Code Data'),
            'category' => Yii::t('app', 'Category'),
            'product_code_data_error' => Yii::t('app', 'Product Code Data Error'),
            'place_id' => Yii::t('app', 'Place ID'),
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        $model = new ItemsHistory();
        $model->items_id = $this->id;
        $model->time = time();
        $model->text = \Yii::$app->request->getUrl();
        foreach ($changedAttributes as $index => $changedAttribute) {
            $New[$index] = $this->$index;
        }
        $model->diff = json_encode(['new' => $New, 'old' => $changedAttributes]);
        $model->save();
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['items_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(ItemStatuses::class, ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    //categories
    public function getCategories()
    {
        return $this->hasMany(Category::class, ['id' => 'category_id'])->via('itemCategory');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemCategory()
    {
        return $this->hasMany(ItemCategory::class, ['item_id' => 'id']);
    }

    public function getPlace()
    {
        return $this->hasOne(Places::class, ['id' => 'place_id']);
    }

    public function getformatedPrice()
    {
        return number_format((float)$this->price / 100, 2, '.', ' ');
    }

    public function getformatedSum()
    {
        return number_format((float)$this->sum / 100, 2, '.', ' ');
    }

    public function getformatedTotalSum()
    {
        return number_format((float)$this->receipt->total_sum / 100, 2, '.', ' ');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceipt()
    {
        return $this->hasOne(Receipt::class, ['id' => 'receipt_id']);
    }

    public static function camelToId($arr)
    {
        $fields = [];
        foreach ($arr as $index => $item) {

            $line = preg_replace_callback(
                '|([^a-z])|',
                function ($matches) {
                    return '_' . @strtolower($matches[0]);
                },
                $index
            );
            $line = yii\helpers\BaseInflector::camel2id($index, '_');
            $fields[$line] = $item;
        }
        return $fields;
    }
}
