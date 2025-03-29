<?php

class m250329_050429_create_pasien_obat_table extends CDbMigration
{
	public function down()
	{
		$this->dropForeignKey('fk_transaksi_obat_pasien_obat', 'transaksi_obat_pasien');
		$this->dropForeignKey('fk_transaksi_obat_pasien_dokter', 'transaksi_obat_pasien');
		$this->dropForeignKey('fk_transaksi_obat_pasien_pasien', 'transaksi_obat_pasien');
		$this->dropTable('transaksi_obat_pasien');
		echo "m250329_050429_create_pasien_obat_table does not support migration down.\n";
		return false;
	}

	public function up()
	{
		$this->createTable('transaksi_obat_pasien', array(
			'id'                => 'pk',
			'pasien_id'         => 'integer NOT NULL',
			'dokter_id'         => 'integer',
			'obat_id'           => 'integer',
			'jumlah'            => 'integer NOT NULL',
			'dosis'             => 'varchar(100)',
			'tanggal_bayar'     => "timestamp NULL DEFAULT NULL",
			'biaya'            => 'numeric(10,2)',
			'wilayah_id'      => 'integer NOT NULL',
			'tanggal_pemberian' => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP",
			'catatan'           => 'text',
			'created_at'        => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP",
			'updated_at'        => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP",
		));
		$this->addForeignKey(
			'fk_transaksi_obat_pasien_pasien',
			'transaksi_obat_pasien',
			'pasien_id',
			'pasien',
			'id',
			'CASCADE',
			'CASCADE'
		);
		$this->addForeignKey(
			'fk_transaksi_obat_pasien_dokter',
			'transaksi_obat_pasien',
			'dokter_id',
			'doctors',
			'id',
			'SET NULL',
			'CASCADE'
		);
		$this->addForeignKey(
			'fk_transaksi_obat_pasien_obat',
			'transaksi_obat_pasien',
			'obat_id',
			'master_obat',
			'id',
			'SET NULL',
			'CASCADE'
		);
		$this->addForeignKey(
			'fk_transaksi_obat_pasien_wilayah',
			'transaksi_obat_pasien',
			'wilayah_id',
			'master_wilayah',
			'id',
			'CASCADE'
		);
	}
}
