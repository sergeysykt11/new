<?php

use yii\db\Migration;

/**
 * Handles the creation of table `pirog_ingr`.
 */
class m180510_182559_create_pirog_ingr_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('pirog_ingr', [
            'id' => $this->primaryKey(),
            'pirog_id' => $this->integer(),
            'ingr_id' => $this->integer()
        ]);

        $this->createIndex(
            'idx-prod-ing_id',
            'pirog_ingr',
            'pirog_id'
        );

        $this->addForeignKey(
            'fk-key-pirog_id',
            'pirog_ingr',
            'pirog_id',
            'Product',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-ingr-ing_id',
            'pirog_ingr',
            'ingr_id'
        );

        $this->addForeignKey(
            'fk-key-ingr_id',
            'pirog_ingr',
            'ingr_id',
            'ingredient',
            'id',
            'CASCADE'
        );
    }



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('pirog_ingr');
    }
}
