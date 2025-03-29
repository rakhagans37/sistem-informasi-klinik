<?php

class m250329_050419_create_doctors_table extends CDbMigration
{
	public function down()
	{
		echo "m250329_050419_create_doctors_table does not support migration down.\n";
		return false;
	}


	// Use safeUp/safeDown to do migration with transaction
	public function up()
	{
		$this->createTable('doctors', array(
			'id'         => 'pk',
			'user_id'    => 'integer NOT NULL',
			'specialty'  => 'varchar(100) NOT NULL',
			'created_at' => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP",
			'updated_at' => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP",
		));

		// Add foreign key constraint
		$this->addForeignKey(
			'fk_doctors_user_id',
			'doctors',
			'user_id',
			'users',
			'id',
			'CASCADE',
			'CASCADE'
		);
	}
}
