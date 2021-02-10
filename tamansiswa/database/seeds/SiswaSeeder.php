<?php

use Illuminate\Database\Seeder;
use App\Siswa;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Siswa::class,50)->create();
    }
}
