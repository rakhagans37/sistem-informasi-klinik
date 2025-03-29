<?php

class m250329_050251_create_users_table extends CDbMigration
{
	public function up() {
		$this->createTable('users', array(
			'id'         => 'pk',
			'fullname'   => 'varchar(50) NOT NULL UNIQUE',
			'password'   => 'varchar(255) NOT NULL',
			'email'      => 'varchar(100) NOT NULL UNIQUE',
			'role_id'    => 'integer NOT NULL',
			'created_at' => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP",
			'updated_at' => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP",
		));

		// Add foreign key constraints
		$this->addForeignKey('fk_users_role', 'users', 'role_id', 'roles', 'id', 'CASCADE', 'CASCADE');
		
		// unique index on email
		$this->createIndex('idx_users_email', 'users', 'email', true);
	}

	public function down()
	{
		$this->dropTable('users');
		echo "m250329_050251_create_users_table does not support migration down.\n";
		return false;
	}

	// public function safeUp()
	// {
		
	// }

	// public function safeDown()
	// {
		
	// }
}
