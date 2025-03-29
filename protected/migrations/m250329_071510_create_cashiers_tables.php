<?php

class m250329_071510_create_cashiers_tables extends CDbMigration
{
	public function up()
	{
		$this->createTable('cashiers', array(
			'id'         => 'pk',
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