<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
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
			// nomor pokok user
			'np_user'       => [
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
			'password' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',

			],
			'role' => [
				'type'			=> 'VARCHAR',
				'constraint'     => '255',
			],
			'jenis_kelamin' => [
				'type'			=> 'VARCHAR',
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
		$this->forge->createTable('user');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('user');
	}
}
