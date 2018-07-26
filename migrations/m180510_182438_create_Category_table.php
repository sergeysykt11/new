<?php

use yii\db\Migration;

/**
 * Handles the creation of table `Category`.
 */
class m180510_182438_create_Category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('Category', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50),
            'description' => $this->string(255),
            'url' => $this->string(50),
            'left_img' => $this->string(255),
            'main_img' => $this->string(255),
            'sub_menu' => $this->boolean(),
            'visible' => $this->boolean()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('Category');
    }
}
