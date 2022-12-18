<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%items}}`.
 */
class m221218_004210_add_position_column_toitems_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%items}}', 'place_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%items}}', 'place_id');
    }
}
