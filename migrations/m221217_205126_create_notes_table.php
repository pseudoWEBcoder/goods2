<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%notes}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m221217_205126_create_notes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%notes}}', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer()->notNull(),
            'created' => $this->integer(),
            'updated' => $this->integer(),
            'title' => $this->string(),
            'body' => $this->text(),
        ]);

        // creates index for column `author_id`
        $this->createIndex(
            '{{%idx-notes-author_id}}',
            '{{%notes}}',
            'author_id'
        );

        // add foreign key for table `{{%user}}`
//        $this->addForeignKey(
//            '{{%fk-notes-author_id}}',
//            '{{%notes}}',
//            'author_id',
//            '{{%user}}',
//            'id',
//            'CASCADE'
//        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-notes-author_id}}',
            '{{%notes}}'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            '{{%idx-notes-author_id}}',
            '{{%notes}}'
        );

        $this->dropTable('{{%notes}}');
    }
}
