<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%upload}}`.
 */
class m221225_220534_create_upload_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%upload}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'md5' => $this->string(255),
            'status' => $this->text(),
            'status_num' => $this->integer(),
            'info' => $this->json(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%upload}}');
    }
}
