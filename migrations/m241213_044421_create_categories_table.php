<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%categories}}`.
 */
class m241213_044421_create_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%categories}}', [
            'id' => $this->primaryKey(),
            'name_en' => $this->string(),
            'name_ar' => $this->string(),
            'desc_en' => $this->text(),
            'desc_ar' => $this->text(),
            'img_en' => $this->string(),
            'img_ar' => $this->string(),
            'status' => $this->string()->notNull(),
            'show_in_home' => $this->boolean()->defaultValue(1),
            'sort_order' => $this->integer()->defaultValue(0),
            'created_at' => $this->timestamp()->defaultExpression("CURRENT_TIMESTAMP"),
            'updated_at' => $this->timestamp()->defaultExpression("CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP"),
            'deleted_at' => $this->timestamp()->defaultExpression("NULL"),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%categories}}');
    }
}
