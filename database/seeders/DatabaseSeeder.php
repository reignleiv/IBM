<?php

namespace Database\Seeders;

use App\Models\Ibm;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Ibm::create([
            'nama' => 'Beras Putih',
            'slug' => 'beras-putih-cianjur',
            'lokasi' => 'Cianjur',
            'satuan' => '1 KG',
            'harga' => '100000'
        ]);
    }
}
