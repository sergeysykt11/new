<?php

use yii\db\Migration;

/**
 * Handles the creation of table `share`.
 */
class m180510_182610_create_share_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('share', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'description' => $this->text(),
            'image' => $this->string(255),
            'begin_date' => $this->date(),
            'end_date' => $this->date(),
            'visible' => $this->boolean(),
            'active' => $this->boolean(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('share');
    }
}
