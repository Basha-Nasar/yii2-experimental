<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%stores}}`.
 */
class m241213_044433_create_stores_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%stores}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string()->notNull(),
            'name_en' => $this->string(),
            'name_ar' => $this->string(),
            'desc_en' => $this->text(),
            'desc_en' => $this->text(),
            'img_ar' => $this->string(),
            'img_ar' => $this->string(),
            'status' => $this->string()->notNull(),
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
        $this->dropTable('{{%stores}}');
    }
}
