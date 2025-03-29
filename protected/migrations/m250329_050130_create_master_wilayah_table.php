<?php

class m250329_050130_create_master_wilayah_table extends CDbMigration
{
	public function up() {
		$this->createTable('master_wilayah', array(
			'id'         => 'pk',
			'nama'       => 'varchar(100) NOT NULL',
			'alamat'     => 'text',
			'kota'      => 'varchar(100) NOT NULL',
			'provinsi'   => 'varchar(100) NOT NULL',
			'kode_pos'   => 'varchar(10)',
			'telepon'    => 'varchar(20)',
			'fax'        => 'varchar(20)',
			'email'      => 'varchar(100)',
			'website'    => 'varchar(100)',
			'created_at' => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP",
			'updated_at' => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP",
		));
	}

	public function down()
	{
		$this->dropForeignKey('fk_master_wilayah_parent', 'master_wilayah');
		$this->dropTable('master_wilayah');
		echo "m250329_050130_create_master_wilayah_table does not support migration down.\n";
		return false;
	}

	// public function safeUp()
	// {
		
	// }

	// public function safeDown()
	// {
		
	// }
}
