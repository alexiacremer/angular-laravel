<?php

class ProductsTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('products')->truncate();

		Product::create([
			'name'      => 'Komplete 9',
			'sku'       => 'KPL9',
			'price'     => '999',
			'type'      => 'Software',
			'published' => true
		]);

		Product::create([
			'name'      => 'Traktor Kontrol X4',
			'sku'       => 'TX4',
			'price'     => '70',
			'type'      => 'Hardware',
			'published' => true
		]);

		Product::create([
			'name'      => 'Maschine G1',
			'sku'       => 'MG1',
			'price'     => '299.00',
			'type'      => 'Hardware',
			'published' => false
		]);

	}

}