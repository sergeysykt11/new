<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m180510_182508_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'name' => $this->string(80),
            'image' => $this->string(255),
            'weight' => $this->integer(),
            'proteins' => $this->integer(),
            'fats' => $this->integer(),
            'carbohydrates' => $this->integer(),
            'calories' => $this->integer(),
            'category' => $this->integer(),
            'price' => $this->integer(),
            'area' => $this->integer(),
            'active' => $this->integer(),
            'visible' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product');
    }
}
