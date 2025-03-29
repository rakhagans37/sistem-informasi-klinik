<?php

class m250329_071510_create_cashiers_tables extends CDbMigration
{
	public function up()
	{
		$this->createTable('cashiers', array(
			'id'         => 'pk',
			'user_id'     => 'integer NOT NULL',
			'wilayah_id' => 'integer NOT NULL',
			'created_at' => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP",
			'updated_at' => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP",
		));
		
		// Foreign key to master_wilayah
		$this->addForeignKey(
			'fk_cashiers_wilayah',
			'cashiers',
			'wilayah_id',
			'master_wilayah',
			'id',
			'CASCADE'
		);

		// Foreign key to users
		$this->addForeignKey(
			'fk_cashiers_user',
			'cashiers',
			'user_id',
			'users',
			'id',
			'CASCADE'
		);
	}

	public function down()
	{
		echo "m250329_071510_create_cashiers_tables does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}