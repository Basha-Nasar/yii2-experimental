<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%store_categories}}`.
 */
class m241213_045342_create_store_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%store_categories}}', [
            'store_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
            'sort_orer' => $this->integer()->defaultValue(0),
            'created_at' => $this->timestamp()->defaultExpression("CURRENT_TIMESTAMP"),
        ]);

        // Create foreign key for `category_id`
        $this->addForeignKey(
            'fk-store_categories-category_id',
            '{{%store_categories}}',
            'category_id',
            '{{%categories}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-store_categories-store_id',
            '{{%store_categories}}',
            'store_id',
            '{{%stores}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%store_categories}}');
    }
}
