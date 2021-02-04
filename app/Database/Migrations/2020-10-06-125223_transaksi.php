<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true
			],
			'no_transaksi' => [
				'type' => 'VARCHAR',
				'constraint' => 8,
			],
			'id_produk' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
			],
			'id_pembeli' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
			],
			'jumlah' => [
				'type' => 'INT',
				'unsigned' => true,
			],
			'harga' => [
				'type' => 'INT',
				'constraint' => 11
			],
			'diskon' => [
				'type' => 'INT',
			],
			'create_by' => [
				'type' => 'INT',
				'constraint' => 11
			],
			'create_date' => [
				'type' => 'DATETIME',
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('transaksi');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
