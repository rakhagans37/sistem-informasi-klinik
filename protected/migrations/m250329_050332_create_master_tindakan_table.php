<?php

class m250329_050332_create_master_tindakan_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('master_tindakan', array(
            'id'            => 'pk',
            'nama_tindakan' => 'varchar(100) NOT NULL',
            'deskripsi'     => 'text',
            'biaya'         => 'numeric(10,2) NOT NULL',
            'created_at'    => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP",
            'updated_at'    => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP",
        ));
	}

	public function down()
	{
		$this->dropTable('master_tindakan');
		echo "m250329_050332_create_master_tindakan_table does not support migration down.\n";
		return false;
	}

	// public function safeUp()
    // {
        
    // }

    // public function safeDown()
    // {
        
    // }
}