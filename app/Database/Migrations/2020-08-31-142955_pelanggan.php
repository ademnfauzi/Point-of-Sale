<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pelanggan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true
			],
			// nomor pokok pelanggan
			'np_pelanggan'       => [
				'type'           => 'INT',
				'constraint'     => '5'
			],
			'nama' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',

			],
			'email' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',

			],
			'no_telepon' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',

			],
			'alamat' => [
				'type'			=> 'VARCHAR',
				'constraint'     => '255',
			],
			'image' => [
				'type'			=> 'VARCHAR',
				'constraint'     => '255',
			],

		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('pelanggan');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('pelanggan');
	}
}
