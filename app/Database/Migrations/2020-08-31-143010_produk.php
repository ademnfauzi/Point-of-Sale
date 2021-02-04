<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produk extends Migration
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
			// nomor pokok produk
			'np_produk'       => [
				'type'           => 'INT',
				'constraint'     => '5'
			],
			'nama_produk' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',

			],
			'kategori_produk' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',

			],
			'harga' => [
				'type'           => 'INT',
				'constraint'     => '11',

			],
			'stok' => [
				'type'           => 'INT',
				'constraint'     => '11',

			],
			'image' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',

			],

		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('produk');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('produk');
	}
}
