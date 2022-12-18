<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%places}}`.
 */
class m221218_003633_create_places_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%places}}', [
            'id' => $this->primaryKey(),
            'created' => $this->integer(),
            'updated' => $this->integer(),
            'name' => $this->string(),
            'description' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%places}}');
    }
}
