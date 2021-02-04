<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pemasok extends Migration
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
			// nomor pokok pemasok
			'np_pemasok'       => [
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
		$this->forge->createTable('pemasok');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('pemasok');
	}
}
