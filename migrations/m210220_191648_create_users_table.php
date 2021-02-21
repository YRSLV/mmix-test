<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m210220_191648_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
 
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci ENGINE=InnoDB';
        }
 
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(191)->notNull(),
            'last_name' => $this->string(191)->notNull(),
            'patronymic' => $this->string(191),
            'username' => $this->string(191)->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string(191)->notNull(),
            'password_reset_token' => $this->string(191)->unique(),
            'email' => $this->string(191)->notNull()->unique(),
            'phone' => $this->string(33)->notNull()->unique(),
            'is_phone_hidden' => $this->smallInteger()->notNull()->defaultValue(0),
            'bio' => $this->text(3000),
            'city' => $this->string(191),
            'photo' => $this->text(2100)->notNull()->defaultValue('resources/img/default_user_photo.jpg'),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
