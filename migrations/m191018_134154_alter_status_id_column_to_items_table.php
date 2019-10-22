<?php

use yii\db\Migration;

/**
 * Class m191018_134154_alter_status_id_column_to_items_table
 */
class m191018_134154_alter_status_id_column_to_items_table extends Migration
{
    public  $tableName =  'items';
    /**
     * {@inheritdoc}
     */
    public function safUp()
    {
        $this->alterColumn($this->tableName,  'status_id',  'INTEGER');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn($this->tableName,  'status_id',  'TEXT');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191018_134154_alter_status_id_column_to_items_table cannot be reverted.\n";

        return false;
    }
    */
}
