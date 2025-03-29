<?php

class m250329_050400_create_pasien_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('pasien', array(
            'id'                => 'pk',
            'nomor_registrasi'  => 'varchar(50) NOT NULL UNIQUE',
            'nama'              => 'varchar(100) NOT NULL',
            'jenis_kelamin'     => 'varchar(10)',
            'tempat_lahir'      => 'varchar(50)',
            'tanggal_lahir'     => 'date',
            'alamat'            => 'text',
            'telepon'           => 'varchar(20)',
            'email'             => 'varchar(100)',
            'created_at'        => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP",
            'updated_at'        => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP",
        ));
	}

	public function down()
	{
		$this->dropTable('pasien');
		echo "m250329_050400_create_pasien_table does not support migration down.\n";
		return false;
	}

	// public function safeUp()
    // {
       
    // }

    // public function safeDown()
    // {
        
    // }
}