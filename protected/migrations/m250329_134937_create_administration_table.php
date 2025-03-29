<?php

class m250329_134937_create_administration_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('appointments', array(
			'id'                => 'pk',
			'pasien_id'         => 'integer NOT NULL',
			'doctor_id'         => 'integer NOT NULL',
			'status'            => "varchar(20) NOT NULL DEFAULT 'pending'",
			'notes'             => 'text',
			'created_at'        => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP",
			'updated_at'        => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP",
		));

		// Tambahkan foreign key ke tabel pasien (pastikan tabel 'pasien' ada)
		$this->addForeignKey(
			'fk_appointments_pasien',
			'appointments',
			'pasien_id',
			'pasien',
			'id',
			'CASCADE',
			'CASCADE'
		);

		// Tambahkan foreign key ke tabel doctors
		$this->addForeignKey(
			'fk_appointments_doctor',
			'appointments',
			'doctor_id',
			'doctors',
			'id',
			'CASCADE',
			'CASCADE'
		);
	}

	public function down()
	{
		$this->dropForeignKey('fk_appointments_pasien', 'appointments');
		$this->dropForeignKey('fk_appointments_doctor', 'appointments');
		$this->dropTable('appointments');
		echo "m250329_080000_create_appointments_table does not support migration down.\n";
		return false;
	}
}
