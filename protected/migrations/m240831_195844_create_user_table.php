<?php

class m20230901_123456_create_user_table extends CDbMigration
{
    public function up()
    {
        $this->createTable('user', array(
            'id' => 'SERIAL PRIMARY KEY',
            'username' => 'VARCHAR(255) NOT NULL UNIQUE',
            'password' => 'VARCHAR(255) NOT NULL',
            'email' => 'VARCHAR(255) NOT NULL UNIQUE',
            'create_time' => 'TIMESTAMP',
            'update_time' => 'TIMESTAMP',
        ));
    }

    public function down()
    {
        $this->dropTable('user');
    }
}
