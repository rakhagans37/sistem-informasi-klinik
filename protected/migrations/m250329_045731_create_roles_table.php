<?php

class m250329_045731_create_roles_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('roles', array(
            'id'          => 'pk',
            'role_name'   => 'varchar(50) NOT NULL UNIQUE',
            'created_at'  => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP",
            'updated_at'  => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP",
        ));
	}

	public function down()
	{
		$this->dropTable('roles');
		echo "m250329_045731_create_roles_table does not support migration down.\n";
		return false;
	}

	// public function safeUp()
    // {
        
    // }

    // public function safeDown()
    // {
        
    // }
}