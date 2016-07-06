<?php

use yii\db\Migration;

class m160112_100928_start_finish extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%start_finish}}',[
            'id_sf' => $this->primaryKey(),
            'empl_id' => $this->smallInteger()->notNull(),
            'start_at' => $this->integer()->notNull(),
            'finish_at' => $this->integer()->notNull()
        ], $tableOptions);
        //$this->addForeignKey('fk-department-id_dep-user-id','{{%departments}}','id_dep','{{%user}}','id', 'RESTRICT', 'CASCADE');
        //$this->addForeignKey('fk-department-id_dep-user-id','{{%user}}','id','{{%departments}}','id_dep');

    }

    public function safeDown()
    {
        $this->dropTable('{{%start_finish}}');

        echo "Table start_finish has dropped.\n";
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
