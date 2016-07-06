<?php

use yii\db\Schema;
use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function SafeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'fio' => $this->string(),
            'emp_dep' => $this->smallInteger(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        $this->createTable('{{%departments}}',[
            'id_dep' => $this->primaryKey(),
            'department' => $this->string(),
        ], $tableOptions);

        $this->createTable('{{%start_finish}}',[
            'employee_id' => $this->smallInteger(),
            'start' => $this->dateTime(),
            'finish' => $this->dateTime()
        ], $tableOptions);
    }

    public function SafeDown()
    {
        $this->dropTable('{{%employees}}');
        $this->dropTable('{{%departments}}');
        $this->dropTable('{{%start_finish}}');
    }

}
