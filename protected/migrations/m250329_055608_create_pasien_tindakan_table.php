<?php

class m250329_055608_create_pasien_tindakan_table extends CDbMigration
{
	public function down()
	{
		echo "m250329_055608_create_pasien_tindakan_table does not support migration down.\n";
		return false;
	}

	public function up()
	{
		$this->createTable('transaksi_tindakan', array(
			'id'               => 'pk',
			'pasien_id'        => 'integer NOT NULL',
			'dokter_id'        => 'integer',
			'tindakan_id'      => 'integer',
			'wilayah_id'      => 'integer NOT NULL',
			'tanggal_tindakan' => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP",
			'tanggal_bayar'     => "timestamp NULL DEFAULT NULL",
			'catatan'          => 'text',
			'biaya'            => 'numeric(10,2)',
			'created_at'       => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP",
			'updated_at'       => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP",
		));
		$this->addForeignKey(
			'fk_transaksi_tindakan_pasien',
			'transaksi_tindakan',
			'pasien_id',
			'pasien',
			'id',
			'CASCADE',
			'CASCADE'
		);
		$this->addForeignKey(
			'fk_transaksi_tindakan_dokter',
			'transaksi_tindakan',
			'dokter_id',
			'doctors',
			'id',
			'SET NULL',
			'CASCADE'
		);
		$this->addForeignKey(
			'fk_transaksi_tindakan_tindakan',
			'transaksi_tindakan',
			'tindakan_id',
			'master_tindakan',
			'id',
			'SET NULL',
			'CASCADE'
		);
		$this->addForeignKey(
			'fk_transaksi_tindakan_wilayah',
			'transaksi_tindakan',
			'wilayah_id',
			'master_wilayah',
			'id',
			'CASCADE'
		);
	}

	public function safeDown()
	{
		$this->dropForeignKey('fk_transaksi_tindakan_tindakan', 'transaksi_tindakan');
		$this->dropForeignKey('fk_transaksi_tindakan_dokter', 'transaksi_tindakan');
		$this->dropForeignKey('fk_transaksi_tindakan_pasien', 'transaksi_tindakan');
		$this->dropTable('transaksi_tindakan');
	}
}
