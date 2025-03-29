<?php

class m250329_050348_create_master_obat_table extends CDbMigration
{
	public function up() {
		$this->createTable('master_obat', array(
			'id'           => 'pk',
			'nama_obat'    => 'varchar(100) NOT NULL',
			'deskripsi'    => 'text',
			'jenis'        => 'varchar(50)',
			'harga'        => 'numeric(10,2) NOT NULL',
			'satuan'       => 'varchar(20)',
			'expired_date' => 'date',
			'created_at'   => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP",
			'updated_at'   => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP",
		));
	}

	public function down()
	{
		$this->dropTable('master_obat');
		echo "m250329_050348_create_master_obat_table does not support migration down.\n";
		return false;
	}

	// public function safeUp()
	// {
		
	// }

	// public function safeDown()
	// {
		
	// }
}
