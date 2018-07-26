<?php

use yii\db\Migration;

/**
 * Handles the creation of table `ingredient`.
 */
class m180510_182529_create_ingredient_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ingredient', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50),
            'url' => $this->string(50),
            'sub_menu_visible' => $this->boolean()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('ingredient');
    }
}
